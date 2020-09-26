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
      $data = DB::table('faktury')->paginate(10);
      return view('import_excel', compact('data'));
      // return view('import_excel');
    }

    function import(Request $request) {
     $this->validate($request, [
      'select_file'  => 'required|mimes:xls,xlsx'
     ]);

     // DB::table('faktury')->delete();
     // Truncate the table.
     DB::table('faktury')->truncate();
     $data = Excel::import(new InvoiceImport, $request->file('select_file'));
     // return back();
     // $rows = Excel::toArray(new InvoiceImport, $request->file('select_file'));
     // return response()->json(["data"=>$data]);

     // if($data->count() > 0)
     //  {
     //   foreach($data->toArray() as $key => $value)
     //   {
     //    foreach($value as $row)
     //    {
     //     $insert_data[] = array(
     //      'datum'  => $row['datum'],
     //      'cislo'   => $row['cislo'],
     //      'predmet'   => $row['predmet'],
     //      'suma'    => $row['suma'],
     //      'dodavatel'  => $row['dodavatel'],
     //      'ico'   => $row['ico'],
     //      'adresa'   => $row['adresa']
     //     );
     //    }
     //   }

     // if(count($data) > 0) {
     //   foreach($data as $key => $value) {
     //    foreach($value as $row) {
     //     $insert_data[] = array(
     //       'datum' => $row['datum'],
     //       'cislo' => $row['cislo'],
     //       'predmet' => $row['predmet'],
     //       'suma' => $row['suma'],
     //       'dodavatel' => $row['dodavatel'],
     //       'ico' => $row['ico'],
     //       'adresa' => $row['adresa']
     //     );
     //    }
     //   }
     //
     //
     // if(!empty($data))
     // {
     //   foreach (array_chunk($data,1000) as $t){
     //     // DB::table('faktury')->insert($t);
     //     return $t;
     //   }
     // }

     return back()->with('success', 'Excel Data Imported successfully.');
    // }
  }
}
