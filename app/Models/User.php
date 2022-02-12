<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
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
        'role',
        'status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getRules($act='add')
    {
        $rules=[
            'name'=>'required|string|max:150',
            'phone'=>'nullable|string',
            'address'=>'nullable|string',
            'image'=>'required|image|max:5000'
        ];

        

        return $rules;
    }

    public function UserInfo()
    {
        return $this->hasOne('App\Models\UserInfo','user_id','id');
    }

    public function getRegisterRules()
    {
        $rules=[
            'name'=>'required|string|max:150',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|confirmed'
        ];

        return $rules;
    }
}
