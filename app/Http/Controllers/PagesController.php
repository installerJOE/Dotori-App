<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    
    public function index(){
        return view('pages.main.dashboard');
    }

    public function deposit(){
        return view('pages.sub.deposit');
    }

    public function announcement(){
        return view('pages.sub.announcement');
    }

    public function purchase(){
        return view('pages.sub.packagepurchase');
    }

    public function profile(){
        return view('pages.sub.profile');
    }

    public function changePassword(){
        return view('pages.sub.changepwd');
    }

    public function changePin(){
        return view('pages.sub.changepin');
    }

    public function referral(){
        return view('pages.sub.referral');
    }

    public function dailyHistory(){
        return view('pages.sub.daily_history');
    }

    public function referralHistory(){
        return view('pages.sub.referralHistory');
    }
    public function withdrawal(){
        return view('pages.sub.withdrawal');
    }
}
