<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ArticleSave;
use App\Models\Article;
use App\Models\SaveArticle;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    public function save (ArticleSave $request) {
        $save = SaveArticle::where('article_id', $request->article_id)->where('device_id', $request->device_id)->first();
        if(!$save)
        {
            $save = new SaveArticle();
            $save->device_id = $request->device_id;
            $save->article_id = $request->article_id;
            $save->save();
        }

        return response()->json([
            'success' => [
                'message' => 'Successfully!'
            ]
        ]);
    }

    public function unsave (ArticleSave $request) {
        SaveArticle::where('article_id', $request->article_id)->where('device_id', $request->device_id)->delete();

        return response()->json([
            'success' => [
                'message' => 'Successfully!'
            ]
        ]);
    }

    public function detail ($id)
    {
        $get = Article::select('articles.id', 'articles.title', 'articles.image', 'articles.sub_title', 'articles.video',
            'articles.created_at', 'categories.name as category_name', 'date_time as expire', 'hit')
            ->leftJoin('categories', 'categories.id', '=', 'articles.category_id')
            ->leftJoin('tags', 'tags.article_id', '=', 'articles.id')
            ->where('articles.id', $id)->first();
        $get->hit++;
        $get->save();

        $data = [
            'id' => $get->id,
            'title' => $get->title,
            'image' => $get->image,
            'sub_title' => $get->sub_title,
            'category_name' => $get->category_name,
            'created_at' => date('Y-m-d H:i:s', strtotime($get->created_at)),
            'is_free' => isset($get->expire) ? false : true,
            'expired' => isset($get->expire) && (strtotime($get->expire) - strtotime('now')) > 0 ? false : true,
            'expire_date' => $get->expire,
            'seen_count' => $get->hit,
            'saved' => (bool)SaveArticle::where('article_id', $id)->where('device_id', request()->get('device_id'))->count()
        ];

        $get = null;


        return response()->json([
            'success' => [
                'message' => 'Successfully!',
                'data' => $data,
                'webview' => 'https://hajialiyev.com/api/article/webview/'.$id
            ]
        ]);
    }

    public function webview ($id)
    {
        $content = Article::find($id)->content;
        return view('article-webview', ['content' => $content]);
    }

    public function search () {
        $s = trim(request()->get('search'));
        $page = (int)request()->get('page');
        $data = Article::select('articles.id', 'articles.title', 'articles.image', 'articles.sub_title',
                DB::raw("TO_CHAR(articles.created_at, 'YYYY-MM-DD HH:MI:SS') as datetime"), 'categories.name as category_name')
            ->leftJoin('categories', 'categories.id', '=', 'articles.category_id')
            ->leftJoin('tags', 'tags.article_id', '=', 'articles.id')
            ->where(function ($query) use ($s) {
                if($s !== '')
                {
                    $query->where('articles.title', 'iLIKE', '%'.$s.'%')
                        ->orWhere('articles.sub_title', 'iLIKE', '%'.$s.'%')
                        ->orWhere('categories.name', 'iLIKE', '%'.$s.'%')
                        ->orWhere('tags.tag', 'iLIKE', '%'.$s.'%');
                }
            })->groupBy('articles.id', 'articles.title', 'articles.image', 'articles.sub_title', 'articles.created_at', 'categories.name')
            ->orderBy('articles.id' ,'DESC')->skip(($page - 1) * 20)->take(20)->get();
        return response()->json([
            'success' => [
                'message' => 'Successfully!',
                'data' => $data
            ]
        ]);
    }

    public function favourite ()
    {
        $device_id = trim(request()->get('device_id'));
        $page = (int)request()->get('page');
        $data = Article::select('articles.id', 'articles.title', 'articles.image', 'articles.sub_title',
            DB::raw("TO_CHAR(articles.created_at, 'YYYY-MM-DD HH:MI:SS') as datetime"), 'categories.name as category_name')
            ->leftJoin('categories', 'categories.id', '=', 'articles.category_id')
            ->leftJoin('save_articles', 'save_articles.article_id', '=', 'articles.id')
            ->where('save_articles.device_id', $device_id)
            ->orderBy('articles.id' ,'DESC')->skip(($page - 1) * 20)->take(20)->get();
        return response()->json([
            'success' => [
                'message' => 'Successfully!',
                'data' => $data
            ]
        ]);
    }

    public function video () {
        $s = trim(request()->get('search'));
        $page = (int)request()->get('page');
        $data = Article::select('articles.id', 'articles.title', 'articles.image', 'articles.sub_title', 'articles.video',
            DB::raw("TO_CHAR(articles.created_at, 'YYYY-MM-DD HH:MI:SS') as datetime"), 'categories.name as category_name')
            ->leftJoin('categories', 'categories.id', '=', 'articles.category_id')
            ->leftJoin('tags', 'tags.article_id', '=', 'articles.id')
            ->whereNotNull('articles.video')
            ->where(function ($query) use ($s) {
                if($s !== '')
                {
                    $query->where('articles.title', 'iLIKE', '%'.$s.'%')
                        ->orWhere('articles.sub_title', 'iLIKE', '%'.$s.'%')
                        ->orWhere('categories.name', 'iLIKE', '%'.$s.'%')
                        ->orWhere('tags.tag', 'iLIKE', '%'.$s.'%');
                }
            })->groupBy('articles.id', 'articles.title', 'articles.image', 'articles.sub_title', 'articles.created_at', 'categories.name')
            ->orderBy('articles.id' ,'DESC')->skip(($page - 1) * 20)->take(20)->get();
        return response()->json([
            'success' => [
                'message' => 'Successfully!',
                'data' => $data
            ]
        ]);
    }

    public function searchByCategory ($categoryId) {
        $page = (int)request()->get('page');
        $data = Article::select('articles.id', 'articles.title', 'articles.image', 'articles.sub_title',
            DB::raw("TO_CHAR(articles.created_at, 'YYYY-MM-DD HH:MI:SS') as datetime"), 'categories.name as category_name')
            ->leftJoin('categories', 'categories.id', '=', 'articles.category_id')
            ->where('category_id', $categoryId)->orderBy('articles.id' ,'DESC')->skip(($page - 1) * 20)->take(20)->get();
        return response()->json([
            'success' => [
                'message' => 'Successfully!',
                'data' => $data
            ]
        ]);
    }
}
