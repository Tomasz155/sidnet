@extends('layouts.main')

@section('content')
<div class="card mb-3">
    <div class="card-header"><i class="fas fa-book"></i> {{isset($update)?'Edit book':'Create book'}}</div>
    <div><a href="/books" class="href"><i class="fas fa-arrow-circle-left"></i> return to list</a></div>
        <div class="card-body">
            @if (isset($update))
                {!! Form::open(['action' => 'App\Http\Controllers\BookController@update', 'method' => 'post']) !!}
            @else
                {!! Form::open(['action' => 'App\Http\Controllers\BookController@store', 'method' => 'post']) !!}
            @endif
            <div class="form-group">
                {{ Form::label('title', 'Title') }}
                {{ Form::text('title', isset($book->title)?$book->title:null, ['class' => 'form-control', 'placeholder' => 'Title']) }}
            </div>
            <div class="form-group">
                {{ Form::label('author', 'Author') }}
               <?php
                     $authors = App\Models\Author::orderBy('last_name')->get();
                     foreach ($authors as $author){
                         $authorArray[$author->id] = $author->last_name." ".$author->first_name;
                     }
                     echo Form::select('authorId', $authorArray, isset($book->author_id)?$book->author_id:null, ['class' => 'form-control', 'placeholder' => 'Pick an author from the list ...']);
               ?>
            </div>            
            <div class="form-group">
                {{ Form::label('isbn', 'ISBN') }}
                {{ Form::text('isbn', isset($book->isbn)? $book->isbn:null, ['class' => 'form-control', 'placeholder' => 'ISBN']) }}
            </div>
            <div class="form-group">
                {{ Form::label('publisher', 'Publishing house') }}
                <?php
                     $publishers = App\Models\Publisher::orderBy('name')->get();
                     foreach ($publishers as $publisher){
                         $publisherArray[$publisher->id] = $publisher->name;
                     }
                     echo Form::select('publisherId', $publisherArray, isset($book->publisher_id)?$book->publisher_id:null, ['class' => 'form-control', 'placeholder' => 'Pick a publisher from the list ...']);
               ?>
            </div>
            <div class="form-group">
                {{ Form::label('publicationYear', 'Year of publication') }}
                {{ Form::text('publicationYear', isset($book->publication_year)?$book->publication_year:null, ['class' => 'form-control', 'placeholder' => 'Established year']) }}
            </div>
            {{ Form::hidden('bookId', isset($book->id)?$book->id:null) }}
            {{ Form::submit('Save', ['class' => 'btn btn-secondary']) }}
            {!! Form::close() !!}
        </div>
    </div>
</div>

@endsection
