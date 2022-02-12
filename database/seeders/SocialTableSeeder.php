<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Social;
class SocialTableSeeder extends Seeder
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
                'facebook'=>'fb.com'
            )
        );

        foreach($list as $theme_info)
        {
            $theme=new Social();
            $theme->fill($theme_info);
            $theme->save();
        }
    }
}
