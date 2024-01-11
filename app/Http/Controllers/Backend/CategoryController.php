<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data ['records'] = Category::all();
        return view('backend.category.index', compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $request->request->add(['created_by' => Auth::user()->id]);
        $record = Category::create($request->all());
        if ($record) {
            $request->session()->Flash('success', 'Category Successfully');
        } else {
            $request->session()->Flash('error', 'Creation failed');

        }
        return redirect()->route('backend.category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['record'] = Category::find($id);
        return view('backend.category.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['record'] = Category::find($id);
        if (!$data['record'])
        {
            request()->session()->Flash('error', 'Creation not found');
            return redirect()->route('backend.category.index');
        }
        return view('backend.category.edit',compact('data'));
    }



    /**
     * Update the specified resource in storage.
     */
     public function update(CategoryRequest $request, string $id)
    {
        $data['record'] = Category::find($id);
        $request->request->add(['update_by',Auth()->user()->id]);
       if( $data['record']->update($request->all())){
            $request->session()->Flash('success','Category update Successfully');
       } else {
           $request->session()->Flash('error','Category update failed');

       }
        return redirect()->route('backend.category.index');

    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $record = Category::find($id);

        if (!$record) {
            return redirect()->route('backend.category.index')->with('error', 'Category not found');
        }

        if ($record->delete()) {
            return redirect()->route('backend.category.index')->with('success', 'Delete Successfully');
        } else {
            return redirect()->route('backend.category.index')->with('error', 'Category delete failed');
        }
    }

//        $record = Category::find($id);
//        if ($record->delete()){
//            request()->session()->Flash('success', 'Delete Successfully');
//        }
//        else{
//            request()->session()->Flash('error', 'Creation delete failed');
//
//        }
//        return redirect()->route('backend.category.index');
//    }

}
