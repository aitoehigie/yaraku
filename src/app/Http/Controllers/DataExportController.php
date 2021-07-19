<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class DataExportController extends Controller
{
  public function download_title_and_author_data(){
    $title_and_author = Book::all();
    $filename = "title_and_author.csv";
    $handle = fopen($filename, 'w+');
    fputcsv($handle, array('id', 'title', 'author');

    foreach($table as $row) {
        fputcsv($handle, array($row['id'], $row['title'], $row['author']));
    }

    fclose($handle);

    $headers = array(
        'Content-Type' => 'text/csv',
    );
    return Response::download($filename, 'title_and_author.csv', $headers);
  }
}
