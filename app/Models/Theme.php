<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    use HasFactory;

    protected $fillable=[
        'site_title',
        'header_logo',
        'footer_logo',
        'fav_icon'
    ];

    public function getRules()
    {
        $rules=[
            'header_logo'=>'nullable|image|max:5000',
            'footer_logo'=>'nullable|image|max:5000',
            'fav_icon'=>'nullable|image|max:5000'
        ];

        return $rules;
    }
}
