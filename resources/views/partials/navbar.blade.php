<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name') }}</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('articles') }}">Articles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about') }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                </li>
            </ul>
        </div>

        <div class="col-sm-4 col-sm-offset-3">
            <div id="imaginary_container">
                <form action="{{ route('search') }}" method="get">
                    {{--@csrf--}}
                    {{--{!! csrf_field() !!}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
                    <div class="input-group stylish-input-group">
                        <input type="text" name="q" value="{{ old('q') }}" class="form-control" placeholder="ابحث عن مقال ..">
                        <span class="input-group-addon">
                            <button type="submit">
                                go
                            </button>
                        </span>
                    </div>
                </form>
            </div>
        </div>

    </div>
</nav>