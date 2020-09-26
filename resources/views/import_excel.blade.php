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
  <div class="container pt-3 pb-3">
    <h3 align="center"> Import Excel File on upload. Formats: .xlsx, .xls</h3>
    <br />
     @if(count($errors) > 0)
      <div class="alert alert-danger">
       Upload Validation Error<br><br>
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

     <form method="post" enctype="multipart/form-data" action="{{ url('/import_excel/import') }}">
      {{ csrf_field() }}
      <div class="form-group">
       <table class="table">
        <tr>
         <td width="40%" class="align-middle" align="right"><span>Select File for Uploadd</span></td>
         <td width="30" class="align-middle">
          <input type="file" name="select_file" />
         </td>
         <td width="30%" align="left">
          <input type="submit" name="upload" class="btn btn-primary" value="Upload">
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
          {{ $data->links() }}
       </div>
      </div>
     </div>
    </div>
  </div>
</body>
</html>
