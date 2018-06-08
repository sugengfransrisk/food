<?php
session_start();
if ($_SESSION['logged_in']==true) {?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Heroic Features - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     <script src="pijat.js"></script>
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/heroic-features.css" rel="stylesheet">
    <!-- Custom styles for this template -->
   

  </head>
  <div class="container">

  <select onchange="index_pijat();" class="form-control">
    <option>FOOD</option>
    <option >Pijat++</option>
  
  </select>
  <button class="btn btn-primary" onclick="cart();" id="viewPesanan" data-toggle="modal" data-target="#exampleModalLong">Pesanan</button>
  <a href="logout.php" class="btn btn-danger">Log Out</a>
  <br><br><button class="btn btn-primary" id="add_warung" data-toggle="modal" data-target="#add-warung">Add warung</button> <button class="btn btn-primary" id="add_pijat" data-toggle="modal" data-target="#add-pijat">Add Pijats</button> <button class="btn btn-primary" id="add_menu" data-toggle="modal" data-target="#add-menu">Add Menue</button> <button class="btn btn-primary" id="add_service" data-toggle="modal" data-target="#add-service">Add Service Pijat</button></div>
    <div class="modal fade" id="add-warung" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h2 class="modal-title" id="exampleModalLongTitle">Add Warung</h2>
         </div>
          <div class="modal-body">
            <form class="form-horizontal" id="formTambahWarung" method="post"  enctype="multipart/form-data">
                <div class="form-group">
                  <label class="control-label col-sm-2" for="Nama">Toko:</label>
                  <div class="col-sm-10">
                    <input type="hidden" class="input-text" name="act" value="TambahWarung">
                    <input type="text" name="toko" class="form-control" id="toko" placeholder="Enter Toko">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="Nama">Deskripsi:</label>
                  <div class="col-sm-10">
                    
                    <textarea  name="deskripsi" class="form-control" id="deskripsi" placeholder="Enter Deskripsi"></textarea>
                  </div>
                </div>
                 <div class="form-group">
                  <label class="control-label col-sm-2" for="Nama">Jarak:</label>
                  <div class="col-sm-10">
                    <input type="hidden" class="input-text" name="act" value="TambahWarung">
                    <input type="text" name="jarak" class="form-control" id="Jarak" placeholder="Enter Jarak">
                  </div>
                </div>
               
                <div class="form-group">
                  <label class="control-label col-sm-2" for="Nama">Foto:</label>
                  <div class="col-sm-10">
                  <label>Foto warung  </label><br>
                    <img id="uploadPreview" width="200px" src="#" class="img-responsive img-thumbnail" alt="Preview Image">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="Nama">Thumbnail:</label>
                  <div class="col-sm-10">
                    <input type="file" name="foto" class="form-control" id="image" onchange="PreviewImage();" placeholder="Enter Nama">
                  </div>
                </div>
          
             
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-default" id="submitTambahWarung" >Kirim</button>
          </div>
           </form>
        </div>
      </div>
    </div>
  <div class="modal fade" id="add-pijat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h2 class="modal-title" id="exampleModalLongTitle">Add Service</h2>
         </div>
          <div class="modal-body">
            <form class="form-horizontal" id="formTambahPijat" method="post"  enctype="multipart/form-data">
                <div class="form-group">
                  <label class="control-label col-sm-2" for="Nama">Nama:</label>
                  <div class="col-sm-10">
                    <input type="hidden" class="input-text" name="act" value="TambahPijat">
                    <input type="text" name="nama" class="form-control" id="Nama" placeholder="Enter Nama">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="serv">Service:</label>
                  <div class="col-sm-10"> 
                   <select name="service" class="form-control" id="service">
                

                   </select>
                  </div>
                </div>
                <div class="form-group">
                   <label class="control-label col-sm-2" for="serv">Gender:</label>
                   <div class="col-sm-10"> 
                   <label class="radio-inline">
                  <input type="radio" value="P" name="gender">Perempuan
                </label>
                <label class="radio-inline">
                  <input type="radio" value="L" name="gender">Laki-Laki
                </label>
              </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="Nama">Foto:</label>
                  <div class="col-sm-10">
                  <label>Gambar ->  </label><br>
                    <img id="uploadPreview" width="200px" src="#" class="img-responsive img-thumbnail" alt="Preview Image">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="Nama">Foto:</label>
                  <div class="col-sm-10">
                    <input type="file" name="foto" class="form-control" id="image" onchange="PreviewImage();" placeholder="Enter Nama">
                  </div>
                </div>
          
             
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-default" id="submitTambahWarung" >Kirim</button>
          </div>
           </form>
        </div>
      </div>
    </div>
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h2 class="modal-title" id="exampleModalLongTitle">Pesanan Anda</h2>
         </div>
          <div class="modal-body" id="popup">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" id="btnBatalPesanan" class="btn btn-danger">Batalkan Pemesanan</button>
          </div>
        </div>
      </div>
    </div>
        <div id="psn-pjt-Modal" class="modal fade " tabindex="-1" role="dialog">
        <div class="modal-dialog modal-sm" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
               <h4 class="modal-title" id="judul" style="color: black">
                Waktu Pijat
              </h4>
            </div>
            <div class="modal-body">
              <form method="post" action="">
                <div style="padding: 0px 50px 20px 50px;">
                              <div class="form-group">
                                <label>Tanggal</label>
                                  <input type='date' id="tgl_pjt" class="form-control">
                                <label>Jam</label>
                                  <input type="time" id="jam_pjt" class="form-control">
                              </div>
                            </div>
                 <div class="text-center">
                  <input type="hidden" id="idpemijat">
                    <button id="btnpesanpjt" type="button" class="btn btn-primary">
                      YES
                    </button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                      NO
                    </button>            
                </div>
              </form>
            </div>
            <div class="modal-footer">
            </div>

          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div>
    <?php
    //print_r($_SESSION['idPesanan']);
    ?>
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
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  </body>

</html>


   
 

<script type="text/javascript">
  $('#btnpesanpjt').click(function(){
    

      var id_pemijat=$('#idpemijat').val();

      let tgl_pjt=$('#tgl_pjt').val();
      let jam_pjt=$('#jam_pjt').val();
      var waktu_pjt=tgl_pjt+' '+jam_pjt;

      var currentdate = new Date();

      var datetime = currentdate.getFullYear() + "-"+(currentdate.getMonth()+1) 
      + "-" + currentdate.getDate() + " " 
      + currentdate.getHours() + ":" 
      + currentdate.getMinutes() + ":" + currentdate.getSeconds();

      var diff = new Date(waktu_pjt) - new Date(datetime);
      diff_time = diff/(60*60*1000);

      if (diff_time < 0) {
        alert('Tidak bisa kembali kemasa lalu');
      }
      else{
          $.ajax({
            url: 'mod/pijat.php',
            type: 'GET',
            dataType: 'json',
            data: {act: 'cek_jam',id: id_pemijat,waktu: waktu_pjt},
          })
          .done(function(hsl) {
              if (hsl > 1) {
                    $.ajax({
                        url: 'mod/pijat.php',
                        type: 'POST',
                        dataType: 'json',
                        data: {act: 'pesan_pemijat',id: id_pemijat,waktu: waktu_pjt},
                      })
                      .done(function(hsl) {
                        swal(
                      'Selamat!',
                      'Pesanan Pijat anda berhasil',
                      'success'
                    )
                      })
                     
              }
              else{
                 swal(
                      'Ooops!',
                      'Nampaknya Pemijat sedang tidak tersedia, Silakan Pilih Pijat kami yang lain',
                      'fail'
                    )
              }
          })
          .fail(function() {
            alert('gagal');
          });
      }
    });
</script>
<script src="mod/swal.js"></script>
<script src="warung.js">



</script>
<?php }else{
header("location:login.php");
}?>