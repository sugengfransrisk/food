function add_cart(idMenu){
  //$( "#btnPesan" ).click(function() {
        // let jumlahPesan = $('#jumlahPesan').val();
        //var ambilVal = $(this).attr('data-isi');
        //$("#idedit").val(ambilVal);

        //let idMenu = $('#idMenu').val();
        //$('#btnPesan').hide();
       // $('#btn').append(button);
        alert(idMenu);
        $.ajax({
          url:'mod/controller.php',
          type:'post',
          dataType:'json',
          data:{idPesanan: idMenu},
        });
        alert('Pesanan Telah Terkirim Ke Keranjang');

       // $("#cart").empty(data);
        //$("#cart").append(data);

      
}
function cart(){
// let data='';
// data = '<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">'+
//       '<div class="modal-dialog" role="document">'+
//         '<div class="modal-content">'+
//           '<div class="modal-header">'+
//             '<h2 class="modal-title" id="exampleModalLongTitle">Pesanan Anda</h2>'+
//           '</div>'+
//           '<div class="modal-body" id="popup">'+
//           '</div>'+
//           '<div class="modal-footer">'+
//             '<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>'+
//             '<button type="button" id="btnBatalPesanan" class="btn btn-danger">Batalkan Pemesanan</button>'+
//           '</div>'+
//         '</div>'+
//       '</div>'+
//     '</div>'
//     ;
   // $('#view').empty(data);
   // $('#view').append(data);

    $('#viewPesanan').click(function(){
      let popup = ''
      $.ajax({
        url:'mod/controller.php',
        type:'post',
        dataType:'json',
        data:{act:"ambilPesanan"},
        success :function (val) {
          if(val.length > 0){
            for (var i = 0; i < val.length; i++) {
              // popup = nilai[i].pemilik;
              popup +=
                '<div class="panel panel-default">'+
                  '<div class="panel-heading">'+
                  '<h2> '+val[i].menu+'</h2>'+
                  '<h2>Rp '+val[i].harga+'</h2>'+
                '</div>'+
                '</div>';
            }
          }else{
            popup +=
              '<div class="panel panel-default">'+
                '<div class="panel-heading">'+
                '<h2>Anda Belum Memesan</h2>'+
              '</div>'+
              '</div>';
          }
          //$('#popup').empty(popup);
          $('#popup').append(popup);
        },
        error : function(){
          alert('Proses Gagal');
        },
      });
    });

    $('#btnBatalPesanan').click(function(){

      $.ajax({
        url:'route.php',
        type:'post',
        dataType:'json',
        data:{action:"batalPesanan"},
      });
      alert('Pesanan Dibatalkan');
      location.reload();
    });

}
function showResult() {
    obj = { "table":"str", "limit":20 };
dbParam = JSON.stringify(obj);
xmlhttp = new XMLHttpRequest();
var slc= document.getElementById("slc").value;
var str= document.getElementById("str").value;
let txt = "";
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        myObj = JSON.parse(this.responseText);
        //txt += "<section class='container-fluid'>";
       if (Object.keys(myObj).length === 0)  {
        txt += "<h3><a>Tidak Ada data </a></h3>"

       }else{
       txt += "<div class='row text-center'>"
            for (x in myObj) {
                txt += " <div class='col-lg-3 col-md-3 mb-3'>";
                txt += "<div class='card'>"
         
            txt += " <img class='card-img-top' src='mod/uploads/"+myObj[x].pict+"' >";
            txt += " <div class='card-body'>"
            txt += " <h3><a>" + myObj[x].toko + "</a></h3>";
            txt +=" <h4>"+ myObj[x].jarak + " Km</h4>"

            for (var i = myObj[x].rating - 1; i >= 0; i--) {
                txt += "<img style='width: 30px;'  src='assets/images/star.png' />"
            }
           
          
            txt += " </div><div class='card-footer'><a value='"+myObj[x].id+"' onclick='menu('this.value')' class='btn btn-primary'>Lihat</a> </div></div></div>"
            }
        }
       // txt += "</section>"
        document.getElementById("data").innerHTML = txt;
    }
}
  xmlhttp.open("GET","mod/controller.php?act=search&cari="+str+"&sel="+slc,true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xmlhttp.send("x=" + dbParam); 
}
function menu(str) {
    obj = { "table":"str", "limit":20 };
dbParam = JSON.stringify(obj);
xmlhttp = new XMLHttpRequest();
let txt = "";
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        myObj = JSON.parse(this.responseText);
        //txt += "<section class='container-fluid'>";
         txt +="<button class='btn btn-primary' onclick='index()'><-BACK</button>"
          txt += " <h3><a>Menu </a></h3>";
       txt += "<div class='row text-center'>"
      
            for (x in myObj) {
                txt += " <div class='col-lg-3 col-md-3 mb-3'>";
                txt += "<div class='card'>"
         
            txt += " <img class='card-img-top' src='mod/uploads/"+myObj[x].pict+"' >";
            txt += " <div class='card-body'>"
            txt += " <h3><a>" + myObj[x].menu + "</a></h3>";
            txt +=" <h4>"+ myObj[x].deskripsi + " </h4>"
            txt +=" <h3>Rp."+ myObj[x].harga + " </h4>"
            txt +='<input type="hidden" class="input-text" id="idMenu" value="'+myObj[x].id_menu+'">'

           
          
            txt += " </div><div class='card-footer'><a onclick='add_cart("+myObj[x].id_menu+");' id='btnPesan' class='btn btn-primary'>Pesan</a> </div></div></div>"
            }
       // txt += "</section>"
        document.getElementById("data").innerHTML = txt;
         document.getElementById("slc").style.display = 'none';
          document.getElementById("str").style.display = 'none';
    }
}
  xmlhttp.open("GET","mod/controller.php?act=menu&id="+str,true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xmlhttp.send("x=" + dbParam); 
}
function index() {
   

obj = { "table":"toko", "limit":20 };
dbParam = JSON.stringify(obj);
let txt = "";
xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        myObj = JSON.parse(this.responseText);
        
        txt += "<div class='row text-center'>"
            for (x in myObj) {
                txt += " <div class='col-lg-3 col-md-3 mb-3'>";
                txt += "<div class='card'>"
         
            txt += " <img class='card-img-top' src='mod/uploads/"+myObj[x].pict+"' >";
            txt += " <div class='card-body'>"
            txt += " <h3><a>" + myObj[x].toko + "</a></h3>";
            txt +=" <h4>"+ myObj[x].jarak + " Km</h4>"

            for (var i = myObj[x].rating - 1; i >= 0; i--) {
                txt += "<img style='width: 30px;'  src='assets/images/star.png' />"
            }
           
          
           txt += " </div><div class='card-footer'><a  onclick='menu("+myObj[x].id+")' class='btn btn-primary'>Pesan</a> </div></div></div>"
            }
        document.getElementById("data").innerHTML = txt;
         document.getElementById("slc").style.display = 'block';
          document.getElementById("str").style.display = 'block';
    }
}
xmlhttp.open("POST", "mod/controller.php?act=search&cari=&sel=all",true);
xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xmlhttp.send("x=" + dbParam);
}
$(document).on("submit","#formTambahWarung",function(e){
  e.preventDefault();
  var form_data = new FormData(this);
  //const swal = require('sweetalert2');

  // console.log(form_data);
  for (var value of form_data.values()) {
     console.log(value);
  }

  $.ajax({
    url:'mod/controller.php',
     type:'POST',
    dataType:'json',
    cache: false,
    contentType: false,
    processData: false,
    data:form_data,
    success :function (nilai) {
      if (nilai.status = "ok") {
        index();
       swal(
  'Selamat!',
  'Data Berhasil Ditambah',
  'success'
)
      }else{
       swal({
  type: 'error',
  title: 'Oops...',
  text: 'Something went wrong!',
  footer: '<a href>Why do I have this issue?</a>',
})
      }
    },
    error : function(){
      alert('Proses Gagal');
    },
  });

  return false;
});