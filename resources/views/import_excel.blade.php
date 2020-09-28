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
  <div class="p-5">
    <h3 align="center"> Importovanie excel súboru na upload. Podporované formáty: .xlsx, .xls, .csv</h3>
    <br />
     @if(count($errors) > 0)
      <div class="alert alert-danger alert-position">
       Upload chyba:<br><br>
       <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
       </ul>
      </div>
     @endif

     @if($message = Session::get('success'))
     <div class="alert alert-success alert-block alert-position">
      <button type="button" class="close" data-dismiss="alert">×</button>
         <strong>{{ $message }}</strong>
     </div>
     @endif

     <form method="post" enctype="multipart/form-data" action="{{ url('/import_excel/import') }}">
      {{ csrf_field() }}
      <div class="form-group">
       <table class="table table-import mt-2">
        <tr>
         <td width="40%" class="align-middle pr-4" align="right"><span>Vybrať súbor na upload</span></td>
         <td width="30" class="align-middle">
          <input type="file" name="select_file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"/>
         </td>
         <td width="30%" class="align-middle" align="left">
          <input type="submit" name="upload" class="btn btn-primary" value="Uploadovať">
         </td>
        </tr>
        <tr>
         <td width="40%" align="right"></td>
         <td width="30"><span class="text-muted"></span></td>
         <td width="30%" align="left"></td>
        </tr>
       </table>
      </div>
     </form>

     <div class="row ml-0 mr-0">
       <div class="card w-100 mb-5">
         <div class="card-body p-0">
           <div class="col-md-12">
             <h4 class="uppercase text-uppercase font-weight-bold text-center p-3">Faktúry</h4>
           </div>
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Dátum</th>
              <th scope="col">Číslo</th>
              <th scope="col">Predmet</th>
              <th scope="col">Suma</th>
              <th scope="col">Dodávateľ</th>
              <th scope="col">IČO</th>
              <th scope="col">Adresa</th>
            </tr>
          </thead>

          <tbody>
            @foreach($data as $row)
            <tr>
              <tr scope="row"></tr>
              <td class="font-weight-bold">{{ $row->id }}</td>
              <td>
                @if ($row->datum != null)
                {{ $row->datum }}
                @else
                ---
                @endif
              </td>
              <td>
                @if ($row->cislo != null)
                {{ $row->cislo }}
                @else
                ---
                @endif
              </td>
              <td>
                <a href="/import_excel/{{ $row->cislo }}">
                  @if ($row->predmet != null)
                  {{ $row->predmet }}
                  @else
                  ---
                  @endif
                </a>
              </td>
              <td>
                @if ($row->suma != null)
                {{ $row->suma }}
                @else
                ---
                @endif
              </td>
              <td>
                @if ($row->dodavatel != null)
                {{ $row->dodavatel }}
                @else
                ---
                @endif
              </td>
              <td>
                @if ($row->ico != null)
                {{ $row->ico }}
                @else
                ---
                @endif
              </td>
              <td>
                @if ($row->adresa != null)
                {{ $row->adresa }}
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
</body>
</html>
