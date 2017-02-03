<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ action('Admin\HomeController@index') }}">{{ config('custom.admin', 'Laravel') }}</a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                &nbsp;
                @if (!Auth::guest())
                    <li>
                        <a href="{{ action('Admin\WordController@index') }}">{{ trans_choice('keywords.words', 2) }}</a>
                    </li>
                    <li>
                        <a href="{{ action('Admin\CategoryController@index') }}">{{ trans_choice('keywords.categories', 2) }}</a>
                    </li>
                    <li>
                        <a href="{{ action('Admin\UserController@index') }}">{{ trans_choice('keywords.users', 2) }}</a>
                    </li>
                @endif
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li>
                        <a href="{{ action('Auth\LoginController@showLoginForm') }}">{{ trans('keywords.login') }}</a>
                    </li>
                    <li>
                        <a href="{{ action('Auth\RegisterController@showRegistrationForm')}}">{{ trans_choice('keywords.users', 2) }}</a>
                    </li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <img src="{{ Auth::user()->avatarUrl }}" alt="avatar" class="avatar-navigation">
                            {{ Auth::user()->name }}
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                {{-- <a href="{{ action('Application\UserController@show') }}">{{ trans('keywords.profile') }}</a> --}}
                                <a href="#">{{ trans('keywords.profile') }}</a>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
