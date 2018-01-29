@extends('layouts.app')
@section('content')
    
    <h1>Edit Post</h1>
    
    {!! Form::open(['action'=>['PostsController@update',$post->id],'method'=>'POST']) !!}
    
    <div class="form-group">
        <br>
        {{Form::label('title','Your Title:')}}
        {{Form::text('title',$post->title,['class'=>'form-control','placeholder'=>'Title'])}}
        <br>
        {{Form::label('body','Body of Post:')}}
        {{Form::textarea('body',$post->body,['class'=>'form-control','placeholder'=>'Body Text'])}}
        <hr>
        {{Form::hidden('_method','PUT')}}   <!--bcoz the route was taking put request hence a hidden input is made to req put-->
    </div>
        {{Form::submit('Save',['class'=>'btn btn-primary'])}}

    {!! Form::close() !!}

@endsection