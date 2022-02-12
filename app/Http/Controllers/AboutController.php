<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $about=null;

    public function __construct(About $about)
    {
        $this->about=$about;
    }
    public function index()
    {
        $this->about=$this->about->first();
        return view('admin.about.index')
        ->with('about',$this->about);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit(About $about)
    {
        return view('admin.about.form')
        ->with('data',$about);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, About $about)
    {
        $rules=$about->getRules();
        $request->validate($rules);
        $data=$request->except('image');

        
        if($request->image)
        {
            $image=uploadImage($request->image,"About","381x409");
            if($about->image && $about->image !=null)
            {
                deleteImage($about->image,"About");
            }
            $data['image']=$image;
        }

        $about->fill($data);
        $status=$about->save();
        if($status)
        {
            $request->session('success','About Section Updated Successfully !');
        }
        else
        {
            $request->session('error','Sorry ! There Was A Problem While Updating About Section');
        }

        return redirect()->route('about.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy(About $about)
    {
        //
    }
}
