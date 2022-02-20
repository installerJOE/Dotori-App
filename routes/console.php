<?php

use App\Models\Account;
use App\Models\Announcement;
use App\Models\Order;
use App\Models\Package;
use App\Models\Product;
use App\Models\Rank;
use App\Models\SubscribedUser;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('initialize', function(){
    foreach(Account::all() as $data){
        $data->delete();
    }
    foreach(Announcement::all() as $data){
        $data->delete();
    }
    foreach(Order::all() as $data){
        $data->delete();
    }
    foreach(Package::all() as $data){
        $data->delete();
    }
    Package::createAll();
    foreach(Product::all() as $data){
        $data->delete();
    }
    foreach(Rank::all() as $data){
        $data->delete();
    }
    Rank::createAll();
    foreach(SubscribedUser::all() as $data){
        $data->delete();
    }
    foreach(Transaction::all() as $data){
        $data->delete();
    }
    foreach(User::all() as $user){
        if(!$user->is_admin){
            $user->delete();
        }
    }

    
});
