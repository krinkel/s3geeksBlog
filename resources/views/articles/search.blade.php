@extends('layouts.default')

@section('pageTitle')المقالات - "{{ $text }}" @endsection
@section('pageDescription')نتائج البحث عن {{ $text }} @endsection
@section('pageImage'){{ asset('themes/clean_blog/img/home-bg.jpg') }} @endsection
@section('header') @include('partials.header') @endsection

@section('content')
    <div class="col-lg-8 col-md-10 mx-auto">
        @if( count($articles) )
            @foreach ($articles as $article)
                <div class="post-preview">
                    <a href="{{ route('show', $article->id) }}">
                        <h2 class="post-title">
                            {{ $article->title }}
                        </h2>
                        <h3 class="post-subtitle">
                            {{ str_limit(strip_tags($article->description), 200) }}
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
                {!! $articles->links() !!}
            </div>
        @else
            <div class="alert alert-danger">
                لا توجد نتائج مطابقة لبحثك
            </div>
        @endif
    </div>
@endsection