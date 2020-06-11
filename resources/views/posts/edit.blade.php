@extends('layouts.app')

@section('content')
    <h1>Izmijeni članak</h1>
    {!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    {{ csrf_field() }}
         <div class="form-group">
           {{Form::label('date', 'Datum')}}
            {{Form::text('date', $post->date, ['class' => 'form-control', 'placeholder' => 'Unesite datum', 'id' => 'date'])}} <br>
        </div>
        <div class="form-group">
            {{Form::label('title', 'Naslov')}}
            {{Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Naslov'])}}
        </div>
        <div class="form-group">
            {{Form::label('body', 'Tekst članka')}}
            {{Form::textarea('body', $post->body, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Tekst članka'])}}
        </div>
        <div class="form-group">
            <select name="category">
                <option value="umpcg">umpcg</option>
                <option value="ostalo">ostalo</option>
            </select>
        </div>
        <div class="form-group">
            {{Form::file('cover_image')}}
        </div>
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection