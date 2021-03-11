<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function create()
    {
        return view('author.form');
    }

    public function destroy($authorId)
    {
        if(Book::where('author_id', $authorId)->count()){
            return redirect('/authors')->with('error', 'The author cannot be deleted because of being linked to a book item');
        }
        else{
            $del = Author::destroy($authorId);
            if ($del){
                return redirect('/authors')->with('success', 'Author deleted');
            }
        }
    }

    public function edit($authorId){
        $author = Author::find($authorId);
        return view('author.form')
            ->with([
                'author' => $author,
                'update' => true
            ]);
    }

    public function index()
    {
        $authors = Author::orderBy('last_name')->get();
        return view('author.index')->with(['authors' => $authors]);
    }

    private function saveAuthor(Request $request, $author)
    {
        $author->first_name = $request->firstname;
        $author->last_name = $request->lastname;
        $author->save();
    }

    public function store(Request $request)
    {
        $this->validationAuthor($request);

        $author = new Author;
        $this->saveAuthor($request, $author);

        return redirect('/authors')->with('success', 'Author created');
    }

    public function update(Request $request)
    {
        $this->validationAuthor($request);
        $author = Author::find($request->authorId);
        $this->saveAuthor($request, $author);

        return redirect('/authors')->with('success', 'Author saved');
    }

    private function validationAuthor(Request $request)
    {
        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required'
        ]);
    }
}
