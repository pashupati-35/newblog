@extends('layouts.backend_master')
@section('title','Create Tag')

@section('content')

    <h1 class="h3 mb-4 text-gray-800">Tag Create</h1>
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Create form</h6>

                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{session('success')}}</div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger">{{session('error')}}</div>
                    @endif

                    <form action="{{route('backend.tag.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" value="{{old('title' )}}" placeholder="Enter Title"/>
                            @error('title')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input type="text" class="form-control" name="slug" value="{{old('slug' )}}" placeholder="Enter Slug"/>

                            @error('slug')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <input type="radio"  name="status" value="1" />Active
                            <input type="radio"  name="status" value="0"  checked/> De-Active

                        </div>
                        <div class="form-group">
                            <input type="submit" name="save" value="Save Tag" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
