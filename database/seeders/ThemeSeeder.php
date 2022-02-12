<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Theme;
class ThemeSeeder extends Seeder
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
                'site_title'=>'News-Portal'
            )
        );

        foreach($list as $theme_info)
        {
            $theme=new Theme();
            $theme->fill($theme_info);
            $theme->save();
        }
    }
}
