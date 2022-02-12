<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    use HasFactory;

    protected $fillable=[
        'address',
        'image',
        'phone_number',
        'user_id',
        'created_by'
    ];
}
