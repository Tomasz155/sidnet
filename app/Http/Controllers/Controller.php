<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Publisher;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function dashboard()
    {
        $stats = [
            'countAuthors' => Author::count(),
            'countBooks' => Book::count(),
            'countPublishers' => Publisher::count(),
        ];

        return view('dashboard', [
            'stats' => $stats
        ]);
    }

}
