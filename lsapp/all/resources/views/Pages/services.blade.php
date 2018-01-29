@extends('layouts.app')  

@section('content')
<div class="jumbotron text-center">
        <h1>{{$title}}</h1> <!--this variable will take its value from pagescontroller.php-->
        <ul class="list-group">
            @if(count($services)>0)
                @foreach($services as $s)
                    <li class="list-group-item">{{$s}}</li>
                @endforeach
            @endif
            </ul>
        </div>
@endsection