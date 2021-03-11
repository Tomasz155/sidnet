<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use App\Models\Book;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    public function create()
    {
        return view('publisher.form');
    }

    public function destroy($publisherId)
    {
        if(Book::where('publisher_id', $publisherId)->count()){
            return redirect('/publishers')->with('error', 'The publisher cannot be deleted because of being linked to a book item');
        }
        else{
            $del = Publisher::destroy($publisherId);
            if ($del){
                return redirect('/publishers')->with('success', 'Publisher deleted');
            }
        }
    }

    public function edit($publisherId){
        $publisher = Publisher::find($publisherId);
        return view('publisher.form')
            ->with([
                'publisher' => $publisher,
                'update' => true
            ]);
    }

    public function index()
    {
        $publishers = Publisher::orderBy('name')->get();
        return view('publisher.index')->with(['publishers' => $publishers]);
    }

    private function savePublisher(Request $request, $publisher)
    {
        $publisher->name = $request->name;
        $publisher->established = $request->established;
        $publisher->save();
    }

    public function store(Request $request)
    {
        $this->validationPublisher($request);

        $publisher = new Publisher;
        $this->savePublisher($request, $publisher);

        return redirect('/publishers')->with('success', 'publisher created');
    }

    public function update(Request $request)
    {

        $this->validationPublisher($request);

        $publisher = Publisher::find($request->publisherId);
        $this->savePublisher($request, $publisher);

        return redirect('/publishers')->with('success', 'Publisher updated');
    }

    private function validationPublisher(Request $request)
    {
        $currentYear = date('Y');

        $this->validate($request, [
            'name' => 'required',
            'established' => 'required|before_or_equal:'.$currentYear,
        ]);
    }
}
