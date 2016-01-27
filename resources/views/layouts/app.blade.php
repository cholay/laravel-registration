<!DOCTYPE html>
<html>
<head>
    <title>Laravel Login and Registration System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {!! Html::style('assets/css/bootstrap.min.css') !!} 
    {!! Html::style('assets/css/style.css') !!} 
    <script src="{!! asset('assets/js/jquery.min.js')!!}"></script>
    <script src="{!! asset('assets/js/bootstrap.min.js')!!}"></script>
    <style>
        body{
            padding-top: 70px;
        }
    </style>
</head>
<body>
<div class="page">
    <div class="container-fluid">
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">Registration Form Tutorial</a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        @if (Auth::check())
                        <li><a href="{!! route('logout') !!}">Log Out</a></li>
                        <li><a href="{!! route('logout') !!}">{!! Auth::user()->first_name !!}</a></li>
                        @else
                        <li><a href="{!! route('login') !!}">Login</a></li>
                        <li><a href="{!! route('register') !!}">Sign Up</a></li>
                        @endif
                    </ul>

                </div><!-- /.navbar-collapse -->
            </div>
        </nav>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                
        @if ($errors->has())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {!! $error !!}<br>        
            @endforeach
        </div>
        @endif
            </div>
        </div>
    </div>
    @yield('content')
</div>
@show
</body>
</html>