<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable //implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'pin',
        'phone',
        'memberId',
        'referrerId',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'pin',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'status' => 'boolean',
    ];

    public function subscribed_users(){
        return $this->hasMany(SubscribedUser::class);
    }

    public function account(){
        return $this->hasOne(Account::class);
    }

    public function referrals(){
        return $this->hasMany(Referral::class);
    }

    public function delivery_address(){
        return $this->hasOne(DeliveryAddress::class);
    }

    public function reward(){
        return $this->hasOne(Reward::class);
    }

    public function transactions(){
        return $this->hasMany(Transaction::class);
    }

    public function announcements(){
        return $this->hasMany(Announcement::class);
    }
}
