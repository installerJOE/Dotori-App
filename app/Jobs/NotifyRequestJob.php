<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class NotifyRequestJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $transaction_type;
    
    public function __construct($transaction_type)
    {
        $this->transaction_type = $transaction_type;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if($this->transaction_type === "deposit_request"){
            $notifyMail = new DepositRequestMail($this->transaction_type);    
        }
        // else if(){
        //     $notifyMail = new DepositRequestMail($this->transaction_type);    
        // }
        Mail::to(Auth::user()->email)->send($notifyMail);       
    }
}
