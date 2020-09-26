<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
      <div class="welcome-header p-3 header-height mb-3">
        <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
            <img src="./img/upjs_logo.jpg" alt="" style="width: 150px">
        </div>
      </div>

      <div class="welcome-body p-3 flex-center position-ref body-height">
        <a href="/import_excel">
          <button type="button" name="button" class="btn btn-primary">Import File</button>
        </a>

      </div>

      <div class="footer p-4">
        <footer-body></footer-body>
      </div>
    </body>
</html>
