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
    <div class="detail-header header-height mb-5">
      <a href="/import_excel">
        <i class="far fa-arrow-alt-circle-left"></i>
      </a>
    </div>
    @foreach($data2 as $row)
    <div class="row ml-0 mr-0">
      <div class="card w-100 mb-5">
        <div class="card-body p-0">
          <div class="d-flex flex-column align-items-center text-center">
            <div class="row mt-3">
              <div class="col-md-12 pb-2">
                @if ($row->dodavatel != null)
                <h1 class="font-weight-bold">{{ $row->dodavatel }}</h1>
                @else
                <span>---</span>
                @endif
              </div>

              <div class="col-md-12">
                <h1 class="text-secondary mb-1 text-uppercase">IČO</h1>
              </div>
              <div class="col-md-12 pb-2">
                @if ($row->ico != null)
                <h2>{{ $row->ico }}</h2>
                @else
                <span>---</span>
                @endif
              </div>

              <div class="col-md-12">
                <h1 class="text-secondary mb-1 text-uppercase">Adresa</h1>
              </div>
              <div class="col-md-12 pb-2">
                @if ($row->adresa != null)
                <h2>{{ $row->adresa }}</h2>
                @else
                <span>---</span>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach
    <div class="row ml-0 mr-0">
      <div class="card w-100 mb-5">
        <div class="card-body p-0">
          <div class="col-md-12">
            <h4 class="uppercase text-uppercase font-weight-bold text-center p-3">Súvisiace dokumenty</h4>
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
        <div class="text-center pt-3 mb-4">
          {{ $data->Links() }}
        </div>
      </div>
    </div>
  </div>
</body>
</html>
