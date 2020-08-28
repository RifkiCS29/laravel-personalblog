<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Article;
use App\Category;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $status = $request->get('status');
        $filterKeyword = $request->get('q') ? $request->get('q') : '';

            if ($status){
                $articles = Article::with(['category'])->where('status',strtoupper($status))->where('title','LIKE',"%$filterKeyword%")->orderBy('created_at', 'DESC')->paginate(5);
            }else{
                $articles = Article::with(['category'])->where('title','LIKE',"%$filterKeyword%")->orderBy('created_at', 'DESC')->paginate(5);
            }
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::orderBy('name', 'ASC')->get();
        return view('articles.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        \Validator::make($request->all(),[
            "title" => "required|min:5|max:200|unique:articles",
            "header_articles" => "required|image|mimes:jpg,jpeg,png|max:2000",
            "content" => "required|min:5|max:2000",
            "category_id" => "required|exists:categories,id"
        ])->validate();

        $new_article = new Article;

        $new_article->title = $request->get('title');
        $new_article->content = $request->get('content');
        $new_article->status = $request->get('save_action');

        if($request->file('header_articles')){
            $header_articles_path = $request->file('header_articles')->store('header_articles_covers','public');
            $new_article->header_articles = $header_articles_path;
        }

        $new_article->slug = $request->get('title');
        $new_article->category_id = $request->get('category_id');
        $new_article->created_by = \Auth::user()->name;

        $new_article->save();

        if($request->get('save_action') == 'PUBLISH'){
            return redirect()->route('articles.index')->with('success', 'Article Successfully saved and published');
        } else{
            return redirect()->route('articles.index')->with('success','Article save as draft');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $category = Category::orderBy('name', 'ASC')->get();
        return view('articles.edit',compact('article', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        \Validator::make($request->all(),[
            "title" => "required|min:5|max:200",
            "header_articles" => "image|mimes:jpg,jpeg,png|max:2000",
            "content" => "required|min:5|max:2000",
            "category_id" => "required|exists:categories,id"
        ])->validate();

        $article = Article::findOrFail($id);

        $article->title = $request->get('title');
        $article->slug = $request->get('title');
        $article->content = $request->get('content');
        $article->category_id = $request->get('category_id');

        if($request->file('header_articles')){
            if($article->header_articles && file_exists(storage_path('app/public/'.$article->header_articles))){
                \Storage::delete('public/'.$article->header_articles);
            }
            $new_header_articles_path = $request->file('header_articles')->store('header_articles_covers','public');
            $article->header_articles = $new_header_articles_path;
        }

        $article->updated_by = \Auth::user()->name;
        $article->status = $request->get('save_action');
        $article->save();

        return redirect()->route('articles.index')->with('success', 'article Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        if($article->header_articles && file_exists(storage_path('app/public/'.$article->header_articles))){
            \Storage::delete('public/'.$article->header_articles);
        }

        $comments = $article->comments();

        foreach($comments->get() as $comment){
            $comment->child()->delete();
        }
        
        $article->comments()->delete();
        $article->delete();

        return redirect()->route('articles.index')->with('success','Article Has Been Deleted!');
    }
}
