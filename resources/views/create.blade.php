@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="mainheading">
            <h1 class="sitetitle">Mitchell Mcdermott Blog</h1>
            <p class="lead">
                A Tech and News Blog for the ages
            </p>
        </div>
        <!-- End Site Title
        ================================================== -->

        <!-- Begin List Posts
        ================================================== -->
        <section class="title">
            <h3 class="text-center">Create a post</h3>
        </section>
        <section class="form-control">
            <form method="post" action="{{route('create_post')}}">
                <!-- Name input -->

                @csrf
                <div class="form-outline mb-4">
                    @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div>
                        <label class="form-label" for="form4Example1">Title</label>
                    </div>
                    <input type="text" id="form4Example1" name="title" class="form-control" />
                </div>


                <!-- Message input -->
                <div class="form-outline mb-4">
                    @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div>
                        <label class="form-label" for="form4Example3">Description</label>
                    </div>

                    <textarea class="form-control" name="description" id="form4Example3" rows="4"></textarea>
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-4">Send</button>
            </form>
        </section>
        <!-- End List Posts
        ================================================== -->


    </div>

@endsection
