<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'title',
        'image',
        'description'
    ];

    public function getRules()
    {
        $rules=[
            'name'=>'required|string|max:250',
            'title'=>'required|string|max:250',
            'description'=>'required|string',
            'image'=>'sometimes|image|max:5000'
        ];

        return $rules;
    }
}
