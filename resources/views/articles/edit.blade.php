@extends('app')
@section('content')
    <h1>Edit a new article</h1>
    <hr />
    <article>
        {!! Form::model($article, ['method' => 'PATCH', 'action' =>['ArticlesController@update', $article->id]]) !!}
            @include('articles.form', ['submitButton' => 'Update article'])
        {!! Form::close() !!}

        @include('errors.list')
    </article>
@stop