<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promotion;
class PromotionController extends Controller
{
     //
     protected $promotion=null;

     public function __construct(Promotion $promotion)
     {
         $this->promotion=$promotion;
     }
 
     public function index()
     {
         $all_adver=$this->promotion->first();
 
         
         return view('admin.promotion.index')
         ->with('all_adver',$all_adver);
     }
 
     public function update(Request $request,$id)
     {
 
         $this->promotion=$this->promotion->findOrFail($id);
 
         $rules=$this->promotion->getRules();
         $request->validate($rules);

         $data=$request->except(['top_place','middle_place','footer_place']);

         if($request->top_place)
         {
             $top=uploadImage($request->top_place,"Promo_top","700x87");
             if($top)
             {
                 if($this->promotion->top_place && $this->promotion->top_place !=null)
                 {
                     deleteImage($this->promotion->top_place,"Promo_top");
                 }
                 $data['top_place']=$top;
             }
         }
 
         if($request->middle_place)
         {
             $middle=uploadImage($request->middle_place,"Promo_middle","340x283");
             if($middle)
             {
                 if($this->promotion->middle_place && $this->promotion->middle_place !=null)
                 {
                     deleteImage($this->promotion->middle_place,"Promo_top");
                 }
                 $data['middle_place']=$middle;
             }
         }
 
         if($request->footer_place)
         {
             $footer=uploadImage($request->footer_place,"Promo_footer","980x121");
             if($footer)
             {
                 if($this->promotion->footer_place && $this->promotion->footer_place !=null)
                 {
                     deleteImage($this->promotion->footer_place,"Promo_footer");
                 }
                 $data['footer_place']=$footer;
             }
         }

 
         $this->promotion->fill($data);
         $status=$this->promotion->save();
         if($status)
         {
             $request->session()->flash('success','promotion Updated Successfully !');
         }
         else
         {
             $request->session()->flash('error','Sorry ! There Was A Problem While Updating promotion');
         }
 
         return redirect()->back();
 
     }
}
