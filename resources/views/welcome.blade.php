<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" type="images/x-ico" href="https://png.pngtree.com/element_our/sm/20180524/sm_5b072f1c21cb2.png" />
        <title>Twitty</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Font Awesome -->
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Twitty
                </div>
                    
                <div class="links">
                    <a href="redirect/facebook">Login to get tweets <sup><img height="20px;" src="https://media.giphy.com/media/sQq7yFgt5O8tW/giphy.gif"></sup></a><br/><br/><br/>
                    
                    <div style="margin: 0 auto; text-align: justify; width: 60%;"><i class="fa fa-quote-left fa-2x"></i>
                    &nbsp;&nbsp;Twitty is an web application based on Php (Laravel) framework which enables user to do social login with facebook. From your profile you can search for tweets based on search key.
                    All the tweets will listed with their sentiments. ~ Developed with <i class="fa fa-heart" style="color:pink;"></i> by <a style="text-decoration: none;" href="https://shivamv12.github.io" target="_blank">Shivam V</a>.</div>
                </div>
            </div>
        </div>
    </body>
</html>
