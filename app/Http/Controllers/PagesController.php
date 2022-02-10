<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Rank;
use App\Models\Account;
use App\Models\SubscribedUser;
use App\Models\Referral;



class PagesController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    
    public function index(){
        $user = Auth::user()->subscribed_user;
        if($user === null){
            $rank = Rank::where('referral_limit', 0)->first();
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
        return view('pages.deposit');
    }

    public function announcement(){
        return view('pages.announcement');
    }

    public function purchase(){
        return view('pages.packagepurchase');
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
    public function withdrawal(){
        return view('pages.withdrawal');
    }
}
