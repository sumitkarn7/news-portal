<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use App\Models\Category;

class NewsController extends Controller
{

    protected $category=null;
    protected $news=null;

    public function __construct(Category $category,News $news)
    {
        $this->category=$category;
        $this->news=$news;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_news=$this->news->get();
        return view('admin.news.index')
        ->with('news',$all_news);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parent_cat=$this->category->whereNUll('parent_id')->get();
        

        $cat_dropdown="<option selected disabled>------------Select Any One-------------------</option>";

        foreach($parent_cat as $cat)
        {
            $cat_dropdown.="<option value='".$cat->id."'>".$cat->title."</option>";
            $sub_cat=$this->category->where('parent_id',$cat->id)->get();

            foreach($sub_cat as $sub)
            {
                $cat_dropdown.="<option value='".$sub->id."'>&nbsp;&nbsp;&nbsp;&nbsp;-----".$sub->title."</option>";
            }
        }
        return view('admin.news.form',compact('cat_dropdown'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=$this->news->getRules();
        $request->validate($rules);
        $data=$request->except('image');

        $image=uploadImage($request->image,"News","610x981");
        if($image)
        {
            $data['image']=$image;
        }
        $data['slug']=$this->news->getSlugs($request->title);
        $data['admin_id']=auth()->user()->id;

        $this->news->fill($data);
        $status=$this->news->save();
        if($status)
        {
            $request->session()->flash('success','News Added Successfully !');
        }
        else
        {
            $request->session()->flash('error','Sorry There Was A Problem While Adding News !');
        }

        return redirect()->route('news.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $parent_cat=$this->category->whereNUll('parent_id')->get();
        

        $cat_dropdown="<option selected disabled>------------Select Any One-------------------</option>";

        foreach($parent_cat as $cat)
        {
            if($cat->id==$news->category_id)
            {
                $selected="selected";
            }
            else
            {
                $selected="";
            }
            $cat_dropdown.="<option value='".$cat->id."'".$selected.">".$cat->title."</option>";
            $sub_cat=$this->category->where('parent_id',$cat->id)->get();

            foreach($sub_cat as $sub)
            {
                
                if($sub->id==$news->category_id)
                {
                    $selected="selected";
                }
                else
                {
                    $selected="";
                }
                $cat_dropdown.="<option value='".$sub->id."'".$selected.">&nbsp;&nbsp;&nbsp;&nbsp;-----".$sub->title."</option>";
            }
        }
        return view('admin.news.form',compact('cat_dropdown'))
        ->with('edit_cat',$news);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $rules=$news->getRules('update');
        $request->validate($rules);
        $data=$request->except('image');

        if($request->image)
        {
            $image=uploadImage($request->image,"News","610x981");
            if($image)
            {
                if($news->image && $news->image !=null)
                {
                    deleteImage($news->image,"news");
                }
                $data['image']=$image;
            }
        }

        $data['admin_id']=auth()->user()->id;

        $news->fill($data);
        $status=$news->save();
        if($status)
        {
            $request->session()->flash('success','News Updated Successfully !');
        }
        else
        {
            $request->session()->flash('error','Sorry ! There Was A problem While Updating News');
        }

        return redirect()->route('news.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $image=$news->image;
        $del=$news->delete();
        if($del)
        {
            if($image)
            {
                deleteImage($image,"News");
            }
            request()->session()->flash('success','News Deleted Successfully !');
        }
        else
        {
            request()->session()->flash('error','Sorry ! There Was A Problem While Deleting News');
        }

        return redirect()->back();
    }


    public function updateStatus(Request $request,$id,$status)
    {
        $this->news=$this->news->findOrFail($id);

        if($status=='active')
        {
            $this->news->status='inactive';
        }
        else
        {
            $this->news->status='active';
        }

        $status=$this->news->save();
        if($status)
        {
            $request->session()->flash('success','News Status Updated Successfully !');
        }
        else
        {
            $request->session()->flash('error','Sorry ! There Was A Problem While Updating News Status ');
        }
        return redirect()->back();
    }
}
