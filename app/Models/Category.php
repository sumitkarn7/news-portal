<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable=[
        'title',
        'slug',
        'parent_id',
        'description',
        'status',
        'created_by'
    ];


    public function getRules()
    {
        $rules=[
            'title'=>'required|string|max:250',
            'parent_id'=>'nullable|exists:categories,id',
            'description'=>'nullable|string',
            'status'=>'required|in:active,inactive'
        ];

        return $rules;
    }

    public function getSlugs($title)
    {
        $slug=\Str::slug($title);

        if($this->where('slug',$slug)->count() >0)
        {
            $slug=$slug."-".rand(0,9999);
            $this->getSlugs($slug);
        }

        return $slug;
    }

    public function getUser()
    {
        return $this->hasOne('App\Models\User','id','created_by');
    }

    public function getChild()
    {
        return $this->hasMany('App\Models\Category','parent_id','id');
    }

    public function getSubCat()
    {
        return $this->hasMany('App\Models\Category','parent_id','id');
    }

    public function getNews()
    {
        return $this->hasMany('App\Models\News','category_id','id')->where('status','active')->inRandomOrder();
    }

    public function getViewNews()
    {
        return $this->hasMany('App\Models\News','category_id','id')->where('status','active')->orderBy('id','DESC');
    }

    public function getCat()
    {
        return $this->hasOne('App\Models\Category','id','parent_id');
    }

    public function getActiveCat()
    {
        return $this->where('status','active')->whereNull('parent_id')->get();
    }

    public function getNewsList()
    {
        return $this->hasMany('App\Models\News','category_id','id');
    }

    
}
