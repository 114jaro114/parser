<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\InvoiceImport;
use App\Models\Invoices;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Rap2hpoutre\FastExcel\FastExcel;


class UploadFileController extends Controller
{
    function index() {
      $data = DB::table('faktury')->simplePaginate(10);
      return view('import_excel', compact('data'));
    }

    function import(Request $request) {

      // Truncate the table.
      DB::table('faktury')->truncate();

      $this->validate($request, [
       'select_file' => 'required|mimes:xls,xlsx,csv,txt'
      ]);

     if($request->file('select_file')->getClientMimeType() == "application/vnd.ms-excel") {
       $data = Excel::toArray(new InvoiceImport, $request->file('select_file'));
       if(count($data) > 0) {
         foreach($data as $key => $value) {
          foreach($value as $row) {
           $insert_data[] = array(
             'datum' => $row[0],
             'cislo' => $row[1],
             'predmet' => $row[2],
             'suma' => $row[3],
             'dodavatel' => $row[4],
             'ico' => $row[5],
             'adresa' => $row[6]
           );
          }
        }

         if(!empty($insert_data)) {
           foreach (array_chunk($insert_data,1000) as $t) {
             DB::table('faktury')->insert($t);
             // return $t;
           }
         }
      }
      return back()->with('success', 'Súbor bol úspešne uploadnutý');
    } else {
      $data = Excel::import(new InvoiceImport, $request->file('select_file'));
      return back()->with('success', 'Súbor bol úspešne uploadnutý');
    }
  }
}
