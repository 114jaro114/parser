<!DOCTYPE html>
<html>
<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <!-- <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> -->
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
  <div class="container">
    <div class="card mt-4">
      <div class="card-header">
           Nahratie súboru na upload. Formát: .xlsx, .xls
      </div>
      @if(count($errors) > 0)
        <div class="alert alert-danger m-3">
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
      <div class="card-body">
        <form method="post" enctype="multipart/form-data" action="{{ url('/import_excel/import') }}">
          {{ csrf_field() }}
          <div class="form-group">
           <table class="table">
            <tr>
             <td width="40%" align="right"><label>Vyber súbor na upload</label></td>
             <td width="30">
              <input type="file" name="select_file" />
             </td>
             <td width="30%" align="left">
              <input type="submit" name="upload" class="btn btn-primary" value="Upload">
             </td>
            </tr>
            <tr>
            </tr>
           </table>
          </div>
         </form>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="card mt-4">
       <div class="card-header">
          <h3 class="panel-title text-center">Faktúry</h3>
       </div>
      <div class="card-body">
       <!-- <div class="table-responsive">
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
        </table> -->
        <!-- {{ $data->links() }} -->
       </div>
      </div>
    </div>
  </div>
</body>
</html>
