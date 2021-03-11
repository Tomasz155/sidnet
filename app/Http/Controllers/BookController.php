<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;
use App\Rules\ISBN;

class BookController extends Controller
{
    public function create()
    {
        return view('book.form');
    }

    public function destroy($id)
    {
        $del = Book::destroy($id);
        if ($del){
            return redirect('/books')->with('success', 'Book deleted');
        }
    }

    public function edit($bookId)
    {
        $book = Book::find($bookId);

        return view('book.form')
            ->with([
                'book' => $book,
                'update' => true
            ]);
    }

    public function index()
    {
        $books = Book::orderBy('title')->get();
        return view('book.index')->with(['books' => $books]);
    }

    private function saveBook(Request $request, $book)
    {
        $book->author_id = $request->authorId;
        $book->title = $request->title;
        $book->isbn = str_replace('-','',$request->isbn);
        $book->publisher_id = $request->publisherId;
        $book->publication_year = $request->publicationYear;
        $book->save();
    }

    public function store(Request $request)
    {
        $this->validationBook($request, 'store');
        $book = new Book;
        $this->saveBook($request, $book);

        return redirect('/books')->with('success', 'Book created');
    }

    public function update(Request $request)
    {
        $this->validationBook($request, 'update');
        $book = Book::find($request->bookId);
        $this->saveBook($request, $book);

        return redirect('/books')->with('success', 'Book updated');
    }

    private function validationBook(Request $request, $function)
    {
        $currentYear = date('Y');

        $this->validate($request, [
            'authorId' => 'exists:App\Models\Author,id',
            'title' => 'required',
            'publisherId' => 'exists:App\Models\Publisher,id',
            'publicationYear' => 'required|before_or_equal:'.$currentYear,
        ]);

        if ($function == 'store') {
            $this->validate($request, [
                'isbn' => ['unique:App\Models\Book,isbn', new ISBN]
            ]);
        }
        elseif ($function == 'update'){
            $this->validate($request, [
                'isbn' => ['required', new ISBN]
            ]);
        }
    }
}
