<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    use HasFactory;
    protected $guarded = [];

    // public function users(){
    //     return $this->hasMany(User::class);
    // }

    public function subscribed_users(){
        return $this->hasMany(SubscribedUser::class);
    }

    public static function createAll(){
        self::create([
            'id'=> 1,
            'title' => 'Level 1',
            'referral_limit' => '5',
            'daily_percent_yield' => 1
        ]);
        self::create([
            'id'=> 2,
            'title' => 'Level 2',
            'referral_limit' => '10',
            'daily_percent_yield' => 3
        ]);
        self::create([
            'id'=> 3,
            'title' => 'Level 3',
            'referral_limit' => '15',
            'daily_percent_yield' => 5
        ]);
        self::create([
            'id'=> 4,
            'title' => 'VIP',
            'referral_limit' => '1000000',
            'daily_percent_yield' => 5
        ]);
    }
}
