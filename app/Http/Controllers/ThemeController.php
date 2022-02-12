<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Theme;
class ThemeController extends Controller
{
    protected $theme=null;

    public function __construct(Theme $theme)
    {
        $this->theme=$theme;
    }
    public function index()
    {
        $all_theme=$this->theme->get();
        return view('admin.theme.index',compact('all_theme'));
    }

    public function update(Request $request,$id)
    {
        $this->theme=$this->theme->findOrFail($id);
        $rules=$this->theme->getRules();
        $request->validate($rules);

        $data=$request->all();

        if($request->header_logo)
        {
            $head_image=uploadImage($request->header_logo,"Header","250x300");
            if($head_image)
            {
                if($this->theme->header_logo && $this->theme->header_logo !=null)
                {
                    deleteImage($this->theme->header_logo,"Header");
                }
                $data['header_logo']=$head_image;
            }
        }

        if($request->footer_logo)
        {
            $foot_image=uploadImage($request->footer_logo,"Footer","270x300");
            if($foot_image)
            {
                if($this->theme->footer_logo && $this->theme->footer_logo !=null)
                {
                    deleteImage($this->theme->footer_logo,"Footer");
                }
                $data['footer_logo']=$foot_image;
            }
        }

        if($request->fav_icon)
        {
            $fav_image=uploadImage($request->fav_icon,"Fav","150x50");
            if($fav_image)
            {
                if($this->theme->fav_icon && $this->theme->fav_icon !=null)
                {
                    deleteImage($this->theme->fav_icon,"Fav");
                }
                $data['fav_icon']=$fav_image;
            }
        }

        $this->theme->fill($data);
        $status=$this->theme->save();
        if($status)
        {
            $request->session()->flash('success','Theme Has Been Updated Successfully !');
        }
        else
        {
            $request->session()->flash('error','Sorry ! There Was A Problem While Updating Theme');
        }

        return redirect()->back();

        
    }
}
