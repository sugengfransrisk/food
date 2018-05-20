
 
            <?php
include 'koneksi.php';

$q= mysqli_query($konek,"select * from tb_makanan t, menu m where m.id_toko=t.id and id='".$_GET['id']."' ");
$rows = array();
    while($r = mysqli_fetch_assoc($q)) {
       $rows[] = $r;
    }
    print json_encode($rows);
    ?>


 