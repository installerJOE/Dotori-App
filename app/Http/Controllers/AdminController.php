<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Rank;
use App\Models\Account;
use App\Models\SubscribedUser;
use App\Models\Transaction;
use App\Models\Referral;
use App\Models\Package;



class AdminController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'verified']);
    }

    public function dashboard(){
        return view('pages.admin.dashboard');
    }

    
    public function deposits(){
        $deposits = Transaction::where([
            'category' => 'deposit',
            'status' => 'completed'
        ])->get();
        return view('pages.admin.deposits')->with('deposits', $deposits);
    }

    public function depositRequests(){
        $deposits = Transaction::where([
            'category' => 'deposit',
            'status' => 'pending'
        ])->get();
        return view('pages.admin.depositRequests')->with('deposits', $deposits);
    }

    public function validateDepositRequest(Request $request){
        $deposit = Transaction::findOrFail($request->input('deposit_id'));
        $deposit->status = "completed";
        $deposit->save();
        
        //send dotori user an email of payment confirmation
        return redirect('/admin/deposits/requests')->with('success', "Deposit request has been validated successfully");
    }

    public function withdrawals(){
        $withdrawals = Transaction::where([
            'category' => 'withdraw',
            'status' => 'completed'
        ])->get();
        return view('pages.admin.withdrawals')->with('withdrawals', $withdrawals);
    }

    public function withdrawalRequests(){
        $withdrawals = Transaction::where([
            'category' => 'withdraw',
            'status' => 'pending'
        ])->get();
        return view('pages.admin.withdrawalRequests')->with('withdrawals', $withdrawals);
    }

    public function validateWithdrawalRequest(Request $request){
        $withdrawal = Transaction::findOrFail($request->input('withdrawal_id'));
        $withdrawal->status = "completed";
        $withdrawal->save();
        
        //send dotori user an email of withdrawal confirmation
        return redirect('/admin/withdrawals/requests')->with('success', "Withdrawal request has been approved successfully");
    }

    // display packages page showing all available packages
    public function packages(){
        $packages = Package::all();
        return view('pages.admin.packages')->with('packages', $packages);
    }

    // create a new instance of a package in the database
    public function storePackage(Request $request){
        $this->validate($request, [
            "package_name" => "required",
            "staking_amount" => "required",
            "reward_pts" => "required",
        ]);

        $package = Package::where('name', $request->input('required'))->first();
        if($package !== null){
            return back()->with("error", "Ooops! This package already exists.");
        }
        $package = new Package;
        $package->name = $request->input('package_name');
        $package->staking_amount = $request->input("staking_amount");
        $package->reward = $request->input("reward_pts");
        $package->save();
        return redirect("/admin/packages")->with("success", "Package has been created successfully.");
    }

    // Update information on a package in the database
    public function updatePackage(Request $request, $id){
        $this->validate($request, [
            "package_name" => "required",
            "staking_amount" => "required",
            "reward_pts" => "required",
        ]);

        $package = Package::findOrFail($id);
        $package->name = $request->input('package_name');
        $package->staking_amount = $request->input("staking_amount");
        $package->reward = $request->input("reward_pts");
        $package->save();

        return redirect("/admin/packages")->with("success", "Package has been updated successfully.");
    }

    // get all subscribed users and display page
    public function subscribers(){
        $subscribers = SubscribedUser::all();
        return view('pages.admin.subscribers')->with('subscribers', $subscribers);
    }
}
