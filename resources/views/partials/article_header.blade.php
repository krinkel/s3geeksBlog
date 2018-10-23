<header class="masthead" style="background-image: url('@yield('pageImage')')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="post-heading">
                    <h1>@yield('pageTitle')</h1>
                    <h2 class="subheading">@yield('pageDescription')</h2>
                    <span class="meta">Posted by
                <a href="{{ route('author', $article->author) }}">{{ $article->author }}</a>
                on {{ $article->created_at->format('l jS \\of F Y h:i:s A') }}</span>
                    <span class="meta">Visits {{ $article->visits }}</span>
                </div>
            </div>
        </div>
    </div>
</header>