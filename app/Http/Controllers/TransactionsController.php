<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Account;
use App\Models\DeliveryAddress;
use App\Models\Transaction;
use App\Models\Package;
use App\Models\Referral;
use App\Models\Rank;
use App\Models\SubscribedUser;
use App\Jobs\NotifyRequestJob;

class TransactionsController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'verified']);
    } 

    // Send deposit request to the admin
    public function deposit(Request $request){
        $inputs = $request->validate([
            'deposit_amount' => 'required',
            'bank_name' => 'required',
            'account_name' => 'required',
        ]);
        
        // return strtoupper($this->uniqueCodeGenerator(12));

        $transaction = new Transaction;
        $transaction->user_id = Auth::user()->id;
        // $transaction->reference_id = strtoupper($this->uniqueCodeGenerator(12));
        $transaction->category = "deposit";
        $transaction->status = "pending";
        $transaction->amount = $request->input('deposit_amount');
        $transaction->bank_name = $request->input("bank_name");
        $transaction->account_name = $request->input("account_name");
        $transaction->save();

        //send notification of deposit request
        dispatch(new NotifyRequestJob("deposit_request"));

        return redirect('/deposit')->with('success', 'Your deposit request has been sent');
    }

    // Send withdrawal request to the admin
    public function withdraw(Request $request){
        $inputs = $request->validate([
            'pin' => 'required|string|max:6',
            'withdrawal_amount' => 'required',
        ]);

        if(!Hash::check($inputs['pin'], Auth::user()->pin)){
            return back()->with('error', 'Oops, your PIN is incorrect. Try again! ');
        }

        $transaction = new Transaction;
        $transaction->user_id = Auth::user()->id;
        $transaction->category = "withdraw";
        $transaction->status = "pending";
        $transaction->amount = $request->input('withdrawal_amount');
        $transaction->fee = $request->input('fee');
        $transaction->total_amount = $request->input('total_amount');
        $transaction->bank_name = $request->input("bank_name");
        $transaction->account_name = $request->input("account_name");
        $transaction->account_number = $request->input("account_number");
        $transaction->save();

        $user = Auth::user();
        $user->available_points = Auth::user()->available_points - $request->input('withdrawal_amount');
        $user->save();

        // Send email notification of withdrawal request
        return redirect('/withdrawal')->with('success', 'Your withdrawal request has been sent');

    }

    // Purchase a package
    public function purchasePackage(Request $request){
        //check if purchase limit is exceeded
        $this->validate($request, [
            'package_price' => 'required',
            'quantity' => 'required',
            'total_amount' => 'required',
        ]);
        
        if(!Hash::check($request->input('pin'), Auth::user()->pin)){
            return back()->with('error', 'Oops, your PIN is incorrect. Try again! ');
        } 
        
        if(Auth::user()->available_points < $request->input('total_amount')){
            return back()->with("error", "Insufficient funds! Please credit your Dotori account to purchase more package");
        }
        
        // Get the rank id of the subscribed user
        $referrals = Referral::where('user_id', Auth::user()->id)->get()->count();
        $ranks = Rank::select('id', 'referral_limit')->orderBy('id', 'asc')->get();
        foreach($ranks as $rank){
            if($rank->referral_limit > $referrals){
                $rank_id = $rank->id;
                break;
            }
        }        
        
        // check if daily purchase limit of 11 million won is exceeded
        $this->checkDailySubStatus($request->input('total_amount'));        
        // $time = date($timestamp); 

        //create new instance of subscribed user
        $subscriber = new SubscribedUser;
        $subscriber->user_id = Auth::user()->id;
        $subscriber->package_id = $request->input("package_id");
        $subscriber->rank_id = $rank_id;
        $subscriber->quantity = $request->input('quantity');
        $subscriber->status = "active";
        $subscriber->save();
        
        //update user balance
        $user = Auth::user();
        $user->available_points = $user->available_points - $request->input('total_amount');
        $user->save();

        return redirect('/packages/subscribed')->with('success', 'Package has been subscribed successfully.');
    }

    // get the total amount that has been spent of subscription between two midnights
    private function getDaySubscriptionAmount(){
        $yesterday_midnight = strtotime('today midnight');
        $today_midnight = strtotime('tomorrow midnight');
        $timestamp = time(); //UTC or GMT time

        $subscribers = SubscribedUser::where("user_id", Auth::user()->id)->get();
        $subscribed_amt = 0;
        foreach($subscribers as $subscriber){
            $transaction_time = strtotime($subscriber->created_at);
            if($transaction_time > $yesterday_midnight && $transaction_time < $today_midnight){
                $price = $subscriber->package->staking_amount;
                $qty = $subscriber->quantity;
                $subscribed_amt += $price * $qty;
            }            
        }
        return $subscribed_amt;
    }

    // check if daily subscription limit is reached and return back to previous page
    private function checkDailySubStatus($purchase_amount){
        $subscribed_amt = $this->getDaySubscriptionAmount();
        if($subscribed_amt >= 11000000){
            return back()->with('error', 'You have exceeded your daily limit of purchase');
        }
        $allowed_amount = 11000000 - $subscribed_amt;
        if($purchase_amount > $allowed_amount){
            return back()->with('error', 'You can only subscribe ' . $allowed_amount . 'KRW worth of package for today.');
        }
    }

    // repurchase an existing subscription package on completion of an earning cycle
    public function repurchasePackage(Request $request){
        if(!Hash::check($request->input('pin'), Auth::user()->pin)){
            return back()->with('error', 'Oops, your PIN is incorrect. Try again! ');
        }
        $subscriber = SubscribedUser::where('id', $request->input('package_subscription_id'))->first();
        if($subscriber === null || $subscriber->percent_paid < 200){
            return back()->with('error', 'Your earning cycle is not completed yet.');
        }
        $subscriber->repurchase++;
        $subscriber->percent_paid = 0;
        $subscriber->status = "active";
        $subscriber->save();  

        // Send notification on successful package repurchase

        return back()->with('success', 'Package repurchase is successful.');
    }

    // revoke a subscription and withdraw funds
    public function cancelPackageSub(Request $request){
        return $request;
    }

}
