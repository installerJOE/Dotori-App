<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reward extends Model
{
    use HasFactory;

    public function subscribed_user(){
        return $this->belongsTo(SubscribedUser::class);
    }

}
