<?php

namespace App\Http\Controllers\Frontend;
use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Session;



class HomeController extends Controller
{
    function homePage()
    {
        $data['posts'] = Post::where('status', 1)->orderBy('created_at', 'desc')->paginate(10);
        return view('frontend.home', compact('data'));
    }

    function postDetail($slug)
    {
        $data['posts'] = Post::where('slug', $slug)->first();
        return view('frontend.post_detail', compact('data'));
    }

    public function storeComment(Request $request, $post_id)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'required|string|max:20',
            'comment' => 'required|string',
        ]);

        // Find the post by ID
        $post = Post::find($post_id);

        if (!$post) {
            // Handle the case where the post is not found
            return redirect()->back()->with('error', 'Post not found');
        }

        // Create a new comment instance
        $comment = new Comment([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'comment' => $request->input('comment'),
        ]);

        // Associate the comment with the post
        $post->comments()->save($comment);

        // Redirect back with success message
        return redirect()->back()->with('success', 'Comment sent successfully');
    }


    public function index()
    {
        $data['records'] = Comment::all();
        return view('frontend.comment.index', compact('data'));
    }

    public function destroy(string $id)
    {
        $record = Comment::find($id);
        if (!$record) {
            return redirect()->route('frontend.comment.index')->with('error', 'Comment not found');
        }
        if ($record->delete()) {
            return redirect()->route('frontend.comment.index')->with('success', 'Delete Successfully');
        } else {
            return redirect()->route('frontend.comment.index')->with('error', 'Post delete failed');
        }
    }
}
