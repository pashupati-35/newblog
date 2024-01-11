@extends('layouts.backend_master')
@section('title',' Comments List')

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
                        <div class="alert alert-success" style="color: red;">{{session('success')}}</div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger" style="color: red;">{{session('error')}}</div>
                    @endif

                    {{--            table banaune esma chai --}}
                    <table class="table table-bordered">
                        <tr>
                            <th> SN </th>
                            <th> Name</th>
                            <th> Email</th>
                            <th> Phone</th>
                            <th>Comment</th>
                            <th>Action</th>


                        </tr>
                        @foreach($data['records'] as  $index=>$record)
                            <tr>
                                <td> {{$index + 1 }} </td>
                                <td>{{$record->name}} </td>
                                <td> {{$record->email}}</td>
                                <td> {{$record->phone}}</td>
                                <td> {{$record->comment}}</td>
                                <td>

                                    <form method="post" action="{{route('frontend.comment.destroy',$record->id)}}">
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
