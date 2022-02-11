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



class PagesController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    
    public function index(){
        $subscribedUser = Auth::user()->subscribed_user;
        if($subscribedUser === null){
            $rank = Rank::where('referral_limit', 5)->first();
        }
        else{
            $rank = $subscribedUser->rank;
        }

        // get total number of referrals
        $referrals = User::where('referrerId', Auth::user()->memberId)->get()->count();
        
        return view('pages.dashboard')
            ->with([
                'rank' => $rank,
                'referrals' => $referrals
            ]);
    }

    public function deposit(){
        return view('pages.deposit');
    }

    public function depositHistory(){
        //get deposit history
        $deposits = Transaction::where(['user_id' => Auth::user()->id, 'category'=>'deposit'])->get();
        return view('pages.depositHistory')->with('deposits', $deposits);
    }

    public function withdrawal(){
        return view('pages.withdrawal');
    }

    public function withdrawalHistory(){
        //get withdrawal history
        $withdrawals = Transaction::where(['user_id' => Auth::user()->id, 'category'=>'withdraw'])->get();
        return view('pages.withdrawalHistory')->with('withdrawals', $withdrawals);
    }

    public function announcement(){
        return view('pages.announcement');
    }

    public function subscribedPackages(){
        $subscribed_packages = SubscribedUser::where('user_id', Auth::user()->id)->get();
        return view('pages.packages')
            ->with([
                'subscribed_packages' => $subscribed_packages
            ]);
    }
    public function purchasePackage(){
        $packages = Package::all();
        return view('pages.packagepurchase')
            ->with([
                'packages' => $packages,
            ]);
    }

    public function profile(){
        return view('pages.profile');
    }

    public function changePassword(){
        return view('pages.changepwd');
    }

    public function changePin(){
        return view('pages.changepin');
    }

    public function referral(){
        // get total number of referrals
        $referrals = User::where('referrerId', Auth::user()->memberId)->get();
        return view('pages.referral')->with('referrals', $referrals);
    }

    public function dailyHistory(){
        return view('pages.daily_history');
    }

    public function referralHistory(){
        return view('pages.referralHistory');
    }
}
