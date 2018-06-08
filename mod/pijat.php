<?php
/**
 * 
 */


/**
 * 
 */				session_start();
				require 'model.php';
				$id=isset($_REQUEST['id'])
				? $_REQUEST['id']: '0';
				$waktu=isset($_REQUEST['waktu'])
				? $_REQUEST['waktu']: 'index';

				if (isset($_REQUEST['act'])) {
				  $action   = $_REQUEST['act'];
				  if ($_REQUEST['act'] =="search") {
				$param2 = $_REQUEST['sel'];
				$param= $_REQUEST['cari'];
				}
				}else{
				  $action = "";	
				}

				
				
				$objpijat = new Model();
				if (isset($_REQUEST['idPesanan'])) {
				  $idPesanan   = $_REQUEST['idPesanan'];

				}else{
				  $idPesanan = '';
				}

				$_SESSION['idPesanan'][] = $idPesanan;
				$intArray = array_map(function($nilai){return (int) $nilai;},$_SESSION['idPesanan']);
				
				
				
		
				switch ($action) {
					case 'ambilPesanan':
				    	$result = $objpijat->getPesanan($intArray);

				   		 echo $result;
				    break;
				    case 'pesan_pemijat':
						$objpijat->simpan_pesan_pemijat($id,$waktu);
					break;
					case 'cek_jam':
						$objpijat->cek_jam($id,$waktu);
					break;		
				    case 'show_cat':
				   		 $result = $objpijat->show_cat();

				   		 echo $result;
				    
				    break;
				    case 'TambahPijat':
				    $gambar = $_FILES['foto']['name'];
				    $sourcePath = $_FILES['foto']['tmp_name'];       // Storing source path of the file in a variable
					$targetPath = "uploads/".$_FILES['foto']['name']; // Target path where file is to be stored
					move_uploaded_file($sourcePath,$targetPath) ;  
					//var_dump($sourcePath);
					
				    $nama            = $_REQUEST['nama'];
				    $service             = $_REQUEST['service'];
				    $gen             = $_REQUEST['gender'];
				   // $foto              = $_FILES['jarak'];
				    

				    $result = $objpijat->addPemijat($nama,$service,$gambar,$gen);
				    echo $result;
				    break;

				  case 'batalPesanan':
				    session_destroy();
				    break;

					case 'search':
						if ($param2 === "all") {
					$result = $objpijat->get_all_pijat($param);
					echo $result;
				} else {
					if ($param2 ==="jarak") {
							$param3="asc";
							$result = $objpijat->get_pijat_cat($param,$param2,$param3);
					} else {
							$param3="desc";
							$result = $objpijat->get_pijat_cat($param,$param2,$param3);
					}
					
					
				echo $result;
				
				}
						break;
					
				case 'menu':
				$menu = $_REQUEST['id'];
						$result = $objpijat->get_menu($menu);
						echo $result;
						break;
				}
				//var_dump($_REQUEST['idPesanan']);
				

		
	
/* End of file Controller.php */
/* Location: .//C/xampp/htdocs/food/mod/Controller.php */