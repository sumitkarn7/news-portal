<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
class CategoryTableSeeder extends Seeder
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
                'title'=>'Economics',
                'slug'=>\Str::slug('Economics'),
                'description'=>'Economics Desciption',
                'status'=>'active'
            ),
            array(
                'title'=>'Sports',
                'slug'=>\Str::slug('Sports'),
                'description'=>'Sports Desciption',
                'status'=>'active'
            ),
            array(
                'title'=>'Cricket',
                'slug'=>\Str::slug('Cricket'),
                'description'=>'Cricket Desciption',
                'status'=>'active'
            )
        );

        foreach($list as $cat_info)
        {
            if(Category::where('slug',$cat_info['slug'])->count() <=0)
            {
                $category=new Category();
                $category->fill($cat_info);
                $category->save();
            }
        }
    }
}
