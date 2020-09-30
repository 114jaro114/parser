require('./bootstrap');

$( "#btn-search-by-company_ico" ).click(function() {
  var ico = $( "#company_ico" ).val();
  var meno = $( "#byCompanyName").val();
  var cesta = "/import_excel/detail/20191062802019/subjekty/" + ico + "/detail_subjektu";
  var cesta2 = "/import_excel/detail/20191062802019/subjekty/" + meno + "/detail_subjektu";
  var errors = 0;
  console.log(ico);
  console.log(meno);
  // if( ico -= '' && meno == '') {
  //   alert("zadajte meno alebo ico subjektu!")
  // } else {
    if(ico == '' && meno != ''){
      $.ajax({
    		url: cesta2,
    		data: {meno: meno},
    		success: function (response) {
          window.location.href = cesta2;
    		},
        error: function(XMLHttpRequest, textStatus, errorThrown) {
           document.getElementById("name_company-search-error").style.display = "block";
        }
    	})
    }

    if(ico != '' && meno == ''){
      $.ajax({
    		url: cesta,
    		data: {io: ico},
    		success: function (response) {
          window.location.href = cesta;
    		},
        error: function(XMLHttpRequest, textStatus, errorThrown) {
           document.getElementById("ico-search-error").style.display = "block";
        }
    	})
    }
  // }
});

$( "#arrow_back" ).click(function() {
  window.history.back()
  // console.log("Page location is " + window.location.href);
  // localStorage.setItem("way", window.location.href);
});

$(document).on('click', '.caret-icon', function() {
   $(this).toggleClass('fa-caret-up fa-caret-down');
})
