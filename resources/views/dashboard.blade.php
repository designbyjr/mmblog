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
                <h2><span>My Stories</span></h2>
            </div>
            <div class="card-header col-12 mb-4">
                <div class="push-10 col-2">
                    <form method="post" action="{{route('dashboard')}}" id="sort-form">
                        <select name="sort" id="sort" class="custom-select col-12" onchange="event.preventDefault();
                                                     document.getElementById('sort-form').submit();">
                        <option value="sort" disabled selected>Sort By</option>
                            <option value="asc">Latest</option>
                            <option value="desc">Oldest</option>
                    </select>
                        @csrf
                    </form>
                </div>
            </div>
            <div class="card-columns listrecent">
                @foreach($blogs as $blog)
                <!-- begin post -->
                <div class="card">
                    <a href="{{ route('read_post',['model'=>class_basename($blog),'id'=>$blog->id]) }}">
                        <img class="img-fluid" src="{{asset('assets/demopic/'.rand(1,10).'.jpg')}}" alt="">
                    </a>
                    <div class="card-block">
                        <h2 class="card-title"><a href="{{ route('read_post',['model'=>class_basename($blog),'id'=>$blog->id]) }}">{!!$blog->title!!}</a></h2>
                        <h4 class="card-text">{{strip_tags(html_entity_decode($blog->description))}}</h4>
                        <div class="metafooter">
                            <div class="wrapfooter">
                                <span class="author-meta">
						<span class="post-name">{{$blog->user->name}}</span><br/>
						<span class="post-date">{{$blog->publication_date}}</span><span class="dot"></span><span class="post-read">{{rand(1,4)}} min read</span>
						</span>
                                <span class="post-read-more"><a href="{{ route('read_post',['model'=>class_basename($blog),'id'=>$blog->id]) }}" title="Read Story"><svg class="svgIcon-use" width="25" height="25" viewbox="0 0 25 25"><path d="M19 6c0-1.1-.9-2-2-2H8c-1.1 0-2 .9-2 2v14.66h.012c.01.103.045.204.12.285a.5.5 0 0 0 .706.03L12.5 16.85l5.662 4.126a.508.508 0 0 0 .708-.03.5.5 0 0 0 .118-.285H19V6zm-6.838 9.97L7 19.636V6c0-.55.45-1 1-1h9c.55 0 1 .45 1 1v13.637l-5.162-3.668a.49.49 0 0 0-.676 0z" fill-rule="evenodd"></path></svg></a></span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end post -->
                @endforeach


            </div>
        </section>
        <!-- End List Posts
        ================================================== -->


    </div>

@endsection
