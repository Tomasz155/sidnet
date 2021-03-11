@extends('layouts.main')

@section('content')
<div class="card mb-3">

    <div class="card-header"><i class="fas fa-book"></i>{{isset($update)?'Edit author':'Create author'}}</div>
        <div><a href="/authors" class="href"><i class="fas fa-arrow-circle-left"></i> return to list</a></div>
        <div class="card-body">

            @if (isset($update))
                {!! Form::open(['action' => 'App\Http\Controllers\AuthorController@update', 'method' => 'post']) !!}
            @else
                {!! Form::open(['action' => 'App\Http\Controllers\AuthorController@store', 'method' => 'post']) !!}
            @endif

            <div class="form-group">
                {{ Form::label('lastname', 'Last name') }}
                {{ Form::text('lastname', isset($author->last_name)?$author->last_name:null, ['class' => 'form-control', 'placeholder' => 'Last name']) }}
            </div>
            <div class="form-group">
                {{ Form::label('firstname', 'First name') }}
                {{ Form::text('firstname', isset($author->first_name)?$author->first_name:null, ['class' => 'form-control', 'placeholder' => 'First name']) }}
            </div>            
            {{ Form::hidden('authorId', isset($author->id)?$author->id:null) }}
            {{ Form::submit('Save', ['class' => 'btn btn-secondary']) }}
            {!! Form::close() !!}
        </div>
    </div>
</div>

@endsection
