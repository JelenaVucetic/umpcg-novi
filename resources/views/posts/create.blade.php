@extends('layouts.app')

@section('content')
    <h1>Kreiraj Objavu</h1>
    {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('date', 'Datum')}}
            {{Form::text('date', '', ['class' => 'form-control', 'placeholder' => 'Unesite datum', 'id' => 'date'])}} <br>
        </div>
        <div class="form-group">
            {{Form::label('title', 'Naslov')}}
            <br>
            <span>Do 70 karaktera</span>
            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Unesite naslov', 'id' => 'title'])}} <br>
            <span>Unijeto <span id="char">0 </span>  karatkera</span>
        </div>
        <div class="form-group">
            {{Form::label('body', 'Tekst članka')}}
            {{Form::textarea('body', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Tekst članka'])}}
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
        {{Form::submit('Kreiraj', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection