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
  <div class="detail-header navbar header-height pr-5 pl-5">
    <i class="far fa-arrow-alt-circle-left" id="arrow_back"></i>
    <a href="/import_excel" class="float-right">
      <i class="fas fa-home"></i>
    </a>
  </div>
  <div class="pt-5 pr-5 pb-5 pl-5">
    @foreach($data3 as $row)
    <!-- Breadcrumb -->
      <span id="breadcrumb" class="p-2 mb-3">
        <span class="breadcrumb-item"><a href="/import_excel">import_excel</a></span>
        <span class="breadcrumb-item"><a href="/import_excel/detail/{{ $row->cislo }}">detail</a></span>
        <span class="breadcrumb-item"><a href="/import_excel/detail/{{ $row->cislo }}">{{ $row->cislo }}</a></span>
        <span class="breadcrumb-item active">Subjekty</span>
        <span class="breadcrumb-item active" aria-current="page">{{ $row->ico }}</span>
      </span>
    <!-- /Breadcrumb -->
    @endforeach

    @foreach($data2 as $row)
    <div class="row ml-0 mr-0">
      <div class="card w-100 mb-5">
        <div class="card-body p-0">
          <div class="d-flex flex-column align-items-center text-center">
            <a href="{{url()->current()}}/detail_subjektu"><i class="fas fa-info-circle"></i></a>
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
      <div class="card w-100">
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
                <a href="/import_excel/detail/{{ $row->cislo }}">
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
