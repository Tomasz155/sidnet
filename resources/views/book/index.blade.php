@extends('layouts.main')

@section('content')

<div class="card mb-3">
    <div class="card-header"><i class="fas fa-book"></i> Books</div>
    <div class="card-body">
        <div>
            <a href="/books/add" class="href"><i class="fas fa-plus"></i> Add new book</a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered" id="dictTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th style="width: 20px">Id</th>                    
                    <th>Title</th>
                    <th>Author</th>
                    <th>ISBN</th>
                    <th>Publishing house</th>
                    <th>Year of publication</th>
                    <th style="width: 20px">&nbsp;</th>
                    <th style="width: 20px">&nbsp;</th>
                </tr>
                </thead>
                <tbody>
                @foreach($books as $book)
                    <tr>
                        <td>{{ $book->id }}</td>                        
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author->first_name ." ". $book->author->last_name }}</td>
                        <td>{{ $book->isbn }}</td>
                        <td>{{ $book->publisher->name }}</td>
                        <td>{{ $book->publication_year }}</td>
                        <td>
                            <a href="books/edit/{{$book->id}}"><i class="fas fa-edit"></i></a>
                        </td>
                        <td>
                            <a onclick="return confirm('Do you really want to delete the record?')" href="books/delete/{{$book->id}}"><i class="far fa-trash-alt"></i></a>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
