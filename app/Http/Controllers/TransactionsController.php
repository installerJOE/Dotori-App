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

class TransactionsController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'verified']);
    } 

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
        return redirect('/deposit')->with('success', 'Your deposit request has been sent');
    }

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
        
        // Check if user has subscribed to selected package
        $subscriber = SubscribedUser::where([
            'user_id' => Auth::user()->id,
            'package_id' => $request->input("package_id"),
            ])->first();
        
        if($subscriber !== null){
            // Update quantity of package
            $subscriber->quantity += $request->input('quantity');
            $subscriber->status = "active";
        }
        else{
            //create new instance of subscribed user
            $subscriber = new SubscribedUser;
            $subscriber->user_id = Auth::user()->id;
            $subscriber->package_id = $request->input("package_id");
            $subscriber->rank_id = $rank_id;
            $subscriber->quantity = $request->input('quantity');
            $subscriber->status = "active";
        }
        $subscriber->save();
        
        //update user balance
        $user = Auth::user();
        $user->available_points = $user->available_points - $request->input('total_amount');
        $user->save();

        return redirect('/purchase-package')->with('success', 'Package has been subscribed successfully.');
    }

}
