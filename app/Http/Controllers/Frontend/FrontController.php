<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Article;
use App\Category;
use App\Comment;
use Str;

class FrontController extends Controller
{
    public function index()
    {
        $articles = Article::with(['category', 'publish_comments'])->orderBy('created_at', 'DESC')->where('status', 'PUBLISH')->paginate(6);
        $latest = Article::with(['category', 'publish_comments'])->orderBy('created_at', 'DESC')->where('status', 'PUBLISH')->paginate(3);
        return view('frontend.index', compact('articles', 'latest'));
    }

    public function article()
    {
        $articles = Article::with(['category', 'publish_comments'])->orderBy('created_at', 'DESC')->where('status', 'PUBLISH');
        
        if (request()->q != '') {
            $articles = $articles->where('title', 'LIKE', '%' . request()->q . '%');
        }

        $articles = $articles->paginate(8);

        return view('frontend.article', compact('articles'));
    }

    public function categoryArticle($slug)
    {
       if (Category::whereSlug($slug)->exists()){
            $articles = Category::where('slug', $slug)->first()->article()->with(['category', 'publish_comments'])->orderBy('created_at', 'DESC')->where('status', 'PUBLISH')->paginate(8);
            return view('frontend.article', compact('articles'));
        }else{
            return redirect()->back();
       }

    }

    public function show($slug)
    {
        if (Article::whereSlug($slug)->exists()){
            $article = Article::with(['category', 'publish_comments', 'publish_comments.publish_child'])->where('slug', $slug)->first();
            return view('frontend.show', compact('article'));
        }else{
            return redirect()->back();
        }
    }

    public function comment(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'comment' => 'required'
        ]);

        Comment::create([
            'article_id' => $request->id,
            'parent_id' => $request->parent_id != '' ? $request->parent_id:NULL,
            'username' => $request->username,
            'comment' => $request->comment,
            'status' => 'DRAFT'
        ]);
        return redirect()->back()->with(['success' => 'Comment successfully added and will be displayed if approved']);;
    }
}
