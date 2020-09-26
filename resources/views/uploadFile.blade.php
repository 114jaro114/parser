<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Import Excel</title>
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
      <div class="welcome-header p-3 header-height mb-3">
      </div>

      <div class="welcome-body p-3 flex-center position-ref body-height">
        <form action="{{ url('/import') }}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}

          @if(session('errors'))
            foreach ($errors as $error)
              <li>{{ $error }}</li>
            endforeach
          @endif
          @if(session('success'))
            {{ session('úspech') }}
          @endif

          <span class="mb-3">Vyber xml subor na upload</span>


            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg mb-3">
                <div class="grid grid-cols-1 md:grid-cols-2">
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="file">
                      <label class="custom-file-label" for="file">Choose file</label>
                    </div>
                  </div>
                </div>
            </div>
            <button type="button" name="button" class="btn btn-primary">Odoslať</button>
            <a href="{{ url('/xmp_data/faktury.xlsx') }}">Stiahnuť faktury</a>
            <a href="{{ url('/xmp_data/objednavky.xlsx') }}">Stiahnuť objednávky</a>
        </form>
      </div>

      <div class="footer p-4">
        <footer-body></footer-body>
      </div>
    </body>
</html>
