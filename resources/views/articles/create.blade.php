@extends('app')
@section('content')
    <h1>Write a new article</h1>
    <hr />
    <article>
        {!! Form::open(['url' => 'articles']) !!}
            @include('articles.form', ['submitButton' => 'Add article'])
        {!! Form::close() !!}

        @include('errors.list')
    </article>
@stop