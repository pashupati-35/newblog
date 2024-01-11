<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data ['records'] = Post::all();
        return view('backend.post.index', compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['categories'] = Category::select('id','title')->get();
        $data['tags'] = Tag::select('id','title')->get();

        return view('backend.post.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {

        $request->request->add(['created_by' => Auth::user()->id]);
        if ($request->hasFile('feature_image_file')){
            $image =$request->file('feature_image_file');
            $fname = uniqid() . '_' . $image->getClientOriginalName();
            $image->move('images/post',$fname);
            $request->request->add(['feature_image' => $fname]);

        }


        $record = Post::create($request->all());
        if ($record) {
            $record->tags()->attach($request->input('tag_id'));
            $request->session()->Flash('success', 'Post Successfully');
        } else {
            $request->session()->Flash('error', 'Creation failed');

        }
        return redirect()->route('backend.post.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['record'] = Post::find($id);
        return view('backend.post.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['record'] = Post::find($id);
        if (!$data['record'])
        {
            request()->session()->Flash('error', 'Creation not found');
            return redirect()->route('backend.post.index');
        }
        return view('backend.post.edit',compact('data'));
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, string $id)
    {
        $data['record'] = Post::find($id);
        $request->request->add(['update_by',auth()->user()->id]);
       if( $data['record']->update($request->all())){
            $request->session()->Flash('success','Post update Successfully');
       } else {
           $request->session()->Flash('error','Post update failed');

       }
        return redirect()->route('backend.post.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $record = Post::find($id);

        if (!$record) {
            return redirect()->route('backend.post.index')->with('error', 'Post not found');
        }

        if ($record->delete()) {
            return redirect()->route('backend.post.index')->with('success', 'Delete Successfully');
        } else {
            return redirect()->route('backend.post.index')->with('error', 'Post delete failed');
        }
    }

//        $record = Post::find($id);
//        if ($record->delete()){
//            request()->session()->Flash('success', 'Delete Successfully');
//        }
//        else{
//            request()->session()->Flash('error', 'Creation delete failed');
//
//        }
//        return redirect()->route('backend.post.index');
//    }

}
