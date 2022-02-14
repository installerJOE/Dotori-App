<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class PaymentSettlementJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    protected $subscriber;

    public function __construct($subscriber)
    {
        $this->subscriber = $subscriber;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $percent_yield = $this->subscriber->rank->daily_percent_yield;
        $staking_amount = $this->subscriber->package->staking_amount;
        $points = $this->subscriber->package->reward;
        $capital = $staking_amount - $points;
        $bonus = ($percent_yield/100) * $capital;
        $this->subscriber->user->earnings = $this->subscriber->user->earnings + $bonus;
        $this->subscriber->user->available_points = $this->subscriber->user->available_points + $bonus;
        $this->subscriber->user->save();
    }
}
