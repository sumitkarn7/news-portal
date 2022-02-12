<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    protected $category=null;

    public function __construct(Category $category)
    {
        $this->category=$category;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_category=$this->category->whereNull('parent_id')->get();
        return view('admin.category.index')
        ->with('category',$all_category);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parent_cat=$this->category->whereNull('parent_id')->get();
        return view('admin.category.form')
        ->with('parent_cat',$parent_cat);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $rules=$this->category->getRules();
        $request->validate($rules);

        $data=$request->all();

        $data['slug']=$this->category->getSlugs($request->title);
        $data['created_by']=auth()->user()->id;

        $this->category->fill($data);

        $status=$this->category->save();
        if($status)
        {
            $request->session()->flash('success','Category Added Successfully !');
        }
        else
        {
            $request->session()->flash('error','Sorry ! There Was A Problem While Ading Category');
        }

        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $parent_cat=$this->category->whereNull('parent_id')->where('id','!=',$category->id)->get();
        return view('admin.category.form')
        ->with('parent_cat',$parent_cat)
        ->with('edit_cat',$category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $rules=$category->getRules();
        $request->validate($rules);
        $data=$request->all();

        $category->fill($data);
        $status=$category->save();
        if($status)
        {
            $request->session()->flash('success','Category Updated Successfully !');
        }
        else
        {
            $request->session()->flash('error','Sorry ! There Was A Problem While Updating Category');
        }

        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $del=$category->delete();
        if($del)
        {
            request()->session()->flash('success','Category Deleted Successfully !');
        }
        else
        {
            request()->session()->flash('error','Sorry ! There Was A Problem While Deleting Category');
        }

        return redirect()->back();
    }

    public function updateStatus(Request $request,$id,$status)
    {
        $this->category=$this->category->findOrFail($id);

        if($status=='active')
        {
            $this->category->status='inactive';
        }
        else
        {
            $this->category->status='active';
        }

        $status=$this->category->save();
        if($status)
        {
            $request->session()->flash('success','Category Status Updated Successfully !');
        }
        else
        {
            $request->session()->flash('error','Sorry ! There Was A Problem While Updating Category Status');
        }

        return redirect()->back();
    }

    public function getChild(Request $request)
    {
        $this->category=$this->category->where('slug',$request->slug)->firstOrFail();

        $all_category=$this->category->getChild;
        return view('admin.category.index')
        ->with('category',$all_category)
        ->with('parent',$this->category);
        

    }
}
