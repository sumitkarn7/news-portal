<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\About;
class AboutTableSeeder extends Seeder
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
                'name'=>'Sumit Karn',
                'title'=>'My Introduction',
                'image'=>'sumit',
                'description'=>'Hello'
            )
        );

        foreach($list as $about_info)
        {
            $about=new About();
            $about->fill($about_info);
            $about->save();
        }
    }
}
