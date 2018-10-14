@extends('layouts.default')

@section('pageTitle')Homepage @endsection
@section('pageDescription')مرحباُ بكم في موقعي @endsection
@section('pageImage'){{ asset('themes/clean_blog/img/home-bg.jpg') }} @endsection

@section('content')
    <div class="col-lg-8 col-md-10 mx-auto">
        @foreach ($articles as $article)
            <div class="post-preview">
                <a href="post.html">
                    <h2 class="post-title">
                        {{ $article->title }}
                    </h2>
                    <h3 class="post-subtitle">
                        {{ str_limit($article->description, 200) }}
                    </h3>
                </a>
                <p class="post-meta">Posted by
                    <a href="#">{{ $article->author }}</a>
                    on {{ $article->created_at->format('l jS \\of F Y h:i:s A') }}</p>
            </div>
            <hr>
        @endforeach
        <!-- Pager -->
        <div class="clearfix">
            <a class="btn btn-primary float-right" href="{{ route('articles') }}">All Articles &rarr;</a>
        </div>
    </div>
@endsection