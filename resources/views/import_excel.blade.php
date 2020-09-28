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
    <h3 align="center"> Importovanie excel súboru na upload. Formáty: .xlsx, .xls, .csv</h3>
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

     <div class="panel panel-default">
      <div class="panel-heading">
       <h3 class="panel-title text-center">Faktúry</h3>
      </div>
      <div class="panel-body">
       <div class="table-responsive">
         <div class="table-responsive">
          <table class="table table-bordered table-striped">
           <tr>
            <th>ID</th>
            <th>Dátum</th>
            <th>Číslo</th>
            <th>Predmet</th>
            <th>Suma</th>
            <th>Dodávateľ</th>
            <th>IČO</th>
            <th>Adresa</th>
           </tr>
           @foreach($data as $row)
           <tr>
            <td>{{ $row->id }}</td>
            <td>{{ $row->datum }}</td>
            <td>{{ $row->cislo }}</td>
            <td>{{ $row->predmet }}</td>
            <td>{{ $row->suma }}</td>
            <td>{{ $row->dodavatel }}</td>
            <td>{{ $row->ico }}</td>
            <td>{{ $row->adresa }}</td>
           </tr>
           @endforeach
          </table>
       </div>
      </div>
     </div>
     <div class="text-center pt-3">
       {{ $data->Links() }}
     </div>
    </div>
  </div>
</body>
</html>
