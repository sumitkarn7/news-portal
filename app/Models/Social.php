<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    use HasFactory;

    protected $fillable=[
        'facebook',
        'twitter',
        'youtube',
        'watsaap',
        'gogle',
        'linkedin',
        'pinterest'
    ];

    public function getRules()
    {
        $rules=[
            'facebook'=>'nullable|url',
            'twitter'=>'nullable|url',
            'youtube'=>'nullable|url',
            'watsaap'=>'nullable|url',
            'pinterest'=>'nullable|url',
            'gogle'=>'nullable|url',
            'linkedin'=>'nullable|url',
        ];

        return $rules;
    }
}
