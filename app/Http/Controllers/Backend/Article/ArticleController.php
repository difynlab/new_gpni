<?php

namespace App\Http\Controllers\Backend\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    private function processArticles($articles)
    {
        foreach($articles as $article) {
            $article->action = '
            <a href="'. route('backend.articles.edit', $article->id) .'" class="edit-button" title="Edit"><i class="bi bi-pencil-square"></i></a>
            <a id="'.$article->id.'" class="delete-button" title="Delete"><i class="bi bi-trash3"></i></a>';

            $article->article_category = ArticleCategory::find($article->article_category_id)->name;

            $article->status = ($article->status == '1') ? '<span class="active-status">Active</span>' : '<span class="inactive-status">Inactive</span>';
        }

        return $articles;
    }

    public function index(Request $request)
    {
        $items = $request->items ?? 10;

        $articles = Article::where('status', '!=', '0')->orderBy('id', 'desc')->paginate($items);
        $articles = $this->processArticles($articles);

        return view('backend.articles.index', [
            'articles' => $articles,
            'items' => $items
        ]);
    }

    public function create()
    {
        $article_categories = ArticleCategory::where('status', '1')->get();

        return view('backend.articles.create', [
            'article_categories' => $article_categories
        ]);
    }
                                                                              
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'new_thumbnail' => 'nullable|max:2048',
            'new_author_image' => 'nullable|max:2048'
        ], [
            'new_thumbnail.max' => 'The thumbnail must not be greater than 2MB',
            'new_author_image.max' => 'The author image must not be greater than 2MB'
        ]);
        
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Creation failed!');
        }

        if($request->file('new_thumbnail') != null) {
            $thumbnail = $request->file('new_thumbnail');
            $thumbnail_name = Str::random(40) . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->storeAs('public/backend/articles/articles', $thumbnail_name);
        }
        else {
            $thumbnail_name = $request->old_thumbnail;
        }

        if($request->file('new_author_image') != null) {
            $author_image = $request->file('new_author_image');
            $author_image_name = Str::random(40) . '.' . $author_image->getClientOriginalExtension();
            $author_image->storeAs('public/backend/articles/author-images', $author_image_name);
        }
        else {
            $author_image_name = $request->old_author_image;
        }

        $article = new Article();
        $data = $request->except(
            'old_thumbnail',
            'new_thumbnail',
            'old_author_image',
            'new_author_image'
        );

        $data['thumbnail'] = $thumbnail_name;
        $data['author_image'] = $author_image_name;

        $article->create($data);

        return redirect()->route('backend.articles.index')->with('success', 'Successfully created!');
    }

    public function edit(Article $article)
    {
        $article_categories = ArticleCategory::where('status', '1')->get();

        return view('backend.articles.edit', [
            'article' => $article,
            'article_categories' => $article_categories
        ]);
    }

    public function update(Request $request, Article $article)
    {
        $validator = Validator::make($request->all(), [
            'new_thumbnail' => 'nullable|max:2048',
            'new_author_image' => 'nullable|max:2048'
        ], [
            'new_thumbnail.max' => 'The thumbnail must not be greater than 2MB.',
            'new_author_image.max' => 'The author image must not be greater than 2MB.'
        ]);
        
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Update failed!');
        }

        if($request->file('new_thumbnail') != null) {
            if($request->old_thumbnail) {
                Storage::delete('public/backend/articles/articles/' . $request->old_thumbnail);
            }

            $thumbnail = $request->file('new_thumbnail');
            $thumbnail_name = Str::random(40) . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->storeAs('public/backend/articles/articles', $thumbnail_name);
        }
        else {
            $thumbnail_name = $request->old_thumbnail;
        }

        if($request->file('new_author_image') != null) {
            if($request->old_author_image) {
                Storage::delete('public/backend/articles/author-images/' . $request->old_author_image);
            }

            $author_image = $request->file('new_author_image');
            $author_image_name = Str::random(40) . '.' . $author_image->getClientOriginalExtension();
            $author_image->storeAs('public/backend/articles/author-images', $author_image_name);
        }
        else {
            $author_image_name = $request->old_author_image;
        }

        $data = $request->except(
            'old_thumbnail',
            'new_thumbnail',
            'old_author_image',
            'new_author_image'
        );
        $data['thumbnail'] = $thumbnail_name;
        $data['author_image'] = $author_image_name;

        $article->fill($data)->save();
        
        return redirect()->route('backend.articles.index')->with('success', "Successfully updated!");
    }

    public function destroy(Article $article)
    {
        $article->status = '0';
        $article->save();

        return redirect()->back()->with('success', 'Successfully deleted!');
    }

    public function filter(Request $request)
    {
        if($request->action == 'reset') {
            return redirect()->route('backend.articles.index');
        }

        $title = $request->title;
        $language = $request->language;

        $articles = Article::where('status', '!=', '0')->orderBy('id', 'desc');

        if($title != null) {
            $articles->where('title', 'like', '%' . $title . '%');
        }

        if($language != 'All') {
            $articles->where('language', $language);
        }

        $items = $request->items ?? 10;
        $articles = $articles->paginate($items);
        $articles = $this->processArticles($articles);

        return view('backend.articles.index', [
            'articles' => $articles,
            'items' => $items,
            'title' => $title,
            'language' => $language
        ]);
    }
}