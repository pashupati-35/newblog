<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\TagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

//        $data['records']=Tag::paginate(2);
        $data['records']=Tag::all();
        return view('backend.tag.index',compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.tag.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TagRequest $request)
    {

//        $data = [
//            'title' => $request->title,
//            'slug' => $request->slug,
//            'rank' => $request->rank,
//            'status' => $request->status,
//            'created_by' => $request->created_by
//        ];
        $request->request->add(['created_by'=>Auth::user()->id]);
//       $record= Tag::create($data);
        $record= Tag::create($request->all());

        if($record)
        {
            $request->session()->flash('success','Tag Create Successfully');


        }
        else
        {
            $request->session()->flash('error','Tag Creation Failed');

        }
        return redirect()->route('backend.tag.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['record']=Tag::find($id);
        return view('backend.tag.show',compact('data'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['record']=Tag::find($id);
        if(!$data['record'])
        {
            request()->session()->flash('error','Tag not found');
            return redirect()->route('backend.tag.index');
        }
        return view('backend.tag.edit',compact('data'));


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TagRequest $request, string $id)
    {
        $data['record']=Tag::find($id);
        $request->request->add(['updated_by',auth()->user()->id]);
        if($data['record']->update($request->all()))
        {
            $request->session()->flash('success','Tag Updated Successfully');

        }
        else
        {
            $request->session()->flash('error','Tag Updated Failed');

        }
        return redirect()->route('backend.tag.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $record= Tag::find($id);

        if($record->delete())
        {
            request()->session()->flash('success','Tag Deleted Successfully');


        }
        else
        {
            request()->session()->flash('error','Tag Deletion Failed');

        }
        return redirect()->route('backend.tag.index');
    }
}
