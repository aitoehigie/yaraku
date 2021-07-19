@extends('layouts.app')

@section('content')
<div class="mx-auto container content-center">
    <p class="text-3xl text-center font-bold m-5">Add a Book</p>
<form class="w-5/6 mx-auto max-w-sm" method="POST" action="/books">
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
<p class="text-lg text-center font-bold m-5 pt-20">Book List</p>
<table class="rounded-t-lg m-5 w-5/6 mx-auto bg-gray-200 text-gray-800">
  <tr class="text-left border-b-2 border-gray-300">
    <th class="px-4 py-3">Title</th>
    <th class="px-4 py-3">Author</th>
    <th class="px-4 py-3">Delete</th>
  </tr>
  
  @foreach ($books as $book)
  <tr class="bg-gray-100 border-b border-gray-200">
    <td class="px-4 py-3">{{ $book->title }}</td>
    <td class="px-4 py-3">{{ $book->author }}</td>
    <td class="px-4 py-3">Delete Me</td>
  </tr> 
  @endforeach
</table>
@endsection