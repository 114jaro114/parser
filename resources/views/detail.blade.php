<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
      <div class="app align-middle m-5">
        <div class="detail-header header-height mb-5">
          <a href="/import_excel">
            <i class="far fa-arrow-alt-circle-left"></i>
          </a>
        </div>

        <div class="detail-body flex-center position-ref body-height text-center">
          <div class="row gutters-sm ml-0 mr-0">
            <div class="col-md-4 mb-3">
              <div class="row">
                <div class="card mb-3">
                  <div class="card-body p-0">
                    <div class="d-flex flex-column align-items-center text-center">
                      <div class="row mt-3">
                        <div class="col-md-12">
                          <h4 class="card-border-bottom uppercase text-uppercase font-weight-bold">Obstarávateľ</h4>
                        </div>
                        <div class="col-md-12">
                          <p class="text-secondary mb-1 text-uppercase">Názov</p>
                        </div>
                        <div class="col-md-12 pb-2">
                          <span>Univerzita Pavla Jozefa Šafárika v Košiciach</span>
                        </div>

                        <div class="col-md-12">
                          <p class="text-secondary mb-1 text-uppercase">IČO</p>
                        </div>
                        <div class="col-md-12 pb-2">
                          <span>00397768</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              @foreach($data as $row)
              <div class="row">
                <div class="card">
                  <div class="card-body p-0">
                    <div class="d-flex flex-column align-items-center text-center">
                      <div class="row mt-3">
                        <div class="col-md-12">
                          <h4 class="card-border-bottom text-uppercase font-weight-bold">Zmluvný partner</h4>
                        </div>
                        <div class="col-md-12">
                          <p class="text-secondary mb-1 text-uppercase">Názov</p>
                        </div>
                        <div class="col-md-12 pb-2">
                          <a href="/subjekty/{{ $row->ico }}">
                            @if ($row->dodavatel != null)
                            <span>{{ $row->dodavatel }}</span>
                            @else
                            <span>---</span>
                            @endif
                          </a>
                        </div>

                        <div class="col-md-12">
                          <p class="text-secondary mb-1 text-uppercase">IČO</p>
                        </div>
                        <div class="col-md-12 pb-2">
                          <a href="/subjekty/{{ $row->ico }}">
                            @if ($row->ico != null)
                            <span>{{ $row->ico }}</span>
                            @else
                            <span>---</span>
                            @endif
                          </a>
                        </div>

                        <div class="col-md-12">
                          <p class="text-secondary mb-1 text-uppercase">Adresa</p>
                        </div>
                        <div class="col-md-12 pb-2">
                          @if ($row->adresa != null)
                          <span>{{ $row->adresa }}</span>
                          @else
                          <span>---</span>
                          @endif
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-8 mb-3">
              <div class="card mb-3">
                <div class="card-body p-0">
                  <div class="row">
                    <div class="col-md-12 mt-3">
                       <h4 class="card-border-bottom text-uppercase font-weight-bold">Informácie o faktúre</h4>
                    </div>
                    <div class="col-md-12">
                      <p class="text-secondary mb-1 text-uppercase">Číslo faktúry</p>
                    </div>
                    <div class="col-md-12 pb-2">
                      @if ($row->cislo != null)
                      <span>{{ $row->cislo }}</span>
                      @else
                      <span>---</span>
                      @endif
                    </div>

                    <div class="col-md-12">
                      <p class="text-secondary mb-1 text-uppercase">Popis fakturovaného plnenia</p>
                    </div>
                    <div class="col-md-12 pb-2">
                      @if ($row->predmet != null)
                      <span>{{ $row->predmet }}</span>
                      @else
                      <span>---</span>
                      @endif
                    </div>

                    <div class="col-md-12">
                      <p class="text-secondary mb-1 text-uppercase">Dátum doručenia</p>
                    </div>
                    <div class="col-md-12 pb-2">
                      @if ($row->datum != null)
                      <span>{{ $row->datum }}</span>
                      @else
                      <span>---</span>
                      @endif
                    </div>

                    <div class="col-md-12">
                      <p class="text-secondary mb-1 text-uppercase">Celková hodnota</p>
                    </div>
                    <div class="col-md-12 pb-2">
                      @if ($row->suma != null)
                      <span>{{ $row->suma }} €</span>
                      @else
                      <span>---</span>
                      @endif
                    </div>

                    <div class="col-md-12">
                      <p class="text-secondary mb-1 text-uppercase">Identifikácia zmluvy</p>
                    </div>
                    <div class="col-md-12 pb-2">
                      @if ($row->identifikacia_zmluvy != null)
                      <span>{{ $row->identifikacia_zmluvy }}</span>
                      @else
                      <span>---</span>
                      @endif
                    </div>

                    <div class="col-md-12">
                      <p class="text-secondary mb-1 text-uppercase">Identifikácia objednávky</p>
                    </div>
                    <div class="col-md-12 pb-2">
                      @if ($row->identifikacia_objednavky != null)
                      <span>{{ $row->identifikacia_objednavky }}</span>
                      @else
                      <span>---</span>
                      @endif
                    </div>

                    <div class="col-md-12">
                      <p class="text-secondary mb-1 text-uppercase">Dátum zverejnenia</p>
                    </div>
                    <div class="col-md-12 pb-2">
                      @if ($row->datum_zverejnenia != null)
                      <span>{{ $row->datum_zverejnenia }}</span>
                      @else
                      <span>---</span>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
        </div>

        <!-- <div class="footer p-4">
          <footer-body></footer-body>
        </div> -->
      </div>
    </body>
</html>
