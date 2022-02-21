<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $guarded = [];
    use HasFactory;
    
    public function subscribed_users(){
        return $this->hasMany(SubscribedUser::class);
    }

    public static function createAll(){
        self::create([
            'id'=> 1,
            'name' => 'Basic',
            'staking_amount' => 1100000,
            'reward' => 100000
        ]);
        self::create([
            'id'=> 2,
            'name' => 'Gold',
            'staking_amount' => 3300000,
            'reward' => 300000
        ]);
        self::create([
            'id'=> 3,
            'name' => 'Premium',
            'staking_amount' => 5500000,
            'reward' => 5000000
        ]);
        self::create([
            'id'=> 4,
            'name' => 'premium Gold',
            'staking_amount' => 7700000,
            'reward' => 700000
        ]);
        self::create([
            'id'=> 5,
            'name' => 'Diamond',
            'staking_amount' => 11000000,
            'reward' => 1000000
        ]);
    }
}
