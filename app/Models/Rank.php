<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    use HasFactory;

    // public function users(){
    //     return $this->hasMany(User::class);
    // }

    public function subscribed_users(){
        return $this->morphMany(SubscribedUser::class);
    }
}
