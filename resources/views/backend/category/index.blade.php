@extends('layouts.backend_master')
@section('title','Category List')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Category List</h1>
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Category Data</h6>
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
                            <th>SN</th>
                            <th>Title</th>
                            <th>Rank</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        @foreach($data['records'] as $index => $record)
                            <tr>
                                <td>{{ $index +1 }}</td>
                                <td>{{ $record->title }}</td>
                                <td>{{ $record->rank }}</td>

                                <td>
                                    @if($record->status == 1);
                                    <span class="text-success">Active</span>
                                    @else
                                        <span class="text-danger">De Active</span>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-info" href="{{route('backend.category.show',$record->id)}}"> View</a>
                                    <a class="btn btn-info" href="{{route('backend.category.edit',$record->id)}}"> edit</a>
                                    <div>
{{--                                <form action="{{route('backend.category.destroy',$record->id)}}" method="post">--}}
{{--                                    @csrf--}}
{{--                                    <input type="hidden" name="__method" value="delete">--}}
{{--                                    <button type="submit" class="btn btn-danger">Delete</button>--}}
{{--                                </form>--}}
                                        <form action="{{ route('backend.category.destroy', $record->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    <div class="mt-3">
                        {{--                        $data['records']->link()--}}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
