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
        return view('pages.admin.deposits');
    }

    public function depositRequests(){
        return view('pages.admin.depositRequests');
    }

    public function withdrawals(){
        return view('pages.admin.withdrawals');
    }

    public function withdrawalRequests(){
        return view('pages.admin.withdrawalRequests');
    }

    public function packages(){
        $packages = Package::all();
        return view('pages.admin.packages')->with('packages', $packages);
    }

    public function createPackage(Request $request){
        return $request;
    }

    public function updatePackage(Request $request){
        return $request;
    }

    public function subscribers(){
        return view('pages.admin.subscribers');        
    }
}
