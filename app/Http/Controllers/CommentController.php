<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::with('article')->orderBy('created_at', 'DESC')->paginate(10);
        return view('comments.index', compact('comments'));
    }

    public function publish($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->status = "PUBLISH";
        $comment->save();
        return redirect(route('comments.index'))->with(['success' => 'Comment Publish approved']);;
    }

    public function delete($id)
    {
        $comment = Comment::withCount(['child'])->find($id);
        if ($comment->child_count == 0) {
            $comment->delete();
            return redirect(route('comments.index'))->with(['success' => 'Comment Deleted!']);
        }
        return redirect(route('comments.index'))->with(['error' => 'Comment has child comments!']); 
    }
}
