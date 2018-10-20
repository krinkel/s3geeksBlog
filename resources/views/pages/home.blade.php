@extends('layouts.default')

@section('pageTitle')Homepage @endsection
@section('pageDescription')مرحباُ بكم في موقعي @endsection
@section('pageImage'){{ asset('themes/clean_blog/img/home-bg.jpg') }} @endsection
@section('header') @include('partials.header') @endsection

@section('content')
    <div class="col-lg-8 col-md-10 mx-auto">

        @if( session('alert') )
            <div class="alert alert-success" style="position: fixed; z-index: 10000; top: 2px; right: 2px">{{ session('alert') }}</div>
        @endif

        @foreach ($articles as $article)
            <div class="post-preview">
                <a href="{{ route('show', $article->id) }}">
                    <h2 class="post-title">
                        {{ $article->title }}
                    </h2>
                    <h3 class="post-subtitle">
                        {{ str_limit($article->description, 200) }}
                    </h3>
                </a>
                <p class="post-meta">Posted by
                    <a href="{{ route('author', $article->author) }}">{{ $article->author }}</a>
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