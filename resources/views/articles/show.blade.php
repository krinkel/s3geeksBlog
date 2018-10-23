@extends('layouts.default')

@section('pageTitle'){{ $article->title }} @endsection
@section('pageDescription'){{ str_limit(strip_tags($article->description), 100) }} @endsection
@section('pageImage'){{ asset('themes/clean_blog/img/post-bg.jpg') }} @endsection
@section('header') @include('partials.article_header') @endsection

@section('content')
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <p>{!! $article->description !!}</p>
                </div>
            </div>
        </div>
    </article>
@endsection