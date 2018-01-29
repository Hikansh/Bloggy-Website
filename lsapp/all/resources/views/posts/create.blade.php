@extends('layouts.app')
@section('content')
    
    <h1>Create a new Post</h1>
    
    {!! Form::open(['action'=>'PostsController@store','method'=>'POST'/*,'enctype'=>'multipart/form-data'*/]) !!}
    
    <div class="form-group">
        <br>
        {{Form::label('title','Your Title:')}}
        {{Form::text('title','',['class'=>'form-control','placeholder'=>'Title'])}}
        <br>
        {{Form::label('body','Body of Post:')}}
        {{Form::textarea('body','',['class'=>'form-control','placeholder'=>'Body Text'])}}
        <hr>
<!--        <div class="form-group">
            {{Form::file('cover_image')}}
        </div>
    
    <div class="form-group">
    <form action="PostsController@store" method="POST" enctype="multipart/form-data">
    
        <input type="file" name="cover_image" id="cover_image">
         <input type="submit" value="Upload file" name="submit">       
    </form>
    </div>-->
    
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}

    {!! Form::close() !!}

@endsection