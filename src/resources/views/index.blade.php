@extends('layouts.app')

@section('content')
<p class="text-lg text-center font-bold m-5">Book List</p>
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