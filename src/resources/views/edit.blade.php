@extends('layouts.app')

@section('content')
<div style="width:900px;" class="container pt-4 mx-auto content-center">
    <form method="POST" action="/books/{{ $book->id }}">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @csrf
        @method("PUT")
        
    <div style="width:900px;" class="container max-w-full pt-4 mx-auto">        
        <div class="mb-4">
            <label class="font-bold text-gray-800" for="book-author">Author:</label>
            <div class="md:w-2/3">
            <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="book-author" name="book-author" type="text" value="{{ old("book-author") }}"">
            </div>
        </div>

        <button class="inline-block px-6 py-6 mb-6 tracking-wide text-white bg-blue-500 rounded shadow-lg hover:shadow" type="submit">Update</button>

    </div>
</form>

</div>
@endsection