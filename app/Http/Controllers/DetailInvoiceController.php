<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoices;

class DetailInvoiceController extends Controller
{

  function index() {
    return view('detail');
  }

}
