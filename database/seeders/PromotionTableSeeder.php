<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Promotion;
class PromotionTableSeeder extends Seeder
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
                'top_place'=>'top',
                'middle_place'=>'middle',
                'footer_place'=>'footer'
            )
        );

        foreach($list as $info)
        {
            $adver=new Promotion;
            $adver->fill($info);
            $adver->save();
        }
    }
}
