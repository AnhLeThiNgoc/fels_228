<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@lang('messages.title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <!-- Styles -->
        {!! Html::style(elixir('css/main.css')) !!}
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ action('HomeController@index') }}">
                            {{ trans('keywords.home') }}
                        </a>
                    @else
                        <a href="{{ action('Auth\LoginController@showLoginForm') }}">
                            {{ trans('keywords.login') }}
                        </a>
                        <a href="{{ action('Auth\RegisterController@showRegistrationForm')}}">
                            {{ trans('keywords.register') }}
                        </a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    {{ config('app.name', 'Laravel') }}
                </div>
            </div>
        </div>
    </body>
</html>
