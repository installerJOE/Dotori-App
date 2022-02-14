<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SettleDailyPayment implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $subscribers;

    public function __construct($subscribers)
    {
        $this->subscribers = $subscribers;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach($this->subscribers as $subscriber){
            if($subscriber->percent_paid < 200){
                $percent_yield = $subscriber->rank->daily_percent_yield * $subscriber->quantity;
                $staking_amount = $subscriber->package->staking_amount;
                $points = $subscriber->package->reward;
                $capital = $staking_amount - $points;
                $bonus = ($percent_yield/100) * $capital;
                $subscriber->user->earnings = $subscriber->user->earnings + $bonus;
                $subscriber->user->available_points = $subscriber->user->available_points + $bonus;
                $subscriber->percent_paid = $subscriber->percent_paid + $percent_yield;
                $subscriber->user->save();
                $subscriber->save();
            }
        }
    }
}
