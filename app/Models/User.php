<?php

namespace App\Models;

//use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\CustomVerifyEmail;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users'; 
    protected $primaryKey = 'user_id';
    public $incrementing = true; 
    protected $keyType = 'int';

    protected $fillable = [
        'firstname',
        'lastname',
        'phone',
        'email',
        'password', 
        'role',
        'is_blocked', 
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_blocked' => 'boolean',
    ];

    public function getKey()
    {
        return $this->user_id; 
    }

    

// public function sendEmailVerificationNotification()
// {
//     $this->notify(new CustomVerifyEmail());
// }


    public function expenses()
    {
        return $this->hasMany(Expense::class, 'user_id');
    }

    public function incomes()
    {
        return $this->hasMany(Income::class, 'user_id');
    }

    public function savingsGoals()
    {
        return $this->hasMany(SavingsGoal::class, 'user_id');
    }

    public function isAdmin(): bool
    {
        return $this->role === 'admin';  
    }

    public function isSuperAdmin(): bool
    {
        return $this->role === 'super_admin';
    }

    public function isBlocked(): bool
    {
        return (bool) $this->is_blocked;
    }
}
