@extends('layouts.app')

@section('content')
<div class="mx-auto container content-center">
    <p class="text-3xl text-center font-bold m-5">Add a Book</p>
<form class="w-5/6 mx-auto max-w-sm pb-16" method="POST" action="/books">
    @csrf
    <div class="md:flex md:items-center mb-6">
      <div class="md:w-1/3">
        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="book-title">
          Book Title
        </label>
      </div>
      <div class="md:w-2/3">
        <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="book-title" name="book-title" type="text" value="">
      </div>
    </div>
    <div class="md:flex md:items-center mb-6">
        <div class="md:w-1/3">
          <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="book-author">
            Author Name
          </label>
        </div>
        <div class="md:w-2/3">
          <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="book-author" name="book-author" type="text" value="">
        </div>
      </div>
    <div class="md:flex md:items-center">
      <div class="md:w-1/3"></div>
      <div class="md:w-2/3">
        <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
          Add Book
        </button>
      </div>
    </div>
  </form>
</div>
<hr />

<div class="mx-auto container content-center">
    <p class="text-2xl text-center font-bold m-5">Search for a Book</p>
    <div class="shadow flex">
        <form action="{{  route('search') }}" method="GET" class="w-5/6 mx-auto max-w-sm pb-16">
        <input class="w-full rounded p-2" type="text" placeholder="Enter the book title or author..." required name="search" />
        <button class="bg-white w-auto flex justify-end items-center text-blue-500 p-2 hover:text-blue-400">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 float-right" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
              </svg>
        </button>
    </form>
    </div>
</div>


<p class="text-2xl text-center font-bold m-5 pt-20">Book List</p>
<table class="rounded-t-lg m-5 w-5/6 mx-auto bg-gray-200 text-gray-800">
  <tr class="text-left border-b-2 border-gray-300">
    <th class="px-4 py-3">Title</th>
    <th class="px-4 py-3">Author</th>
    <th class="px-4 py-3">Delete</th>
  </tr>
  
  @forelse ($books as $book)
  <tr class="bg-gray-100 border-b border-gray-200">
    <td class="px-4 py-3">
        {{ $book->title }}
    </td>
    <td class="px-4 py-3">
        <a href="/books/{{ $book->id }}/edit">
            {{ $book->author }} <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 items-baseline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
              </svg>
        </a>
    </td>
    <td class="px-4 py-3">
        <form method="POST" action="/books/{{ $book->id }}">
            @csrf
            @method('DELETE')
            <button class="pb-2 italic text-red-500 border-b-2 border-dotted" type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                  </svg>
            </button>
        </form>
    </td>
  </tr> 
  @empty
  <tr class=" border-b border-gray-200">
    <td class="px-4 py-3">No books have been added yet.</td>
  </tr>
  @endforelse
</table>
@endsection