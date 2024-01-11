@extends('layouts.frontend_master')
@section('content')

    <article class="mb-4">
        <header class="masthead" style="background-image: url('{{asset('image/post/'. $data['posts']->feature_image)}}')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="post-heading">
                            <h1>{{$data['posts']->title}}</h1>
                            <h2 class="subheading">{{$data['posts']->short_description}}</h2>
                            <span class="meta">
                                Posted by
                                <a href="#!">{{$data['posts']->createdBy->name}}</a>
                                on {{$data['posts']->created_at}}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    {!! ! $data['posts']->description !!}
                </div>
            </div>
            <!-- Submit success message-->
            @if(session('success'))
                <div class="alert alert-success mt-3">
                    {{ session('success') }}
                </div>
            @endif
            <!-- Submit error message-->
            @if(session('error'))
                <div class="alert alert-danger mt-3">
                    {{ session('error') }}
                </div>
            @endif
            <h3>comments</h3>
            <form action="{{route('frontend.post_comment',$data['posts']->id)}}" method="post" id="contactForm">
               @csrf
                <div class="form-floating">
                    <input name="name" class="form-control" id="name" type="text" placeholder="Enter your name..." data-sb-validations="required" />
                    <label for="name">Name</label>
                    <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                </div>
                <div class="form-floating">
                    <input name="email" class="form-control" id="email" type="email" placeholder="Enter your email..." data-sb-validations="required,email" />
                    <label for="email">Email address</label>
                    <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                    <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                </div>
                <div class="form-floating">
                    <input name="phone" class="form-control" id="phone" type="tel" placeholder="Enter your phone number..." data-sb-validations="required" />
                    <label for="phone">Phone Number</label>
                    <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
                </div>
                <div class="form-floating">
                    <textarea name="comment" class="form-control" id="message" placeholder="Enter your message here..." style="height: 12rem" data-sb-validations="required"></textarea>
                    <label for="message">Message</label>
                    <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                </div>
                <br />

                <!-- Submit Button-->
                <button class="btn btn-primary" id="submitButton" type="submit" >Send</button>
{{--                <input type="submit" name="Send"  class="btn btn-outline-success">--}}
            </form>
        </div>
    </article>




@endsection
