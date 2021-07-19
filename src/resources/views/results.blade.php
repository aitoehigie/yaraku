@extends('layouts.app')

@section('content')
<div class="mx-auto container content-center">
    <p class="text-2xl text-center font-bold m-5">Search Results</p>
    <div class="row content-center pt-5">
        @if($books->isNotEmpty())
        <ol class="list-decimal">
            @foreach ($books as $book)
                <div class="book-list pb-5">
                        <li>
                            <p>Title: <span class="text-gray-500">{{ $book->title }}</span></p>
                            <p>Author: <span class="text-gray-500">{{ $book->author }}</span></p>
                        </li>
                </div>
            @endforeach
        </ol>
        @else
            <div>
                <h2>No books were found!</h2>
            </div>
        @endif
    </div>
</div>
@endsection