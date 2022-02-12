<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;
    
    protected $fillable=[
        'top_link',
        'middle_link',
        'footer_link',
        'top_place',
        'middle_place',
        'footer_place',
        'created_by'
    ];

    public function getRules()
    {
        $rules=[
            'top_link'=>'nullable|url',
            'middle_link'=>'nullable|url',
            'footer_link'=>'nullable|url',
            'top_place'=>'nullable|image|max:5000',
            'middle_place'=>'nullable|image|max:5000',
            'footer_place'=>'nullable|image|max:5000'
        ];

        return $rules;
    }
}
