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
  public function get_menu($menu ='')
  {
  	$q= mysqli_query($this->mysqlia,"select * from tb_makanan t, menu m where m.id_toko=t.id and id='".$menu."' ");
	$rows = array();
    while($r = mysqli_fetch_assoc($q)) {
       $rows[] = $r;
    }
    return json_encode($rows);
  }

  }


