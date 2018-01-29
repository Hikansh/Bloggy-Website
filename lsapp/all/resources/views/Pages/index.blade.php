@extends('layouts.app')  

@section('content')
        <div class="jumbotron text-center">
        <h1>Welcome To Bloggy</h1>
        <p>A new way to Blog Your thoughts into posts..!!</p>
<br>
        <ul>
          <li style="text-align:left">Freely Available</li>
          <li style="text-align:left">Easy to use</li>
          <li style="text-align:left">Specially Made for students</li>
        </ul>
       @if(Auth::guest())
        <p><a class="btn btn-primary btn-lg" href="/lsapp/login" role="button">Login</a>  <a class="btn btn-success btn-lg" href="/lsapp/register" role="button">Register</a></p>
      @endif
        </div>        
        @endsection