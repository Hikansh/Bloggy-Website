
<!--This is just a layout that we will include in every page-->

<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
       <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <title>{{config('app.name','LSAPP')}}</title>

    </head>
    <body>
        @include('inc.navbar')
        <div class="container">
        @include('inc.messages')    <!--this is the file that will be showed in case of errors or success-->    
        @yield('content')          <!--this will be the layout for all the pages we make.. we just need to extend this -->
        </div>
    
</body>
</html>
