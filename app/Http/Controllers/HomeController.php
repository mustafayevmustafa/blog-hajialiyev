<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Advertising;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class HomeController extends Controller
{


    public  function  index()
    {

        $about=About::first();
        $reklams=Advertising::inRandomOrder()->first();
        $categories = Category::where('parent_id', 0)->with('subcat')->get();
        $last_articles=Article::with('getCategory')->where('deleted_at',null)->latest()->limit(5)->get();
        $mostRead=Article::with('getCategory')->latest('hit')->where('deleted_at',null)->limit(5)->get();
        
         $categoryArticles = Category::select('name','slug',
         DB::raw('(SELECT array_to_json(array_agg(raw_)) FROM (SELECT title ,sub_title, content , slug , image , deleted_at FROM articles WHERE articles.deleted_at IS NULL AND articles.category_id = categories.id  ORDER BY id DESC LIMIT 5) as raw_ ) as articles')
         )->get();

        return view('home', compact('about','reklams','categories','reklams','last_articles' , 'mostRead','categoryArticles','about'));

    }

    public function  category($category)
    {
        $about=About::first();
        $reklams=Advertising::inRandomOrder()->first();
        $category = Category::where('slug',$category)->first();
        $categories = Category::where('parent_id', 0)->with('subcat')->get();
        $articles=Article::with('getCategory')->where('deleted_at',null)->orderBy('id' , 'DESC')->where('category_id' , $category->id)->take(5)->get();
        return view('category',compact('about','reklams','articles','category', 'categories'));
    }
    public function article($slug)
    {
        $about=About::first();
        $reklams=Advertising::inRandomOrder()->first();
        $article = Article::where('slug',$slug)->where('deleted_at',null)->first();
        $categories = Category::where('parent_id', 0)->with('subcat')->get();
        $last_articles=Article::with('getCategory')->where('deleted_at',null)->orderBy('id' , 'DESC')->limit(5)->get();
        $article->increment('hit');

        return view('article',compact('about','reklams','article' , 'categories','last_articles',));
    }

    public function search(Request $request)
    {
        $about=About::first();
        $reklams=Advertising::inRandomOrder()->first();
        $categories = Category::where('parent_id', 0)->with('subcat')->get();
        $s = trim(request()->get('search'));
        $page = (int)request()->get('page');
        $data = Article::select('articles.id', 'articles.title', 'articles.image', 'articles.slug' , 'articles.sub_title',
            DB::raw("TO_CHAR(articles.created_at, 'YYYY-MM-DD HH:MI:SS') as datetime"), 'categories.name as category_name')
            ->leftJoin('categories', 'categories.id', '=', 'articles.category_id')
            ->leftJoin('tags', 'tags.article_id', '=', 'articles.id')
            ->where(function ($query) use ($s) {
                if($s !== '')
                {
                    $query->where('articles.title', 'LIKE', '%'.$s.'%')
                        ->orWhere('articles.sub_title', 'LIKE', '%'.$s.'%')
                        ->orWhere('categories.name', 'LIKE', '%'.$s.'%')
                        ->orWhere('tags.tag', 'LIKE', '%'.$s.'%');
                }
            })->groupBy('articles.id', 'articles.title', 'articles.image', 'articles.sub_title', 'articles.created_at', 'categories.name')
            ->orderBy('articles.id' ,'DESC')->where('deleted_at',null)->paginate(4);
        return view('search',compact('data','categories','about','reklams'));
    }

    public function loadArticles(Request $request): array
    {
        $articles=Article::with('getCategory')->where('deleted_at',null)->latest()->skip($request->skip)->take(5)->get();
        $data = [];
        foreach($articles as $article){
            $route = route('articles.cat',$article->slug);
            $html = "<div class='mobile_main_item'>
                        <div class='mobile_main_img w-100'>
                            <a class='mobile_main_link w-100 '  href='$route'>
                                <img class='w-100 h-100 '  src='$article->image' alt='item_img' style='object-fit: cover'>
                            </a>
                        </div>

                        <div class='mobile_main_title w-100' >
                            <a href='/article/$article->slug'>
                                <h2>
                                    $article->title
                                </h2>
                            </a>
                        </div>

                        <div class='mobile_main_category w-100'>
                            <a href='#'>
                                {$article->getCategory->name}
                            </a>
                        </div>

                        <div class='mobile_main_excerpt w-100'>
                            <p>
                                $article->sub_title
                            </p>
                        </div>
                   </div>";
            array_push($data, $html);
        }
        return $data;
    }

    public function loadArticles1(Request $request): array
    {

        $articles=Article::with('getCategory')->where('deleted_at',null)->latest()->skip($request->skip1)->take(5)->get();
        $data = [];
        foreach($articles as $article){
            $route = route('articles.cat',$article->slug);
            $html = '<div class="latest_left_item  flex  justify-content-between ">
                        <div class="latest_left_item_text">
                            <ul class="latest_left_category_list">
                                <li>
                                    <a href="category/'. $article->getCategory->slug.'" target="_self" class="list_item_link" style="">
                                        '. $article->getCategory->name  . '</a>
                                </li>
                            </ul>
                            <h2 class="left_item_title">
                                <a href="' . $route . '" target="_self">
                                    '.$article->title.'
                                </a>
                            </h2>
                            <p class="latest_left_item_excerpt">
                                '.$article->sub_title.'
                            </p>
                        </div>
                        <div class="latest_left_item_img">
                            <a href="'.$route.'" target="_self">
                                <img src="'.$article->image.'">
                            </a>
                        </div>
                    </div>';
            array_push($data, $html);
        }
        return $data;
    }

    public function loadCategory(Request $request): array
    {
        $articles=Article::with('getCategory')->where('category_id', $request->category)->where('deleted_at',null)->latest()->skip($request->skip)->take(5)->get();
        $data = [];
        foreach($articles as $article){
            $route = route('articles.cat',$article->slug);
            $html = "<div class='mobile_main_item'>
                        <div class='mobile_main_img w-100'>
                            <a class='mobile_main_link w-100 '  href='$route'>
                                <img class='w-100 h-100 '  src='$article->image' alt='item_img' style='object-fit: cover'>
                            </a>
                        </div>

                        <div class='mobile_main_title w-100' >
                            <a href='/article/$article->slug'>
                                <h2>
                                    $article->title
                                </h2>
                            </a>
                        </div>

                        <div class='mobile_main_category w-100'>
                            <a href='#'>
                                {$article->getCategory->name}
                            </a>
                        </div>

                        <div class='mobile_main_excerpt w-100'>
                            <p>
                                $article->sub_title
                            </p>
                        </div>
                   </div>";
            array_push($data, $html);
        }
        return $data;
    }


    public function loadCategory1(Request $request): array
    {
        $articles=Article::with('getCategory')->where('category_id', $request->category)->where('deleted_at',null)->latest()->skip($request->skip1)->take(5)->get();
        $data = [];
        foreach($articles as $article){
            $route = route('articles.cat',$article->slug);
            $html = '<div class="latest_left_item  flex  justify-content-between ">
                        <div class="latest_left_item_text">
                            <ul class="latest_left_category_list">
                                <li>
                                    <a href="category/'. $article->getCategory->slug.'" target="_self" class="list_item_link" style="">
                                        '. $article->getCategory->name  . '</a>
                                </li>
                            </ul>
                            <h2 class="left_item_title">
                                <a href="' . $route . '" target="_self">
                                    '.$article->title.'
                                </a>
                            </h2>
                            <p class="latest_left_item_excerpt">
                                '.$article->sub_title.'
                            </p>
                        </div>
                        <div class="latest_left_item_img">
                            <a href="'.$route.'" target="_self">
                                <img src="'.$article->image.'">
                            </a>
                        </div>
                    </div>';
            array_push($data, $html);
        }
        return $data;
    }


}
