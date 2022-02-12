<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    protected $user=null;
    protected $user_info=null;

    public function __construct(User $user,UserInfo $user_info)
    {
        $this->user=$user;
        $this->user_info=$user_info;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//        $this->user=$this->user->findOrFail($id);

        return view('admin.user.form');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->user=$this->user->findOrFail($id);
        $rules=$this->user->getRules();
        $request->validate($rules);
        $data=$request->except('image');

        $image=uploadImage($request->image,"User","100x100");
        if($image)
        {
            if($this->user->UserInfo && $this->user->UserInfo->image !=null)
            {
                deleteImage($this->user->UserInfo->image,"User");
            }
            $data['image']=$image;
        }

        $this->user->fill($data);
        $status=$this->user->save();
        if($status)
        {
            $this->user_info=$this->user->UserInfo;
            if(!$this->user_info)
            {
                $this->user_info=new UserInfo();
            }
            $data['user_id']=$this->user->id;
            $data['created_by']=auth()->user()->id;

            $this->user_info->fill($data);
            $this->user_info->save();
            $request->session()->flash('success','User Profile Updated Successfully !');
        }
        else
        {
            $request->session()->flash('error','Sorry ! There Was A Problem While Updating Profile');
        }

        return redirect()->route('admin');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function showPassword()
    {
        return view('admin.user.password-form');
    }

    public function updatePassword(Request $request,$id)
    {
        // dd($request->all());
        $this->user=$this->user->findOrFail($id);
        
        if(!Hash::check($request->old_password,$this->user->password))
        {
            $request->session()->flash('error','Sorry ! Old Password Is Not Match In Our Database');
           return redirect()->back();
        }

        $rules=[
            'password'=>'required|confirmed|min:5'
        ];

        $request->validate($rules);

        $this->user->password=bcrypt($request->password);
        $status=$this->user->save();
        if($status)
        {
            $request->session()->flash('success','Password Updated Successfully !');
        }
        else
        {
            $request->session()->flash('error','Sorry ! There Was A Problem While Updating Password');
        }

        auth()->logout();
        return redirect('login');

        // return redirect()->route('admin');
    }

    public function register(Request $request)
    {

        $rules=$this->user->getRegisterRules('register');
        $request->validate($rules);
        $data=$request->all();
        $data['status']='active';
        $this->user->fill($data);
        $status=$this->user->save();
        if($status)
        {
            auth()->loginUsingId($this->user->id);
            $request->session()->flash('success','Congratulation Your Account Has Been Created Successfully !');

        }
        else
        {
            $request->session()->flash('error','Sorry ! There Was A Problem While Creating Your Account !');
        }

        return redirect()->route('homepage');
        dd($data);

    }
}
