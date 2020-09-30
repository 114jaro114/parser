<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\InvoiceImport;
use App\Models\Invoices;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Rap2hpoutre\FastExcel\FastExcel;
use lubosdz\parserOrsr\ConnectorOrsr;

class UploadFileController extends Controller
{
    public function getData()
    {
        $data = DB::table('faktury')->paginate(10);

        // $orderByDateASC = Invoices::orderBy('datum', 'ASC')->paginate(10);
        // $orderByDateDESC = Invoices::orderBy('datum', 'DESC')->paginate(10);
        //
        // $orderBySubjectASC = Invoices::orderBy('predmet', 'ASC')->paginate(10);
        // $orderBySubjectDESC = Invoices::orderBy('predmet', 'DESC')->paginate(10);
        //
        // $orderBySupplierASC = Invoices::orderBy('dodavatel', 'ASC')->paginate(10);
        // $orderBySupplierDESC = Invoices::orderBy('dodavatel', 'DESC')->paginate(10);
        //
        // $orderByAmountASC = Invoices::orderBy('suma', 'ASC')->paginate(10);
        // $orderByAmountDESC = Invoices::orderBy('suma', 'DESC')->paginate(10);
        return view(
            'import_excel',
            compact(
            'data',
            // 'orderByDateASC',
            // 'orderByDateDESC',
            // 'orderBySubjectASC',
            // 'orderBySubjectDESC',
            // 'orderBySupplierASC',
            // 'orderBySupplierDESC',
            // 'orderByAmountASC',
            // 'orderByAmountDESC'
        )
        );
    }

    public function import(Request $request)
    {
        $this->validate($request, [
       'select_file' => 'required|mimes:xls,xlsx,csv,txt'
      ]);

        if ($request->file('select_file')->getClientMimeType() == "application/vnd.ms-excel") {
            // Truncate the table.
            DB::table('faktury')->truncate();
            $data = Excel::toArray(new InvoiceImport, $request->file('select_file'));
            if (count($data) > 0) {
                foreach ($data as $key => $value) {
                    foreach ($value as $row) {
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

                if (!empty($insert_data)) {
                    foreach (array_chunk($insert_data, 1000) as $t) {
                        DB::table('faktury')->insert($t);
                        // return $t;
                    }
                }
            }
            return back()->with('success', 'Súbor bol úspešne uploadnutý');
        } else {
            // Truncate the table.
            DB::table('faktury')->truncate();
            $data = Excel::import(new InvoiceImport, $request->file('select_file'));
            return back()->with('success', 'Súbor bol úspešne uploadnutý');
        }
    }
    public function getAllData(Request $request)
    {
        $data = Invoices::get();
        return $data;
    }

    public function getInvoice(Request $request, $number)
    {
        $data = Invoices::where('cislo', '=', $number)->get();
        return view('detail', compact('data'));
    }

    public function getSubjects(Request $request, $number, $ico)
    {
        $data3 = Invoices::where('cislo', '=', $number)->get();
        $data2 = Invoices::where('ico', '=', $ico)->take(1)->get();
        $data = DB::table('faktury')->where('ico', '=', $ico)->paginate(10);
        return view('subjekty', compact('data', 'data2', 'data3'));
    }

    // public function actionFindDetailByIco($subjects)
    // {
    // // $ico = empty($_GET['ico']) ? '' : htmlspecialchars(trim($_GET['ico']));
    // $ico = $subjects;
    // // $out = [];
    //
    // $connector = new ConnectorOrsr();
    // $results = $connector->getDetailByICO($ico);
    // return $results;
    // // return $this->toJson($results);
    // // return view('detail_subjektov', compact('out'));
    // // return view('detail_subjektov');
    // }
}
