@extends('layouts.app')
@section('content')
    @if(count($posts)>0)
   
    <h1>Posts Created:-</h1>
   
    @foreach($posts as $post)
        <div class="well">
                <h3><a href="{{ route('posts.show',['id'=>$post->id]) }}">{{$post->title}}</a></h3>
                <small>Created on:-{{$post->created_at}} by {{$post->user->name}}</small>
        </div>    
        @endforeach
        {{$posts->links()}}   <!--used links for pagination-->
    @else
    <p>No Posts Found..!!</p>
    @endif
@endsection