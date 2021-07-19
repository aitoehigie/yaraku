<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class SearchController extends Controller
{
    public function search(Request $request){
        $search = $request->input('search');
        $books = Book::query()
            ->where('title', 'LIKE', '%'.$search.'%')
            ->orWhere('author', 'LIKE', '%'.$search.'%')
            ->get();
        dd($books);
        return view('index')->with(['books'=>$books]);
    }
}


