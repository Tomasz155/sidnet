@extends('layouts.main')

@section('content')
<div class="card mb-3">
    <div class="card-header"><i class="fas fa-book"></i> {{isset($update)?'Edit publisher':'Create publisher'}}</div>
    <div><a href="/publishers" class="href"><i class="fas fa-arrow-circle-left"></i> return to list</a></div>
        <div class="card-body">

            @if (isset($update))
                {!! Form::open(['action' => 'App\Http\Controllers\PublisherController@update', 'method' => 'post']) !!}
            @else
                {!! Form::open(['action' => 'App\Http\Controllers\PublisherController@store', 'method' => 'post']) !!}
            @endif

            <div class="form-group">
                {{ Form::label('name', 'Name') }}
                {{ Form::text('name', isset($publisher->name)?$publisher->name:null, ['class' => 'form-control', 'placeholder' => 'Publisher name']) }}
            </div>
            <div class="form-group">
                {{ Form::label('established', 'Year of establishment') }}
                {{ Form::text('established', isset($publisher->established)?$publisher->established:null, ['class' => 'form-control', 'placeholder' => 'Year of establishment']) }}
            </div>
            {{ Form::hidden('publisherId',isset( $publisher->id)? $publisher->id:null) }}
            {{ Form::submit('Save', ['class' => 'btn btn-secondary']) }}
            {!! Form::close() !!}
        </div>
    </div>
</div>

@endsection
