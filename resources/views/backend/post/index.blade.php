@extends('layouts.backend_master')
@section('title',' Post List')

@section('content')

    <h1 class="h3 mb-4 text-gray-800">Post List</h1>
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Post Data</h6>

                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{session('success')}}</div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger">{{session('error')}}</div>
                    @endif

                    {{--            table banaune esma chai --}}
                    <table class="table table-bordered">
                        <tr>
                            <th> SN </th>
                            <th> Title</th>
                            <th> Rank</th>
                            <th> Status</th>
                            <th>Action</th>


                        </tr>
                        @foreach($data['records'] as  $index=>$record)
                            <tr>
                                <td> {{$index + 1 }} </td>
                                <td>{{$record->title}} </td>
                                <td> {{$record->rank}}</td>
                                <td>
                                    @if($record->status==1)
                                        <span class="text-success"> Active</span>
                                    @else
                                        <span class="text-danger">De-Active</span>

                                    @endif
                                </td>
                                <td>
                                    <a class=" btn btn-info" href="{{route('backend.post.show',$record->id)}}"> View</a>
                                    <a class=" btn btn-warning" href="{{route('backend.post.edit',$record->id)}}"> edit</a>
                                    <form method="post" action="{{route('backend.post.destroy',$record->id)}}">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    </table>
                    <div class="mt-3">
                        {{--            {{$data['records']->links()}}--}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
