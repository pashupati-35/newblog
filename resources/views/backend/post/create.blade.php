@extends('layouts.backend_master')
@section('title','Create Post')

@section('content')

    <h1 class="h3 mb-4 text-gray-800">Post Create</h1>
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

                    <form action="{{route('backend.post.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select class="form-control" name="category_id">

                              <option value="">Select category</option>
                                @foreach($data['categories'] as $category)
                                    <option value="{{$category->id}}">{{$category->title}}</option>


                                @endforeach

                            </select>

                            @error('category_id')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="title">title</label>
                            <input type="text" id="title" class="form-control" name="title" value="{{old('title' )}}" placeholder="Enter title"/>
                            @error('title')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input type="text" id="slug" class="form-control" name="slug" value="{{old('slug' )}}" placeholder="Enter Slug"/>
                            @error('slug')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                             <div class="form-group">
                            <label for="short_description">Short description</label>
                            <textarea  class="form-control" name="short_description" value="{{old('short_description' )}}" placeholder="Enter Short Description"></textarea>
                            @error('short_description')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description"> Description</label>
                            <textarea  class="form-control" name="description" id="editor" value="{{old('description' )}}" placeholder="Enter Short Description"></textarea>
                            @error('description')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="feature_image">Feature Image</label>
                            <input type="file" class="form-control" name="feature_image_file" value="{{old('feature_image' )}}"/>
                            @error('feature_image')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="tag_id">Tag</label>
                            <select class="form-control" name="tag_id[]" multiple>

                                <option value="">Select Tag</option>
                                @foreach($data['tags'] as $tag)
                                    <option value="{{$tag->id}}">{{$tag->title}}</option>


                                @endforeach

                            </select>

                            @error('tag_id')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>



                        <div class="form-group">
                            <label for="status">Status</label>
                            <input type="radio"  name="status" value="1" />Active
                            <input type="radio"  name="status" value="0"  checked/> De-Active

                        </div>
                        <div class="form-group">
                            <input type="submit" name="save" value="Save Post" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')

    <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .then(editor => {
            console.log('Editor was initialized', editor);
        })
        .catch(error => {
            console.error(error);
        });

    $(document).ready(function() {
        $("#title").keyup(function() {
            var text = $(this).val().toLowerCase();
            text = text.replace(/\s+/g, '-'); // Replace spaces with hyphens
            $("#slug").val(text);
        });
    });




</script>
@endsection
