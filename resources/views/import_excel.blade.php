<!DOCTYPE html>
<html>
<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
  <div class="pt-5 pr-5 pb-5 pl-5">
    <!-- Breadcrumb -->
      <span id="breadcrumb" class="p-2 mb-3">
        <span class="breadcrumb-item active" aria-current="page">import_excel</span>
      </span>
    <!-- /Breadcrumb -->
    <div class="row ml-0 mr-0">
      <div class="card w-100 mb-5">
        <div class="card-body p-0">
          <div class="col-md-12">
            <h4 class="uppercase text-uppercase font-weight-bold text-center p-3 mb-0" data-toggle="collapse" href="#collapseImport" role="button" aria-expanded="false" aria-controls="collapseImport">Importovanie excel súboru na upload. Podporované formáty: .xlsx, .xls, .csv</h4>
          </div>
          <div class="col-md-12">
            @if(count($errors) > 0)
             <div class="alert alert-danger">
              Upload chyba:<br><br>
              <ul>
               @foreach($errors->all() as $error)
               <li>{{ $error }}</li>
               @endforeach
              </ul>
             </div>
            @endif

            @if($message = Session::get('success'))
            <div class="alert alert-success alert-block">
             <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif
          </div>
          <div class="col-md-12 collapse" id="collapseImport">
            <div class="col-md-12">
              <form method="post" enctype="multipart/form-data" action="{{ url('/import_excel/import') }}">
               {{ csrf_field() }}
                <table class="table mt-2 mb-0">
                  <tr class="border-top-0">
                    <td class="align-middle pr-5" align="right"><span>Vybrať súbor na upload</span></td>
                    <td class="align-middle"><input type="file" name="select_file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"/></td>
                    <td><input type="submit" name="upload" class="btn btn-primary" value="Uploadovať"></td>
                  </tr>
                </table>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

     <div class="card w-100 mb-3">
       <div class="card-body p-3">
         <div class="row ml-0 mr-0">
           <div class="col-md-4 pl-0 pr-0">
             <div class="input-group choose-invoices-by-year">
              <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                Rozšírené vyhľadávanie
              </a>
            </div>
           </div>

           <div class="col-md-4 pl-0 pr-0">
             <div class="input-group choose-invoices-by-year">
              <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Faktúry za rok:</label>
              </div>
              <select class="custom-select" id="inputGroupSelect01">
                <option selected value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            </div>
           </div>

           <div class="col-md-4 pl-0 pr-0">
             <div class="input-group invoices-search">
              <input type="text" class="form-control" placeholder="Vyhľadávanie" aria-label="Recipient's username" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
              </div>
            </div>
           </div>

           <div class="col-md-12 collapse mt-3 collapse-border-top pt-3" id="collapseExample">
             <div class="form-group row">
               <div class="col-2">
                 <span class="align-center">Číslo dokumentu: </span>
               </div>
               <div class="col-6 pl-0 pr-0">
                 <input class="form-control" type="text" id="number-of-document-input">
               </div>
             </div>

             <div class="form-group row">
               <div class="col-2">
                 <span class="align-center">Predmet plnenia: </span>
               </div>
               <div class="col-6 pl-0 pr-0">
                 <input class="form-control" type="text" id="icon-input">
               </div>
             </div>
             <div class="form-group row">
               <div class="col-2">
                 <span class="align-center">Dodávateľ: </span>
               </div>
               <div class="col-6 pl-0 pr-0">
                 <input class="form-control" type="text" id="icon-input2">
               </div>
             </div>

             <div class="form-group row">
               <div class="col-2">
                 <span class="align-center">IČO: </span>
               </div>
               <div class="col-6 pl-0 pr-0">
                 <input class="form-control" type="text" id="icon-input3">
               </div>
             </div>

             <div class="form-group row">
               <div class="col-2">
                 <span class="align-center">Dátum: </span>
               </div>
               <label for="example-date-input" class="col-1 col-form-label pl-0 pr-3" align="right">od</label>
               <div class="col-2 pl-0 pr-0">
                 <input class="form-control" type="date" value="2011-08-19" id="example-date-input">
               </div>

               <label for="example-date-input" class="col-1 col-form-label pr-3" align="right">do</label>
               <div class="col-2 pl-0 pr-0">
                 <input class="form-control" type="date" value="2011-08-19" id="example-date-input">
               </div>
             </div>

             <div class="form-group row">
               <div class="col-2">
                 <span class="align-center">Celková hodnota: </span>
               </div>
               <label for="price-input1" class="col-1 col-form-label pl-0 pr-3" align="right">od</label>
               <div class="col-2 pl-0 pr-0">
                 <input class="form-control" type="text" value="0€" id="price-input1">
               </div>

               <label for="price-input2" class="col-1 col-form-label pr-3" align="right">do</label>
               <div class="col-2 pl-0 pr-0">
                 <input class="form-control" type="text" value="0€" id="price-input2">
               </div>
             </div>

             <div class="row">
               <div class="col-md-8 pl-0 pr-0">
                 <button type="button" name="button" class="btn btn-primary w-100">Vyhľadať</button>
              </div>
             </div>
           </div>
         </div>
       </div>
     </div>

     <div class="row ml-0 mr-0">
       <div class="card w-100">
         <div class="card-body p-0">
           <div class="col-md-12">
             <h4 class="uppercase text-uppercase font-weight-bold text-center p-3">Faktúry</h4>
           </div>
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">Číslo</th>
              <th scope="col">Názov <i class="caret-icon fa fa-caret-down"></i></i></th>
              <th scope="col">Dodávateľ <i class="caret-icon fa fa-caret-down"></i></th>
              <th scope="col">Suma <i class="caret-icon fa fa-caret-down"></i></th>
              <th scope="col">Dátum <i class="caret-icon fa fa-caret-down"></i></th>
              <th scope="col">Typ</th>
            </tr>
          </thead>

          <tbody>
            @foreach($data as $row)
            <tr>
              <td>
                @if ($row->cislo != null)
                {{ $row->cislo }}
                @else
                ---
                @endif
              </td>

              <td>
                <a href="/import_excel/detail/{{ $row->cislo }}">
                  @if ($row->predmet != null)
                  {{ $row->predmet }}
                  @else
                  ---
                  @endif
                </a>
              </td>

              <td>
                @if ($row->dodavatel != null)
                {{ $row->dodavatel }}
                @else
                ---
                @endif
              </td>

              <td>
                @if ($row->suma != null)
                {{ $row->suma }}€
                @else
                ---
                @endif
              </td>

              <td>
                @if ($row->datum != null)
                {{ $row->datum }}
                @else
                ---
                @endif
              </td>

              <td>
                @if ($row->typ != null)
                {{ $row->typ }}
                @else
                ---
                @endif
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
     <div class="text-center pt-3 mb-4">
       {{ $data->Links() }}
     </div>
    </div>
  </div>
</div>
<div class="footer w-100 pl-5 pr-5">
  <div class="pt-3">
    <div class="float-left">
      © 2020 J. Balent, M. Kundrák, M. Jurík. Všetky práva vyhradené.
    </div>
    <div class="float-right">
      <i class="fab fa-instagram pr-2 instagram"></i>
      <i class="fab fa-facebook-square facebook"></i>
    </div>
  </div>
</div>
</body>
</html>
