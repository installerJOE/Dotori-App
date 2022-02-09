<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
    
    public function subscribed_users(){
        return $this->morphMany(SubscribedUser::class);
    }
}