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
            $rank = Rank::where('referral_limit', 0)->first();
        }
        else{
            $rank = $subscribedUser->rank;
        }

        // get total number of referrals
        $referrals = Referral::where('user_id', Auth::user()->id)->get()->count();
        
        return view('pages.dashboard')
            ->with([
                'rank' => $rank,
                'referrals' => $referrals
            ]);
    }

    public function deposit(){
        //get deposit history
        $deposits = Transaction::where(['user_id' => Auth::user()->id, 'category'=>'deposit'])->get();
        return view('pages.deposit')->with('deposits', $deposits);
    }

    public function withdrawal(){
        //get withdrawal history
        $withdrawals = Transaction::where(['user_id' => Auth::user()->id, 'category'=>'withdraw'])->get();
        return view('pages.withdrawal')->with('withdrawals', $withdrawals);
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
        return view('pages.referral');
    }

    public function dailyHistory(){
        return view('pages.daily_history');
    }

    public function referralHistory(){
        return view('pages.referralHistory');
    }
}
