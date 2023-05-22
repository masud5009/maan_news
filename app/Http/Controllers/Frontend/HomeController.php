<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Maanuser;
use App\Models\News;
use App\Models\Newscategory;
use App\Models\Photogallery;
use App\Models\Videogallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class HomeController extends Controller
{
    /**
     * Display a listing of the Web view information .
     *
     */
    public function maanIndex()
    {
        $latestnews = News::join('newssubcategories','news.subcategory_id','=','newssubcategories.id')
            ->join('newscategories','newssubcategories.category_id','=','newscategories.id')
            ->join('users','news.reporter_id','=','users.id')
            ->select('news.id','news.title','news.image','news.date','news.created_at','newssubcategories.name as news_subcategory','newscategories.name as news_category','newscategories.slug as news_categoryslug',DB::raw("CONCAT(users.first_name,' ',users.last_name) AS reporter_name"))
            ->where('news.status',1)
            ->latest()
            ->take(3)
            ->get();

        $newscategories = Newscategory::orderByDesc('post_counter')->get();


        $popularsnews = News::join('newssubcategories','news.subcategory_id','=','newssubcategories.id')
            ->join('newscategories','newssubcategories.category_id','=','newscategories.id')
            ->join('users','news.reporter_id','=','users.id')
            ->select('news.id','news.title','news.image','news.date','newscategories.name as news_category','newscategories.slug as news_categoryslug',DB::raw("CONCAT(users.first_name,' ',users.last_name) AS reporter_name"))
            ->where('news.status',1)
            ->orderByDesc('news.viewers')
            ->limit(3)
            ->get();
        $popularsnewsall = News::join('newssubcategories','news.subcategory_id','=','newssubcategories.id')
            ->join('newscategories','newssubcategories.category_id','=','newscategories.id')
            ->join('users','news.reporter_id','=','users.id')
            ->select('news.id','news.title','news.image','news.date','newscategories.name as news_category','newscategories.slug as news_categoryslug',DB::raw("CONCAT(users.first_name,' ',users.last_name) AS reporter_name"))
            ->where('news.status',1)
            ->orderByDesc('news.viewers')
            ->limit(3)
            ->get();
        $popularsnewsworld = News::join('newssubcategories','news.subcategory_id','=','newssubcategories.id')
            ->join('newscategories','newssubcategories.category_id','=','newscategories.id')
            ->join('users','news.reporter_id','=','users.id')
            ->select('news.id','news.title','news.image','news.date','newscategories.name as news_category','newscategories.slug as news_categoryslug',DB::raw("CONCAT(users.first_name,' ',users.last_name) AS reporter_name"))
            ->where('newscategories.name','World')
            ->where('news.status',1)
            ->orderByDesc('news.viewers')
            ->limit(3)
            ->get();
        $popularsnewslifestyle = News::join('newssubcategories','news.subcategory_id','=','newssubcategories.id')
            ->join('newscategories','newssubcategories.category_id','=','newscategories.id')
            ->join('users','news.reporter_id','=','users.id')
            ->select('news.id','news.title','news.image','news.date','newscategories.name as news_category','newscategories.slug as news_categoryslug',DB::raw("CONCAT(users.first_name,' ',users.last_name) AS reporter_name"))
            ->where('newscategories.name','Lifestyle')
            ->where('news.status',1)
            ->orderByDesc('news.viewers')
            ->limit(3)
            ->get();
        $popularsnewsentertainment = News::join('newssubcategories','news.subcategory_id','=','newssubcategories.id')
            ->join('newscategories','newssubcategories.category_id','=','newscategories.id')
            ->join('users','news.reporter_id','=','users.id')
            ->select('news.id','news.title','news.image','news.date','newscategories.name as news_category','newscategories.slug as news_categoryslug',DB::raw("CONCAT(users.first_name,' ',users.last_name) AS reporter_name"))
            ->where('newscategories.name','Entertainment')
            ->where('news.status',1)
            ->orderByDesc('news.viewers')
            ->limit(3)
            ->get();
        $popularsnewssports = News::join('newssubcategories','news.subcategory_id','=','newssubcategories.id')
            ->join('newscategories','newssubcategories.category_id','=','newscategories.id')
            ->join('users','news.reporter_id','=','users.id')
            ->select('news.id','news.title','news.image','news.date','newscategories.name as news_category','newscategories.slug as news_categoryslug',DB::raw("CONCAT(users.first_name,' ',users.last_name) AS reporter_name"))
            ->where('newscategories.name','Sports')
            ->where('news.status',1)
            ->orderByDesc('news.viewers')
            ->limit(3)
            ->get();
        $popularsnewstechnology = News::join('newssubcategories','news.subcategory_id','=','newssubcategories.id')
            ->join('newscategories','newssubcategories.category_id','=','newscategories.id')
            ->join('users','news.reporter_id','=','users.id')
            ->select('news.id','news.title','news.image','news.date','newscategories.name as news_category','newscategories.slug as news_categoryslug',DB::raw("CONCAT(users.first_name,' ',users.last_name) AS reporter_name"))
            ->where('newscategories.name','Technology')
            ->where('news.status',1)
            ->orderByDesc('news.viewers')
            ->limit(3)
            ->get();
        $latestnewsnational = News::join('newssubcategories','news.subcategory_id','=','newssubcategories.id')
            ->join('newscategories','newssubcategories.category_id','=','newscategories.id')
            ->join('users','news.reporter_id','=','users.id')
            ->select('news.id','news.title','news.image','news.date','news.created_at','newscategories.name as news_category','newscategories.slug as news_categoryslug',DB::raw("CONCAT(users.first_name,' ',users.last_name) AS reporter_name"))
            ->where('newscategories.name','National')
            ->where('news.status',1)
            ->latest()
            ->take(4)
            ->get();
        $latestnewsworld = News::join('newssubcategories','news.subcategory_id','=','newssubcategories.id')
            ->join('newscategories','newssubcategories.category_id','=','newscategories.id')
            ->join('users','news.reporter_id','=','users.id')
            ->select('news.id','news.title','news.image','news.date','news.created_at','newscategories.name as news_category','newscategories.slug as news_categoryslug',DB::raw("CONCAT(users.first_name,' ',users.last_name) AS reporter_name"))
            ->where('newscategories.name','World')
            ->where('news.status',1)
            ->latest()
            ->take(3)
            ->get();
        $latestnewspolitics = News::join('newssubcategories','news.subcategory_id','=','newssubcategories.id')
            ->join('newscategories','newssubcategories.category_id','=','newscategories.id')
            ->join('users','news.reporter_id','=','users.id')
            ->select('news.id','news.title','news.image','news.date','news.created_at','newscategories.name as news_category','newscategories.slug as news_categoryslug',DB::raw("CONCAT(users.first_name,' ',users.last_name) AS reporter_name"))
            ->where('newscategories.name','Politics')
            ->where('news.status',1)
            ->latest()
            ->take(6)
            ->get();
        $latestnewslifestyle = News::join('newssubcategories','news.subcategory_id','=','newssubcategories.id')
            ->join('newscategories','newssubcategories.category_id','=','newscategories.id')
            ->join('users','news.reporter_id','=','users.id')
            ->select('news.id','news.title','news.image','news.date','news.created_at','newscategories.name as news_category','newscategories.slug as news_categoryslug',DB::raw("CONCAT(users.first_name,' ',users.last_name) AS reporter_name"))
            ->where('newscategories.name','Lifestyle')
            ->where('news.status',1)
            ->latest()
            ->take(5)
            ->get();

        $latestnewsentertainment = News::join('newssubcategories','news.subcategory_id','=','newssubcategories.id')
            ->join('newscategories','newssubcategories.category_id','=','newscategories.id')
            ->join('users','news.reporter_id','=','users.id')
            ->select('news.id','news.title','news.image','news.date','news.created_at','newscategories.name as news_category','newscategories.slug as news_categoryslug',DB::raw("CONCAT(users.first_name,' ',users.last_name) AS reporter_name"))
            ->where('newscategories.name','Entertainment')
            ->where('news.status',1)
            ->latest()
            ->take(4)
            ->get();
        $latestnewssports = News::join('newssubcategories','news.subcategory_id','=','newssubcategories.id')
            ->join('newscategories','newssubcategories.category_id','=','newscategories.id')
            ->join('users','news.reporter_id','=','users.id')
            ->select('news.id','news.title','news.image','news.date','news.created_at','newscategories.name as news_category','newscategories.slug as news_categoryslug',DB::raw("CONCAT(users.first_name,' ',users.last_name) AS reporter_name"))
            ->where('newscategories.name','Sports')
            ->where('news.status',1)
            ->latest()
            ->take(5)
            ->get();
        $latestnewstechnology = News::join('newssubcategories','news.subcategory_id','=','newssubcategories.id')
            ->join('newscategories','newssubcategories.category_id','=','newscategories.id')
            ->join('users','news.reporter_id','=','users.id')
            ->select('news.id','news.title','news.image','news.date','news.created_at','newscategories.name as news_category','newscategories.slug as news_categoryslug',DB::raw("CONCAT(users.first_name,' ',users.last_name) AS reporter_name"))
            ->where('newscategories.name','Technology')
            ->where('news.status',1)
            ->latest()
            ->take(6)
            ->get();
        $latestnewsbusiness = News::join('newssubcategories','news.subcategory_id','=','newssubcategories.id')
            ->join('newscategories','newssubcategories.category_id','=','newscategories.id')
            ->join('users','news.reporter_id','=','users.id')
            ->select('news.id','news.title','news.image','news.date','news.created_at','newscategories.name as news_category','newscategories.slug as news_categoryslug',DB::raw("CONCAT(users.first_name,' ',users.last_name) AS reporter_name"))
            ->where('newscategories.name','Business')
            ->where('news.status',1)
            ->latest()
            ->take(5)
            ->get();
        $latestphotogalleries = Photogallery::join('users','photogalleries.user_id','=','users.id')
            ->select('photogalleries.id','photogalleries.title','photogalleries.image','photogalleries.created_at',DB::raw("CONCAT(users.first_name,' ',users.last_name) AS user_name"))
            ->where('status',1)
            ->latest()
            ->take(10)
            ->get();
        $latestVideoGalleries = Videogallery::join('users','videogalleries.user_id','=','users.id')
            ->select('videogalleries.*',DB::raw("CONCAT(users.first_name,' ',users.last_name) AS user_name"))
            ->where('status',1)
            ->latest()
            ->take(10)
            ->get();;

        $this->sitemap();

        return view('frontend.pages.home',compact('latestnews','newscategories','popularsnews','popularsnewsall','popularsnewsworld','popularsnewslifestyle','popularsnewsentertainment','popularsnewssports','popularsnewstechnology','latestnewsnational','latestnewsworld','latestnewspolitics','latestnewslifestyle','latestphotogalleries','latestnewsentertainment','latestnewssports','latestnewstechnology','latestnewsbusiness','latestVideoGalleries'));
    }

    public function sitemap()
    {
        $site = App::make('sitemap');
        //$site->add(URL::to('/'), date("Y-m-d h:i:s"),1,'daily');

        $latestnews = News::join('newssubcategories','news.subcategory_id','=','newssubcategories.id')
            ->join('newscategories','newssubcategories.category_id','=','newscategories.id')
            ->select('news.id','news.title','news.date','news.created_at','newscategories.name as news_category')
            ->latest()
            ->get();
        foreach ($latestnews as $news){
            $site->add(URL::to(strtolower($news->news_category)), $news->created_at,1.0,'daily');
        }

        $site->store('xml','sitemap');

    }

    public function subscribeAjax(Request $request)
    {
        $count = Maanuser::where('email',$request->email)->count();
        if ($count>0) {
           $this->setError('Existing');
            return $count;
        }
        Maanuser::updateOrCreate(['email'=>$request->email]);
        return $request;
    }

}
