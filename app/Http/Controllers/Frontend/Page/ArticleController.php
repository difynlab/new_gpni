<?php

namespace App\Http\Controllers\Frontend\Page;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleContent;
use App\Models\Setting;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $contents = ArticleContent::find(1);

        $articles = Article::where('language', $request->middleware_language_name)->where('status', '1')->orderBy('id', 'desc')->paginate(4);
        if($articles->isEmpty() && $request->middleware_language_name != 'English') {
            $articles = Article::where('language', 'English')->where('status', '1')->orderBy('id', 'desc')->get();
        }

        $recommended_articles = Article::where('recommending', 'Yes')->where('language', $request->middleware_language_name)->where('status', '1')->orderBy('id', 'desc')->paginate(4);
        if($recommended_articles->isEmpty() && $request->middleware_language_name != 'English') {
            $recommended_articles = Article::where('recommending', 'Yes')->where('language', 'English')->where('status', '1')->orderBy('id', 'desc')->get();
        }

        $trending_articles = Article::where('trending', 'Yes')->where('language', $request->middleware_language_name)->where('status', '1')->orderBy('id', 'desc')->take(5)->get();

        if($trending_articles->isEmpty() && $request->middleware_language_name != 'English') {
            $trending_articles = Article::where('trending', 'Yes')->where('language', 'English')->where('status', '1')->orderBy('id', 'desc')->take(5)->get();
        }

        $settings = Setting::find(1);

        return view('frontend.pages.articles.index', [
            'contents' => $contents,
            'articles' => $articles,
            'recommended_articles' => $recommended_articles,
            'trending_articles' => $trending_articles,
            'settings' => $settings
        ]);
    }
    
    public function show(Request $request, Article $article)
    {
        $contents = ArticleContent::find(1);

        $latest_articles = Article::where('language', $request->middleware_language_name)->where('status', '1')->orderBy('id', 'desc')->take(5)->get();
        if($latest_articles->isEmpty() && $request->middleware_language_name != 'English') {
            $latest_articles = Article::where('language', 'English')->where('status', '1')->orderBy('id', 'desc')->take(5)->get();
        }

        $settings = Setting::find(1);

        return view('frontend.pages.articles.show', [
            'contents' => $contents,
            'article' => $article,
            'latest_articles' => $latest_articles,
            'settings' => $settings
        ]);
    }
}