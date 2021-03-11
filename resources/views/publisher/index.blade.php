@extends('layouts.main')

@section('content')

<div class="card mb-3">
    <div class="card-header"><i class="fas fa-book"></i> Publishers</div>
    <div class="card-body">
        <div>
            <a href="/publishers/add" class="href"><i class="fas fa-plus"></i> Add new publisher</a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered" id="dictTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th style="width: 20px">Id</th>
                    <th>Name</th>
                    <th>Year of establishment</th>
                    <th style="width: 20px">&nbsp;</th>
                    <th style="width: 20px">&nbsp;</th>
                </tr>
                </thead>
                <tbody>
                @foreach($publishers as $publisher)
                    <tr>
                        <td>{{ $publisher->id }}</td>
                        <td>{{ $publisher->name }}</td>
                        <td>{{ $publisher->established }}</td>
                        <td>
                            <a href="publishers/edit/{{$publisher->id}}"><i class="fas fa-edit"></i></a>
                        </td>
                        <td>
                            <a onclick="return confirm('Do you really want to delete the record?')" href="publishers/delete/{{$publisher->id}}"><i class="far fa-trash-alt"></i></a>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
