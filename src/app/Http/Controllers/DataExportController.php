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
}
