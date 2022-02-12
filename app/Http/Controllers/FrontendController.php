<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Theme;
use App\Models\Category;
use App\Models\NewsReview;
use App\Models\Promotion;
use App\Models\Contact;
use App\Models\About;
class FrontendController extends Controller
{

    protected $news=null;
    protected $theme=null;
    protected $category=null;
    protected $news_review=null;
    protected $promotion=null;
    protected $contact=null;
    protected $about=null;
    public function __construct(News $news,Theme $theme,Category $category,NewsReview $news_review,Promotion $promotion,Contact $contact,About $about)
    {
        $this->news=$news;
        $this->theme=$theme;
        $this->category=$category;
        $this->news_review=$news_review;
        $this->promotion=$promotion;
        $this->contact=$contact;
        $this->about=$about;
    }
    public function index()
    {
        $latest_news=$this->news->where('status','active')->latest()->limit(5)->get();

        $news_latest=$this->news->where('status','active')->latest()->paginate(2);

        $theme=$this->theme->first();

        $category=$this->category->where('status','active')->whereNull('parent_id')->get();

        $popular_news=$this->news->where('status','active')->orderBy('view_count','DESC')->limit(4)->get();

        $recent_news=$this->news->latest()->where('status','active')->limit(4)->get();

        $yesterday = date("Y-m-d", strtotime( '-1 days' ) );
        $old_news=$this->news->whereDate('created_at', $yesterday )->where('status','active')->limit(9)->get();
       
        $this->category=$this->category->where('parent_id','!=','null')->where('status','active')->get();
        $all_news=$this->news->where('status','active')->inRandomOrder()->get();

        $recent_twits=$this->news_review->get();

        $this->promotion=$this->promotion->first();

        $recent_review_id=$this->news_review->orderBy('id','Desc')->limit(1)->get();
        
        $recent_review_news=$this->news->where('id',$recent_review_id[0]['news_id'])->get();
        

        return view('front.index')
        ->with('latest_news',$latest_news)
        ->with('news_latest',$news_latest)
        ->with('theme',$theme)
        ->with('category',$category)
        ->with('popular',$popular_news)
        ->with('recent',$recent_news)
        ->with('old_news',$old_news)
        ->with('category_list',$this->category)
        ->with('all_news',$all_news)
        ->with('twits',$recent_twits)
        ->with('promo',$this->promotion)
        ->with('recent_news',$recent_review_news);
    }

    public function newsDetail(Request $request,$slug)
    {
        
        $news=$this->news->where('slug',$slug)->where('status','active')->firstOrFail();
        $theme=$this->theme->first();


        
        if($news)
        {
            $news->view_count=$news->view_count+1;
            $news->save();
        }

        $related_news=$this->news->where('category_id',$news->category_id)->where('status','active')->where('id','!=',$news->id)->get();

        $this->promotion=$this->promotion->first();

        $popular=$this->news->where('status','active')->orderBy('view_count','DESC')->limit(4)->get();

        $recent=$this->news->where('status','active')->latest()->limit(4)->get();
        $yesterday=date("Y-m-d", strtotime( '-1 days' ) );
        $old_news=$this->news->whereDate('created_at', $yesterday )->where('status','active')->limit(9)->get();
       
        $recent_review_id=$this->news_review->orderBy('id','Desc')->limit(1)->get();
        
        $recent_review_news=$this->news->where('id',$recent_review_id[0]['news_id'])->get();
        

        
        return view('front.news-detail')
        ->with('theme',$theme)
        ->with('news',$news)
        ->with('related_news',$related_news)
        ->with('promo',$this->promotion)
        ->with('popular',$popular)
        ->with('recent',$recent)
        ->with('old_news',$old_news)
        ->with('recent_news',$recent_review_news);
    }

    public function addReview(Request $request,$id)
    {
        $this->news=$this->news->findOrFail($id);
        $rules=$this->news_review->getRules();
        $request->validate($rules);

        $data=$request->all();
        $data['news_id']=$this->news->id;
        $data['reviewed_by']=auth()->user()->id;

        $this->news_review->fill($data);
        $status=$this->news_review->save();
        if($status)
        {
            $request->session()->flash('success','Your Comment Added Successfully !');
        }
        else
        {
            $request->session()->flash('error','Sorry ! Some Problem WHile Adding Your Comment');
        }
        
        return redirect()->back();
    }

    public function categoryNews(Request $request,$slug)
    {
        $this->category=$this->category->where('slug',$slug)->firstOrFail();

        $cat_news=$this->news->where('category_id',$this->category->id)->get();

        $latest=$this->news->where('status','active')->latest()->limit(6)->get();

        $recent_review_id=$this->news_review->orderBy('id','Desc')->limit(1)->get();
        
        $recent_review_news=$this->news->where('id',$recent_review_id[0]['news_id'])->get();

        $theme=$this->theme->first();
        return view('front.catproduct')
        ->with('theme',$theme)
        ->with('cat_news',$cat_news)
        ->with('latest',$latest)
        ->with('cat',$this->category)
        ->with('recent_news',$recent_review_news);
    }

    public function contact()
    {
        $theme=$this->theme->first();
        return view('front.contact')
        ->with('theme',$theme);
    }

    public function saveMessage(Request $request)
    {
        $rules=[
            'message'=>'required|string'
        ];

        $request->validate($rules);
        $data=$request->all();
        $data['message_by']=auth()->user()->id;

        $this->contact->fill($data);
        $status=$this->contact->save();
        if($status)
        {
            $request->session()->flash('success','Your Message Has Been Delivered Successfully !');
        }
        else
        {
            $request->session()->flash('error','Sorry ! There Was A Problem While Sending Your Message');
        }

        return redirect()->back();
    }

    public function about()
    {
        return view('front.about')
        ->with('about',$this->about->first());
    }
}


