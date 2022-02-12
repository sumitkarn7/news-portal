<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsReview extends Model
{
    use HasFactory;

    protected $fillable=[
        'news_id',
        'reviewed_by',
        'review'
    ];

    public function getRules()
    {
        $rules=[
            'review'=>'required|string|max:250'
        ];

        return $rules;
    }

    public function getUser()
    {
        return $this->hasOne('App\Models\User','id','reviewed_by');
    }
}
