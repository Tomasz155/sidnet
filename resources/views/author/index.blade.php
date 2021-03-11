@extends('layouts.main')

@section('content')

<div class="card mb-3">
    <div class="card-header"><i class="fas fa-book"></i> Authors</div>
    <div class="card-body">
        <div>
            <a href="/authors/add" class="href"><i class="fas fa-plus"></i> Add new author</a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered" id="dictTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th style="width: 20px">Id</th>
                    <th>Last name</th>
                    <th>First name</th>                    
                    <th style="width: 20px">&nbsp;</th>
                    <th style="width: 20px">&nbsp;</th>
                </tr>
                </thead>
                <tbody>
                @foreach($authors as $author)
                    <tr>
                        <td>{{ $author->id }}</td>                        
                        <td>{{ $author->last_name }}</td>
                        <td>{{ $author->first_name }}</td>
                        <td>
                            <a href="authors/edit/{{$author->id}}"><i class="fas fa-edit"></i></a>
                        </td>
                        <td>
                            <a onclick="return confirm('Do you really want to delete the record?')" href="authors/delete/{{$author->id}}"><i class="far fa-trash-alt"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
