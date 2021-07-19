<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class DataExportController extends Controller
{       public function index(){
            return view('downloads');
        }

        public function download_csv($data_type){
        $headers = [
            'Cache-Control'       => 'must-revalidate, post-check=0, pre-check=0'
        ,   'Content-type'        => 'text/csv'
        ,   'Content-Disposition' => 'attachment; filename='.$data_type.'.csv'
        ,   'Expires'             => '0'
        ,   'Pragma'              => 'public'
        ];

        if ($data_type == 'title_author'){
            $list = Book::all()->toArray();
        }
        else {
            $list = Book::select($data_type)->get()->toArray();
        }

        # add headers for each column in the CSV download
        array_unshift($list, array_keys($list[0]));

        $callback = function() use ($list) 
        {
        $FH = fopen('php://output', 'w');
        foreach ($list as $row) { 
            fputcsv($FH, $row);
        }
        fclose($FH);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function download_xml($data_type){
        $headers = [
            'Cache-Control'       => 'must-revalidate, post-check=0, pre-check=0'
        ,   'Content-type'        => 'text/xml, application/xml'
        ,   'Content-Disposition' => 'attachment; filename='.$data_type.'.xml'
        ,   'Expires'             => '0'
        ,   'Pragma'              => 'public'
        ];

        if ($data_type == 'title_author'){
            $books = Book::all()->toArray();
        }
        else {
            $books = Book::select($data_type)->get()->toArray();
        }

        $xml = new \XMLWriter();
        $xml->openMemory();
        $xml->setIndent(true);
        // Start a new document
        $xml->startDocument();
        // Start a element to put data in
        $xml->startElement($data_type);
        // Data what goes in your element\
        foreach ($books as $book) {
            $xml->startElement('book');
            foreach ($book as $key=>$value){
                $xml->writeAttribute($key, $value);
            }
            $xml->endElement();
        }
        $xml->endElement();
        $xml->endDocument();
        
        $contents = $xml->outputMemory();
        $xml = null;
        
        $callback = function() use ($contents) 
        {
            file_put_contents('php://output', $contents);
        };
        return response()->stream($callback, 200, $headers);
    }
}