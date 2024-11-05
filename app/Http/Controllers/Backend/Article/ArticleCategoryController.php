<?php

namespace App\Http\Controllers\Backend\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;

class ArticleCategoryController extends Controller
{
    private function processArticleCategories($article_categories)
    {
        foreach($article_categories as $article_category) {
            $article_category->action = '
            <a href="'. route('backend.article-categories.edit', $article_category->id) .'" class="edit-button" title="Edit"><i class="bi bi-pencil-square"></i></a>
            <a id="'.$article_category->id.'" class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>';

            $article_category->status = ($article_category->status == '1') ? '<span class="active-status">Active</span>' : '<span class="inactive-status">Inactive</span>';
        }

        return $article_categories;
    }

    public function index(Request $request)
    {
        $items = $request->items ?? 10;

        $article_categories = ArticleCategory::where('status', '!=', '0')->orderBy('id', 'desc')->paginate($items);
        $article_categories = $this->processArticleCategories($article_categories);

        return view('backend.article-categories.index', [
            'article_categories' => $article_categories,
            'items' => $items
        ]);
    }

    public function create()
    {
        return view('backend.article-categories.create');
    }
                                                                              
    public function store(Request $request)
    {
        $article_category = new ArticleCategory();
        $data = $request->all();
        $article_category->create($data);

        return redirect()->route('backend.article-categories.index')->with('success', 'Successfully created!');
    }

    public function edit(ArticleCategory $article_category)
    {
        return view('backend.article-categories.edit', [
            'article_category' => $article_category
        ]);
    }

    public function update(Request $request, ArticleCategory $article_category)
    {
        $data = $request->all();
        $article_category->fill($data)->save();
        
        return redirect()->route('backend.article-categories.index')->with('success', "Successfully updated!");
    }

    public function destroy(ArticleCategory $article_category)
    {
        $articles = Article::where('article_category_id', $article_category->id)->where('status', '!=', '0')->get();

        if($articles) {
            foreach($articles as $article) {
                $article->status = '0';
                $article->save();
            }
        }

        $article_category->status = '0';
        $article_category->save();

        return redirect()->back()->with('success', 'Successfully deleted!');
    }

    public function filter(Request $request)
    {
        if($request->action == 'reset') {
            return redirect()->route('backend.article-categories.index');
        }

        $name = $request->name;
        $language = $request->language;

        $article_categories = ArticleCategory::where('status', '!=', '0')->orderBy('id', 'desc');

        if($name != null) {
            $article_categories->where('name', 'like', '%' . $name . '%');
        }

        if($language != 'All') {
            $article_categories->where('language', $language);
        }

        $items = $request->items ?? 10;
        $article_categories = $article_categories->paginate($items);
        $article_categories = $this->processArticleCategories($article_categories);

        return view('backend.article-categories.index', [
            'article_categories' => $article_categories,
            'items' => $items,
            'name' => $name,
            'language' => $language
        ]);
    }
}