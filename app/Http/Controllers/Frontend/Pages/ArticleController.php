<?php

namespace App\Http\Controllers\Frontend\Pages;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\ArticleContent;

class ArticleController extends Controller
{
    public function index()
    {
        $contents = ArticleContent::find(1);
        $language = session('language', 'en');
        
        switch($language){
            case 'en':
                $language_name = 'English';
                break;
            case 'zh':
                $language_name = 'Chinese';
                break;
            case 'ja':
                $language_name = 'Japanese';
                break;
            default:
                $language_name = 'unknown';
                break;
        }
        
        // Load articles with their category
        $articles = Article::with('category')->where('language', $language_name)->where('status', '1')->get();

        // Fallback to English if no articles found
        if($articles->isEmpty() && $language_name !== 'English') {
            $articles = Article::with('category')->where('language', 'English')->where('status', '1')->get();
        }

        $article_categories = ArticleCategory::where('language', $language_name)->where('status', '1')
                                ->whereNotNull('name')  // Filter out any null names
                                ->get();

        // Fallback to English if no categories found
        if ($article_categories->isEmpty() && $language_name !== 'English') {
            $article_categories = ArticleCategory::where('language', 'English')->where('status', '1')->get();
        }

        return view('frontend.pages.articles', [
            'contents' => $contents,
            'language' => $language,
            'articles' => $articles,
            'article_categories' => $article_categories
        ]);
    }
    
    public function show($id)
    {
        $language = session('language', 'en');
        
        switch($language){
            case 'en':
                $language_name = 'English';
                break;
            case 'zh':
                $language_name = 'Chinese';
                break;
            case 'ja':
                $language_name = 'Japanese';
                break;
            default:
                $language_name = 'unknown';
                break;
        }

        $articles = Article::findOrFail($id);

        $article_categories = ArticleCategory::where('language', $language_name)->where('status', '1')
        ->whereNotNull('name')  // Filter out any null names
        ->get();
        // Fallback to English if no categories found
        if ($article_categories->isEmpty() && $language_name !== 'English') {
            $article_categories = ArticleCategory::where('language', 'English')->where('status', '1')->get();
        }

         // Load articles with their category
         $latest_articles = Article::with('category')->where('language', $language_name)->where('status', '1')->get();

         // Fallback to English if no articles found
         if($latest_articles->isEmpty() && $language_name !== 'English') {
             $latest_articles = Article::with('category')->where('language', 'English')->where('status', '1')->get();
         }

        return view('frontend.pages.single-article', [
            'articles' => $articles,
            'article_categories' => $article_categories,
            'latest_articles' => $latest_articles
        ]);
    }
}