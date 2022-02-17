<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Order;
use App\Jobs\SendTransactionNotification;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function uniqueCodeGenerator($str_length){
        do {
            $unique_string = Str::random($str_length);
        } 
        while (User::where('memberId', $unique_string)->first());
        return $unique_string;
    }

    // method for generating slug
    public function slug_generator($title){
        $main_title_arr = explode(' ', $title);
        $slug = strtolower(join('-', $main_title_arr));
        return $slug;
    }

    protected function orderIDGenerator($str_length){
        do {
            $unique_string_arr = [];
            for($i=0; $i<4; $i++){
                array_push($unique_string_arr, Str::random($str_length/4));
            }
            $unique_string = strtoupper(join('-', $unique_string_arr));
        } 
        while (Order::where('unique_id', $unique_string)->first());
        return $unique_string;
    }
}
