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
        <section class="recent-posts">
            <div class="section-title">
                <h2><span>{{$blogPost->title}}</span></h2>
            </div>
            <div class="card-block">
                <img class="img-fluid" src="{{asset('assets/demopic/'.rand(1,10).'.jpg')}}" alt="">
            </div>
            <div class="card-block">
                {{strip_tags(html_entity_decode($blogPost->description))}}
            </div>
            <div class="metafooter">
                <div class="wrapfooter">
                      <span class="author-meta">
						<span class="post-name">{{is_object($blogPost->user) ? $blogPost->user->name : $blogPost->user}}</span><br/>
						<span class="post-date">{{$blogPost->publication_date}}</span><span class="dot"></span><span class="post-read">{{rand(1,4)}} min read</span>
                      </span>
                   </div>
            </div>
        </section>
        <!-- End List Posts
        ================================================== -->


    </div>

@endsection
