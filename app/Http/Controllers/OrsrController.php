<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use lubosdz\parserOrsr\ConnectorOrsr;
use App\Imports\InvoiceImport;
use App\Models\Invoices;

class OrsrController extends Controller
{
      public function getObsrData($number, $subjects)
    {
      if(is_numeric($subjects)):
        $data = Invoices::where('cislo', '=', $number)->get();
        $ico = $subjects;
        $out = array();

        $connector = new ConnectorOrsr();
        $results = $connector->getDetailByICO($ico);
        $out = $results;

        return view('detail_subjektu', compact('out', 'data', 'subjects'));
      else:
        $data = Invoices::where('cislo', '=', $number)->get();
        $company_name = $subjects;
        $out = array();

        $connector = new ConnectorOrsr();
        $results = $connector->findByObchodneMeno($company_name);
        $out = $results;
        $allFindObjects = $out;
        $string = implode(" ",$out); //get only string from array

        $sid = preg_replace('/(.*)SID=(.*)&P(.*)/sm', '\2', $string); //regullr expression for get SSID
        $id = preg_replace('/(.*)ID=(.*)&SID(.*)/sm', '\2', $string); //regullr expression for get ID
        $out = $connector->getDetailById($id, $sid);
        return view('detail_subjektu', compact('out', 'data', 'subjects'));
      endif;
    }
    // public function actionCompanyDetail($number)
    // {
    //   $data = Invoices::where('cislo', '=', $number)->get();
    //   $link = empty($_GET['h']) ? '' : htmlspecialchars($_GET['h']);
    //   $out = [];
    //
    //   if($link){
    //     $connector = new ConnectorOrsr();
    //     $out = $connector->getDetailByPartialLink($link);
    //   }
    //
    //   return $this->asJson($out);
    // }
}
