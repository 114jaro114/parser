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

      <div class="pt-5 pr-5 pb-2 pl-5">
        <!-- Breadcrumb -->
          <span id="breadcrumb" class="p-2 mb-3">
            <span class="breadcrumb-item"><a href="/import_excel">import_excel</a></span>
            <span class="breadcrumb-item active">detail</span>
            <span class="breadcrumb-item active" aria-current="page">
                @foreach($data as $row)
                {{ $row->cislo }}
                @endforeach
            </span>
          </span>
        <!-- /Breadcrumb -->

        <div class="card w-100 mb-3">
          <div class="card-body p-3">
            <div class="row ml-0 mr-0">
              <div class="col-md-12 pl-0 pr-0 align-items-center text-center">
                <button class="uppercase text-uppercase font-weight-bold btn btn-primary w-100" data-toggle="collapse" href="#collapse_subject" role="button" aria-expanded="false" aria-controls="collapse_subject"><i class="fa fa-search"></i> Vyhľadávanie detailu zmluvného partnera</button>
              </div>
              <div class="col-md-12 collapse mt-3 collapse-border-top pt-3" id="collapse_subject">
                <div class="col-md-12" id="ico-search-error">
                 <div class="alert alert-danger">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  Neboli nájdené žiadne dáta zmluvného partnera na základe zadaného IČA
                 </div>
                </div>
                <div class="col-md-10">
                  <div class="form-group row">
                    <div class="col-3">
                      <span class="align-center">IČO (zadajte platné IČO - 8 číslic): </span>
                    </div>
                    <div class="col-8 pl-0 pr-0">
                      <input type="text" id="company_ico" class="form-control" placeholder="napr. 12345678" maxlength="8">
                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-3">
                      <span class="align-center">Názov spoločnosti: (zadajte aspoň 3 písmená): </span>
                    </div>
                    <div class="col-8 pl-0 pr-0">
                      <input type="text" id="byCompanyName" class="form-control ui-autocomplete-input" name="byCompanyName" maxlength="30" placeholder="napr. O2 Slovakia, s.r.o." autocomplete="off">
                    </div>
                  </div>

                  <div class="form-group">
                    <form autocomplete="off">
                    <div class="row">
                      <div class="col-md-3"></div>
                      <div class="col-md-8 pl-0 pr-0">
                        <button id="btn-search-by-company_ico" type="button" class="btn btn-primary btn-block"><i class="fa fa-search"></i> Hľadať</button>
                      </div>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- <div class="app align-middle m-5">
          <div class="detail-header header-height mb-5">
            <a href="/import_excel">
              <i class="far fa-arrow-alt-circle-left"></i>
            </a>
          </div>

          <div class="cms-blockquote col-md-10"> -->
          	<!-- <div class="form-group">

          		<label for="byIco">podľa IČO (zadajte platné IČO - 8 číslic):</label>
          				<input type="text" id="byIco" class="form-control" placeholder="napr. 12345678" maxlength="8">


          	</div>
          	<div class="form-group">

          		<label for="companyName">podľa názvu spoločnosti: (zadajte aspoň 3 písmená)</label>

          		<input type="text" id="byCompanyName" class="form-control ui-autocomplete-input" name="byCompanyName" maxlength="30" placeholder="napr. Kerametal" autocomplete="off">
          	</div>
          	<div class="form-group">

          		<label for="surname">podľa priezviska a mena:</label>
          		<a tabindex="-1" class="css_tooltip mx-1 float-right">
          			<i class="fa fa-info-circle fa-12x"></i>
          			<span style="left: -150px; top: -60px;">Vyhľadávanie v ORSR zohľadňuje diakritiku.</span>
          		</a>

          		<form autocomplete="off">
          		<div class="row">
          			<div class="col-md-4 pr-md-1">
          				<input type="text" id="lastname" class="form-control" placeholder="napr. Novák" maxlength="30">
          			</div>
          			<div class="col-md-4 px-md-1">
          				<input type="text" id="firstname" class="form-control" placeholder="napr. Ján" maxlength="20">
          			</div>
          			<div class="col-md-4 pl-md-1">
          				<button id="btn-search-by-lastname" type="button" class="btn u-btn-primary btn-block"><i class="fa fa-search"></i>  Hľadať</button>
          			</div>
          		</div>
          		</form>
          	</div> -->
            <!-- <input type="text" id="company_ico" maxlength="8" />
          </div> -->

          <!-- <div class="footer p-4">
            <footer-body></footer-body>
          </div> -->

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
                          @if ($row->dodavatel != null)
                            @if ($row->ico != null)
                            <a href="{{url()->current()}}/subjekty/{{ $row->ico }}">
                              <span>{{ $row->dodavatel }}</span>
                            </a>
                            @else
                              <span>{{ $row->dodavatel }}</span>
                            @endif
                          @else
                          <span>---</span>
                          @endif
                        </div>

                        <div class="col-md-12">
                          <p class="text-secondary mb-1 text-uppercase">IČO</p>
                        </div>
                        <div class="col-md-12 pb-2">
                          @if ($row->ico != null)
                          <a href="{{url()->current()}}/subjekty/{{ $row->ico }}">
                            <span>{{ $row->ico }}</span>
                          </a>
                          @else
                          <span>---</span>
                          @endif
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

            <div class="col-md-8 mb-3 pr-0">
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
