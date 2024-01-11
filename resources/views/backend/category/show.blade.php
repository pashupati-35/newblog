@extends('layouts.backend_master')
@section('title','Category Detail')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Category Detail</h1>
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Category Information</h6>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    <table class="table table-bordered">
                        <tr>
                            <th>Title</th>
                            <td>{{ $data['record']->title }}</td>

                        </tr>
                        <tr>
                            <th>Slug</th>
                            <td>{{ $data['record']->slug }}</td>

                        </tr>
                        <tr>
                            <th>Rank</th>
                            <td>{{ $data['record']->rank }}</td>

                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>
                                @if($data['record']->status == 1);
                            <span class="text-success">Active</span>
                            @else
                                <span class="text-danger">De Active</span>
                            @endif
                           </td>
                        </tr>
                        <tr>
                            <th>Created at</th>
                            <td>{{ $data['record']->created_at }}</td>

                        </tr>
                        <tr>
                            <th>Updated at</th>
                            <td>{{ $data['record']->updated_at}}</td>

                        </tr>
                        <tr>
                            <th>Created By</th>
{{--                                                   <td>{{ $data['record']->created_by }}</td>--}}
{{--                                                   <td>{{ \App\Models\User::find($data['record']->created_by)->name }}</td>--}}
                            <td>{{ $data['record']->createdBy->name }}</td>
                        </tr>
                        <tr>
                            @if(!empty($data[' record']->updated_by))
                                <th>Updated By</th>
                                <td>{{ $data['record']->updatedBy->name }}</td>
                        </tr>
                        @endif
                    </table>
                    <div class="mt-3">
                        {{--                        $data['records']->link()--}}
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
