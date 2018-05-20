<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Heroic Features - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/heroic-features.css" rel="stylesheet">

  </head>

  <body onload="index()">

   

    <!-- Page Content -->
    <div class="container">

       <input id="str" class="form-control" type="text
    " onkeyup="showResult()" >
    <select id="slc" class="form-control" onchange="showResult()">
        <option value="jarak">Terdekat</option>
        <option value="date_create">Terbaru</option>
        <option value="rating">Terlaris</option>
        <option value="all" selected="">Semua</option>

    </select>
                <div id="data">
     

      <!-- /.row -->

    </div>
    <!-- /.container -->

   

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>


   
 



<script>
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
         
            txt += " <img class='card-img-top' src='assets/images/"+myObj[x].pict+"' >";
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
         
            txt += " <img class='card-img-top' src='assets/images/"+myObj[x].pict+"' >";
            txt += " <div class='card-body'>"
            txt += " <h3><a>" + myObj[x].menu + "</a></h3>";
            txt +=" <h4>"+ myObj[x].deskripsi + " </h4>"
            txt +=" <h3>Rp."+ myObj[x].harga + " </h4>"

           
          
            txt += " </div><div class='card-footer'><a value='"+myObj[x].id+"' onclick='menu('this.value')' class='btn btn-primary'>Pesan</a> </div></div></div>"
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
         
            txt += " <img class='card-img-top' src='assets/images/"+myObj[x].pict+"' >";
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
</script>
