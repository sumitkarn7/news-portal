<?php
use App\Models\Category;
function uploadImage($image,$dir,$thumb="50x50")
{
    list($thumb_width,$thumb_height)=explode("x",$thumb);

    $path=public_path().'/Uploads/'.$dir;
    if(!File::exists($path))
    {
        File::makeDirectory($path,0777,true,true);
    }

    $image_name=ucfirst($dir)."-".date("YmdHis")."-".rand(0,9999).".".$image->getClientOriginalExtension();

    $status=$image->move($path,$image_name);
    if($status)
    {
        Image::make($path."/".$image_name)->resize($thumb_width,$thumb_height,function($constraint){
            return $constraint->aspectRatio();
        })->save($path."/".$image_name);

        return $image_name;
    }
    else
    {
        return null;
    }
}


function deleteImage($image,$dir)
{
    $path=public_path()."/Uploads/".$dir."/".$image;

    if(file_exists($path))
    {
        unlink($path);
    }

}


    function getNews()
    {
        $category=new Category();
        $cat=$category->getActiveCat();
        if($cat->count() >0)
        {
            ?>
            <div class="col-md-2 col-sm-3 col-xs-12">
            <!--Tab Btns-->
                <ul class="tab-btns tab-buttons clearfix">
            <?php
            foreach($cat as $cat_info)
            {
                ?>
                                                    
                    <li data-tab="#<?php echo $cat_info->title ?>" class="tab-btn"><?php echo $cat_info->title?></li>
                                                        
                <?php
            }
            ?>
                                                    </ul>
                                                        <a href="#" class="all-cat">All</a>
                                                    </div>
                                                    
                                                        <?php
                                                        foreach($cat as $cat_info)
                                                        {
                                                            ?>
                                                            <div class="col-md-10 col-sm-9 col-xs-12">
                                                        <!--Tabs Container-->
                                                        <div class="tabs-content">
                                                            <!--Tab / Active Tab-->
                                                            <div class="tab active-tab" id="<?php echo $cat_info->title ?>">
                                                                <div class="content">
                                                                
                                                                    <div class="row clearfix"> 
                                                            
                                                                    <?php
                                                                    if($cat_info->getChild->count() >0)
                                                                    {
                                                                        foreach($cat_info->getChild as $child)
                                                                        {
                                                                            foreach($child->getNewsList as $childs)
                                                                            {
                                                                                ?>
                                                                                <!--News Block Nine-->
                                                                                <div class="news-block-nine col-md-4 col-sm-6 col-xs-12">
                                                                                    <div class="inner-box">
                                                                                        <div class="image">
                                                                                            <a href="#"><img src="<?php echo asset('Uploads/News/'.$childs->image) ?>" alt="" /></a>
                                                                                            <div class="category"><a href="#">Travel</a></div>
                                                                                        </div>
                                                                                        <div class="lower-box">
                                                                                            <h3><a href="#">Selena Gomez and Lady Gaga join Billboard campaign to stop violence</a></h3>
                                                                                            <div class="post-date">March 16, 2016</div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <?php
                                                                            }
                                                                            
                                                                        }
                                                                    }
                                                                    ?>
                                                                    </div>
                                                                    
                                                                </div>
                                                            </div>
                                                            <?php

                                                        }
                                                        ?>
                                                        </div>
                                                    </div>
            <?php
        }
        
    }

?>
