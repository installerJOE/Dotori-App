<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Account;
use App\Models\DeliveryAddress;
use App\Models\Transaction;

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

        $transaction = new Transaction;
        $transaction->user_id = Auth::user()->id;
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

}
