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
      <div class="detail-header navbar header-height pr-5 pl-5">
        <i class="far fa-arrow-alt-circle-left" id="arrow_back"></i>
        <a href="/import_excel" class="float-right">
          <i class="fas fa-home"></i>
        </a>
      </div>

      <div class="pt-5 pr-5 pb-5 pl-5">
        @foreach($data as $row)
        <!-- Breadcrumb -->
          <span id="breadcrumb" class="p-2 mb-3">
            <span class="breadcrumb-item"><a href="/import_excel">import_excel</a></span>
            <span class="breadcrumb-item"><a href="/import_excel/detail/{{ $row->cislo }}">detail</a></span>
            <span class="breadcrumb-item"><a href="/import_excel/detail/{{ $row->cislo }}">{{ $row->cislo }}</a></span>
            <span class="breadcrumb-item"><a href="/import_excel/detail/{{ $row->cislo }}/subjekty/{{ $row->ico }}">Subjekty</a></span>
            <span class="breadcrumb-item"><a href="/import_excel/detail/{{ $row->cislo }}/subjekty/{{ $row->ico }}">{{ $subjects }}</a></span>
            <span class="breadcrumb-item active" aria-current="page">detail_subjektu</span>
          </span>
        <!-- /Breadcrumb -->
        @endforeach
        <div class="row ml-0 mr-0 mb-3">
          <div class="card w-100">
            <div class="card-body p-0">
              <div class="d-flex flex-column align-items-center text-center">
                <table class="table">
                  <tr>
                    <th class="border-top-0 text-uppercase">Dátum aktualizácie dát</th>
                    <th class="border-top-0 text-uppercase">Dátum výpisu dát</th>
                  </tr>
                  <tr>
                    <td>{{ $out['datum_aktualizacie'] }}</td>
                    <td>{{ $out['datum_vypisu'] }}</td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-6">
            <div class="card w-100">
              <div class="card-body p-0">
                <div class="d-flex flex-column align-items-center text-center">
                  <table class="table">
                    <tr>
                      <span class="text-center font-weight-bold text-uppercase" style="padding: 0.75rem">Adresa</span>
                    </tr>
                    <tr>
                      <th>Ulica</th>
                      <th>Číslo</th>
                      <th>Mesto</th>
                      <th>ZIP</th>
                    </tr>
                    <tr>
                      <td>{{ $out['adresa']['street'] }}</td>
                      <td>{{ $out['adresa']['number'] }}</td>
                      <td>{{ $out['adresa']['city'] }}</td>
                      <td>{{ $out['adresa']['zip'] }}</td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card w-100">
              <div class="card-body p-0">
                <div class="d-flex flex-column align-items-center text-center">
                  <table class="table">
                    <tr>
                      <th class="border-top-0">Hlavička</th>
                      <th class="border-top-0">Hlavička krátka</th>
                    </tr>
                    <tr>
                      <td>{{ $out['hlavicka'] }}</td>
                      <td>{{ $out['hlavicka_kratka'] }}</td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-6">
            <div class="card w-100">
              <div class="card-body p-0">
                <div class="d-flex flex-column align-items-center text-center">
                  <table class="table">
                    <tr>
                      <th class="border-top-0">Príslušný súd</th>
                      <th class="border-top-0">Oddiel</th>
                      <th class="border-top-0">Vložka</th>
                      <th class="border-top-0">Typ osoby</th>
                      <th class="border-top-0">Obchodné meno</th>
                      <th class="border-top-0">Likvidácia</th>
                    </tr>
                    <tr>
                      <td>{{ $out['prislusny_sud'] }}</td>
                      <td>{{ $out['oddiel'] }}</td>
                      <td>{{ $out['vlozka'] }}</td>
                      <td>{{ $out['typ_osoby'] }}</td>
                      <td>{{ $out['obchodne_meno'] }}</td>
                      <td>{{ $out['likvidacia'] }}</td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card w-100">
              <div class="card-body p-0">
                <div class="d-flex flex-column align-items-center text-center">
                  <table class="table">
                    <tr>
                      <th class="border-top-0">IČO</th>
                      <th class="border-top-0">Deň zápisu</th>
                      <th class="border-top-0">Právna forma</th>
                    </tr>
                    <tr>
                      <td>{{ $out['ico'] }}</td>
                      <td>{{ $out['den_zapisu'] }}</td>
                      <td>{{ $out['pravna_forma'] }}</td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

        @if(empty($out['predmet_cinnosti']))
        @else
          <div class="row ml-0 mr-0">
            <div class="card w-100">
              <div class="card-body p-0">
                <div class="d-flex flex-column align-items-center text-center">
                  <table class="table">
                    <tr>
                      <th class="border-top-0 text-uppercase">Predmety činnosti</th>
                    </tr>
                      @foreach($out['predmet_cinnosti'] as $row)
                      <tr>
                        <td class="text-center">{{ $row }}</td>
                      </tr>
                      @endforeach
                  </table>
                </div>
              </div>
            </div>
          </div>
        @endif

        @if(empty($out['spolocnici']) and empty($out['vyska_vkladu']))
        @else
          <div class="row ml-0 mr-0">
            @if(empty($out['spolocnici']))
            @else
            <div class="col-md-7 mt-3 pl-0">
              <div class="card w-100">
                <div class="card-body p-0">
                  <div class="d-flex flex-column align-items-center text-center">
                    <table class="table">
                      <tr>
                        <th class="border-top-0 text-uppercase">Spoločníci</th>
                      </tr>
                        @foreach($out['spolocnici'] as $row)
                        <tr>
                          <td>{{ $row }}</td>
                        </tr>
                        @endforeach
                    </table>
                  </div>
                </div>
              </div>
            </div>
            @endif

            @if(empty($out['vyska_vkladu']))
            @else
              <div class="col-md-5 mt-3 pr-0">
                <div class="card w-100">
                  <div class="card-body p-0">
                    <div class="d-flex flex-column align-items-center text-center">
                      <table class="table">
                        <tr>
                          <th class="border-top-0 text-uppercase">Výška vkladu</th>
                        </tr>
                          @foreach($out['vyska_vkladu'] as $row)
                          <tr>
                            <td>{{ $row }}</td>
                          </tr>
                          @endforeach
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            @endif
          </div>
        @endif

        @if(empty($out['statutarny_organ']['konatelia']))
        @else
          <div class="row ml-0 mr-0 mt-3">
            <div class="card w-100">
              <div class="card-body p-0">
                <div class="d-flex flex-column align-items-center text-center">
                  <table class="table">
                    <tr>
                      <span class="text-center font-weight-bold text-uppercase" style="padding: 0.75rem">Štatutárny orgán - konatel/ia</span>
                    </tr>
                    <tr>
                      <th>Meno</th>
                      <th>Ulica</th>
                      <th>Mesto</th>
                      <th>Číslo</th>
                      <th>ZIP</th>
                      <th>Od</th>
                    </tr>
                    @foreach($out['statutarny_organ']['konatelia'] as $row)
                        <tr>
                          <td>{{ $row['name'] }}</td>
                          <td>{{ $row['street'] }}</td>
                          <td>{{ $row['city'] }}</td>
                          <td>{{ $row['number'] }}</td>
                          <td>{{ $row['zip'] }}</td>
                          <td>{{ $row['since'] }}</td>
                        </tr>
                      @endforeach
                  </table>
                </div>
              </div>
            </div>
          </div>
        @endif

        @if(empty($out['statutarny_organ']['predstavenstvo']))
        @else
          <div class="row ml-0 mr-0 mt-3">
            <div class="card w-100">
              <div class="card-body p-0">
                <div class="d-flex flex-column align-items-center text-center">
                  <table class="table">
                    <tr>
                      <span class="text-center font-weight-bold text-uppercase" style="padding: 0.75rem">Štatutárny orgán - predstavenstvo</span>
                    </tr>
                    <tr>
                      <th>Meno</th>
                      <th>Ulica</th>
                      <th>Mesto</th>
                      <th>Krajina</th>
                      <th>Funkcia</th>
                      <th>Číslo</th>
                      <th>ZIP</th>
                      <th>Od</th>
                    </tr>
                    @foreach($out['statutarny_organ']['predstavenstvo'] as $row)
                        <tr>
                          <td>{{ $row['name'] }}</td>
                          <td>{{ $row['street'] }}</td>
                          <td>{{ $row['city'] }}</td>
                          @if(empty($row['country']))
                          <td>---</td>
                          @else
                          <td>{{ $row['country'] }}</td>
                          @endif
                          <td>{{ $row['function'] }}</td>
                          <td>{{ $row['number'] }}</td>
                          <td>{{ $row['zip'] }}</td>
                          <td>{{ $row['since'] }}</td>
                        </tr>
                      @endforeach
                  </table>
                </div>
              </div>
            </div>
          </div>
        @endif

        @if(empty($out['akcie']))
        @else
          <div class="row ml-0 mr-0 mt-3">
            <div class="card w-100">
              <div class="card-body p-0">
                <div class="d-flex flex-column align-items-center text-center">
                  <table class="table">
                    <tr>
                      <span class="text-center font-weight-bold text-uppercase" style="padding: 0.75rem">Akcie</span>
                    </tr>
                    <tr>
                      <th>Pocet</th>
                      <th>Druh</th>
                      <th>Podoba</th>
                      <th>Forma</th>
                      <th>Menovitá hodnota</th>
                    </tr>
                    @foreach($out['akcie'] as $row)
                        <tr>
                          <td>{{ $row['pocet'] }}</td>
                          <td>{{ $row['druh'] }}</td>
                          <td>{{ $row['podoba'] }}</td>
                          <td>{{ $row['forma'] }}</td>
                          <td>{{ $row['menovita_hodnota'] }}</td>
                        </tr>
                      @endforeach
                  </table>
                </div>
              </div>
            </div>
          </div>
        @endif

        <div class="row ml-0 mr-0 mt-3">
          @if(empty($out['konanie_menom_spolocnosti']))
          @else
            <div class="col-md-8 pl-0">
              <div class="card w-100">
                <div class="card-body p-0">
                  <div class="d-flex flex-column align-items-center text-center">
                    <table class="table">
                      <tr>
                        <th class="border-top-0 text-uppercase">Konanie menom spoločnosti</th>
                      </tr>
                      <tr>
                        <td>{{ $out['konanie_menom_spolocnosti'] }}</td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          @endif

          @if(empty($out['zakladne_imanie']))
          @else
            <div class="col-md-4 pr-0">
              <div class="card w-100">
                <div class="card-body p-0">
                  <div class="d-flex flex-column align-items-center text-center">
                    <table class="table">
                      <tr>
                        <th class="border-top-0 text-uppercase">Základné imanie</th>
                      </tr>
                      <tr>
                        <td>{{ $out['zakladne_imanie'] }}</td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          @endif
        </div>

        @if(empty($out['dozorna_rada']))
        @else
          <div class="row ml-0 mr-0 mt-3">
            <div class="card w-100">
              <div class="card-body p-0">
                <div class="d-flex flex-column align-items-center text-center">
                  <table class="table">
                    <tr>
                      <span class="text-center font-weight-bold text-uppercase" style="padding: 0.75rem">Dozorná rada</span>
                    </tr>
                    <tr>
                      <th>Meno</th>
                      <th>Ulica</th>
                      <th>Mesto</th>
                      <th>Od</th>
                      <th>Krajina</th>
                      <th>Funkcia</th>
                      <th>Číslo</th>
                      <th>ZIP</th>
                    </tr>
                    @foreach($out['dozorna_rada'] as $row)
                      <tr>
                        <td>{{ $row['name'] }}</td>
                        <td>{{ $row['street'] }}</td>
                        <td>{{ $row['city'] }}</td>
                        <td>{{ $row['since'] }}</td>
                        <td>{{ $row['country'] }}</td>
                        <td>{{ $row['function'] }}</td>
                        <td>{{ $row['number'] }}</td>
                        <td>{{ $row['zip'] }}</td>
                      </tr>
                    @endforeach
                  </table>
                </div>
              </div>
            </div>
          </div>
        @endif

        @if(empty($out['dalsie_skutocnosti']))
        @else
          <div class="row ml-0 mr-0 mt-3">
            <div class="card w-100">
              <div class="card-body p-0">
                <div class="d-flex flex-column align-items-center text-center">
                  <table class="table">
                    <tr>
                      <th class="border-top-0 text-uppercase">Ďalšie skutočnosti</span>
                    </tr>
                    @if(is_array($out['dalsie_skutocnosti']))
                      @foreach($out['dalsie_skutocnosti'] as $row)
                        <tr>
                          <td>{{ $row }}</td>
                        </tr>
                      @endforeach
                    @else
                    <tr>
                      <td>{{ $out['dalsie_skutocnosti'] }}</td>
                    </tr>
                    @endif
                  </table>
                </div>
              </div>
            </div>
          </div>
        @endif
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
