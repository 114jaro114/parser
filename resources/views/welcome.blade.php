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
      <div class="app align-middle pt-5 pb-5">
        <div class="welcome-header header-height mb-5">
          <div class="flex justify-center pt-8 sm:justify-start sm:pt-0 text-center vertical-align-center">
              <img src="./img/upjs_logo.jpg" alt="" style="width: 350px">
          </div>
        </div>

        <div class="welcome-body flex-center position-ref body-height text-center">
          <a href="/import_excel">
            <button type="button" name="button" class="btn btn-primary">go to the page with import</button>
          </a>
        </div>

        <div class="footer p-4">
          <footer-body></footer-body>
        </div>
      </div>
    </body>
</html>
