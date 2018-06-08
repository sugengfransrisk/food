<?php

/**
 * 
 */
class Model 
{
	private $host = '127.0.0.1';
	private $user = 'root';
	private $pass = '';
	private $db = 'foot';
	private $mysqlia = "";
				  
	public function __construct()
	{	 
	 $this->mysqlia = mysqli_connect($this->host, $this->user, $this->pass, $this->db);

	}


  	public function get_warung_cat($param, $param2,$param3 ="")
  	{
  	$q= mysqli_query($this->mysqlia,"select * from tb_makanan where toko like'%".$param."%' order by ".$param2." ".$param3." LIMIT 4");
  	$rows = array();
		while($r = mysqli_fetch_assoc($q)) {
   		 $rows[] = $r;
		}
		return json_encode($rows);
	

	}
	function getPesanan($intArray){
  $param    = implode(',',$intArray);
  $sql			= "select * from menu where id_menu in(".$param.");";
  $query = mysqli_query($this->mysqlia,$sql);

  $data = array();
  while ($row=$query->fetch_assoc()) {
    $data[]=$row;
  }
      return json_encode($data);


}
  

  public function get_all_warung($param, $param2 = "")
  	{
  	$q= mysqli_query($this->mysqlia,"select * from tb_makanan where toko like'%".$param."%'");
  	$rows = array();
		while($r = mysqli_fetch_assoc($q)) {
   		 $rows[] = $r;
		}
		return json_encode($rows);
	

	}
  /*public function get_menu($menu ='')
  {
  	$q= mysqli_query($this->mysqlia,"select * from pijat p, service_pijat p where p.id_pemijat=p.id_service and id_pemijat='".$menu."' ");
	$rows = array();
    while($r = mysqli_fetch_assoc($q)) {
       $rows[] = $r;
    }
    return json_encode($rows);
  }*/

  public function get_pijat_cat($param, $param2,$param3 ="")
    {
    $q= mysqli_query($this->mysqlia,"select * from pijat where nama like'%".$param."%' order by ".$param2." ".$param3." LIMIT 4");
    $rows = array();
    while($r = mysqli_fetch_assoc($q)) {
       $rows[] = $r;
    }
    return json_encode($rows);
  

  }
  function getPesanan_pijat($intArray){
  $param    = implode(',',$intArray);
  $sql      = "select * from menu where id_menu in(".$param.");";
  $query = mysqli_query($this->mysqlia,$sql);

  $data = array();
  while ($row=$query->fetch_assoc()) {
    $data[]=$row;
  }
      return json_encode($data);


}
   public function get_menu($menu ='')
  {
    $q= mysqli_query($this->mysqlia,"select * from tb_makanan t, menu m where m.id_toko=t.id and id='".$menu."' ");
  $rows = array();
    while($r = mysqli_fetch_assoc($q)) {
       $rows[] = $r;
    }
    return json_encode($rows);
  }

  public function get_all_pijat($param, $param2 = "")
    {
    $q= mysqli_query($this->mysqlia,"select * from pijat p, service_pijat s where p.id_service=s.id_serv and nama like'%".$param."%'");
    $rows = array();
    while($r = mysqli_fetch_assoc($q)) {
       $rows[] = $r;
    }
    return json_encode($rows);
  

  }
  function addPemijat($nama,$service,$gambar, $gen){
  $sql     = "insert into pijat values ('','$nama','','$service','$gen','1','$gambar')";
  $query   = mysqli_query($this->mysqlia,$sql);
  if ($query = true) {
    $data['status'] = "ok";
  }else{
    $data['status'] = "fail";
  }
  return json_encode($data);
}
   public function show_cat()
    {
    $q= mysqli_query($this->mysqlia,"select * from service_pijat");
    $rows = array();
    while($r = mysqli_fetch_assoc($q)) {
       $rows[] = $r;
    }
    return json_encode($rows);
  

  }
  function addwarung($toko,$deskripsi,$jarak,$date,$gambar,$rating){
  $sql     = "insert into tb_makanan values ('','$toko','$jarak','$rating','$date','$deskripsi', '$gambar')";
  $query   = mysqli_query($this->mysqlia,$sql);
  if ($query = true) {
    $data['status'] = "ok";
  }else{
    $data['status'] = "fail";
  }
  return json_encode($data);
  die();
}
   
  public function get_pijat($menu ='')
  {
    $q= mysqli_query($this->mysqlia,"select * from pijat t, service s where t.id_service=s.id_serv and id='".$menu."' ");
  $rows = array();
    while($r = mysqli_fetch_assoc($q)) {
       $rows[] = $r;
    }
    return json_encode($rows);
  }
  function simpan_pesan_pemijat($id,$waktu){
      $info = array();
    
      $ssql = "Insert Into detail_pijat (id_tukang,jam) 
               Values (".$id.",'".$waktu."')";
        $hsl = $this->mysqlia->query($ssql);

        if($hsl) {
        $info['status']='Pesan Berhasil';
      }
      else{
        $info['status']='Pesan Gagal';
      }

      echo json_encode($info);
    }

    function cek_jam($id,$jam){
      $ssql="SELECT MAX(id) FROM detail_pijat
      WHERE id_tukang=".$id.";";

      $hsl = $this->mysqlia->query($ssql);
        $data = 0;
        
        while($row=$hsl->fetch_assoc()){
          $data=$row["MAX(id)"];
        }

        $ssql_waktu="SELECT * FROM detail_pijat
              WHERE id=".$data.";";
        $hsl_waktu = $this->mysqlia->query($ssql_waktu);
        $data_waktu = '';

        while($row=$hsl_waktu->fetch_assoc()){
          $data_waktu=$row["jam"];
        }   

      $date1 = new DateTime($data_waktu);
      $date2 = new DateTime($jam);

      $diff = $date2->diff($date1);

      $hours = $diff->h;
      $hours = $hours + ($diff->days*24);

      echo json_encode($hours);
    }

  }


