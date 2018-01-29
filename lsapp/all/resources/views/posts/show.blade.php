@extends('layouts.app')
@section('content')
<a href="{{route('posts.index')}}" class="btn btn-default">Go Back</a>

<h1>{{$post->title}}</h1>

<div class="well"><h2>{{$post->body}}</h2></div>
<hr>
<small>Created on:-{{$post->created_at}} by {{$post->user->name}}</small>
<hr>
@if(!Auth::guest())
    @if(Auth::user()->id==$post->user_id)
<a href="{{ route('posts.edit',['id'=>$post->id]) }}" class="btn btn-default">Edit Post</a>

{!!Form::open(['action'=>['PostsController@destroy',$post->id],'method'=>'POST','class'=>'pull-right'])!!}

    {{Form::hidden('_method','DELETE')}}
    {{Form::submit('Delete Post',['class'=>'btn btn-danger'])}}

{!!Form::close()!!}
@endif
@endif
@endsection
