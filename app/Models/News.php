<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable=[
        'title',
        'slug',
        'category_id',
        'image',
        'status',
        'news_content',
        'view_count',
        'admin_id',
        'seo_title',
        'seo_subtitle',
        'seo_keywords',
        'seo_description'
    ];

    public function getRules($act='add')
    {
        $rules=[
            'title'=>'required|string|max:250',
            'category_id'=>'required|exists:categories,id',
            'news_content'=>'required|string',
            'status'=>'required|in:active,inactive',
            'seo_title'=>'nullable|string',
            'seo_subtitle'=>'nullable|string',
            'seo_keywords'=>'nullable|string',
            'seo_description'=>'nullable|string',
            'image'=>'required|image|max:5000',
        ];

        if($act !='add')
        {
            $rules['image']='sometimes|image|max:5000';
        }

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

    public function getCat()
    {
        return $this->hasOne('App\Models\Category','id','category_id');
    }

    public function admin()
    {
        return $this->hasOne('App\Models\User','id','admin_id');
    }
    
    public function getSubCategory()
    {
        return $this->hasOne('App\Models\Category','id','category_id');
    }

    public function getAdmin()
    {
        return $this->hasOne('App\Models\User','id','admin_id');
    }

    public function getReview()
    {
        return $this->hasMany('APp\Models\NewsReview','news_id','id')->orderBy('id','DESC');
    }

    public function getRecentReviewNews()
    {
        return $this->hasMany('App\Models\NewsReview','news_id','id');
    }
   
    

    
}
