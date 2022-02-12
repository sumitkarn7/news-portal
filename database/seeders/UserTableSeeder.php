<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list=array(
            array(
                'name'=>'Admin User',
                'email'=>'admin@newsportal.com',
                'password'=>bcrypt('adminuser'),
                'role'=>'admin',
                'status'=>'active'
            ),
            array(
                'name'=>'Reporter User',
                'email'=>'reporter@newsportal.com',
                'password'=>bcrypt('reporteruser'),
                'role'=>'reporter',
                'status'=>'active'
            ),
            array(
                'name'=>'Viewer User',
                'email'=>'viewer@newsportal.com',
                'password'=>bcrypt('vieweruser'),
                'role'=>'viewer',
                'status'=>'active'
            )
        );

        foreach($list as $user_info)
        {
            if(User::where('email',$user_info['email'])->count() <=0)
            {
                $user=new User();
                $user->fill($user_info);
                $user->save();
            }
        }
    }
}
