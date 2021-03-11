@extends('layouts.main')

@section('content')

    <div>
        <div class="container d-flex h-flex align-items-center" >
            <div class="mx-auto text-center">
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">Books</th>
                        <th scope="col">Authors</th>
                        <th scope="col">Publishing houses</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><a href="/books" class="href">{{ $stats['countBooks'] }}</a></td>
                        <td><a href="/authors" class="href">{{ $stats['countAuthors'] }}</a></td>
                        <td><a href="/publishers" class="href">{{ $stats['countPublishers'] }}</a></td>
                      </tr>
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
@endsection
