<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Social;
class SocialController extends Controller
{
    protected $social=null;

    public function __construct(Social $social)
    {
        $this->social=$social;
    }
    public function index()
    {
        $social=$this->social->first();
        return view('admin.social.index')
        ->with('social',$social);
    }

    public function update(Request $request,$id)
    {
        
        $this->social=$this->social->findOrFail($id);

        $rules=$this->social->getRules();
        $request->validate($rules);

        $data=$request->all();
        $this->social->fill($data);
        $status=$this->social->save();
        if($status)
        {
            $request->session()->flash('success','Social Site Updated Successfully !');
        }
        else
        {
            $request->session()->flash('error','Sorry ! There Was A Problem While Updating Social Site');
        }

        return redirect()->back();

    }
}
