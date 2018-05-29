<?php
/**
 * 
 */


/**
 * 
 */				session_start();
				require 'model.php';
				if (isset($_REQUEST['act'])) {
				  $action   = $_REQUEST['act'];
				  if ($_REQUEST['act'] =="search") {
				$param2 = $_REQUEST['sel'];
				$param= $_REQUEST['cari'];
				}
				}else{
				  $action = "";	
				}

				
				
				$objwarung = new Model();
				if (isset($_REQUEST['idPesanan'])) {
				  $idPesanan   = $_REQUEST['idPesanan'];

				}else{
				  $idPesanan = '';
				}

				$_SESSION['idPesanan'][] = $idPesanan;
				$intArray = array_map(function($nilai){return (int) $nilai;},$_SESSION['idPesanan']);
				
				
				
		
				switch ($action) {
					case 'ambilPesanan':
				    $result = $objwarung->getPesanan($intArray);

				    echo $result;
				    break;

				  case 'batalPesanan':
				    session_destroy();
				    break;

					case 'search':
						if ($param2 === "all") {
					$result = $objwarung->get_all_warung($param);
					echo $result;
				} else {
					if ($param2 ==="jarak") {
							$param3="asc";
							$result = $objwarung->get_warung_cat($param,$param2,$param3);
					} else {
							$param3="desc";
							$result = $objwarung->get_warung_cat($param,$param2,$param3);
					}
					
					
				echo $result;
				
				}
						break;
					
				case 'menu':
				$menu = $_REQUEST['id'];
						$result = $objwarung->get_menu($menu);
						echo $result;
						break;
				}
				//var_dump($_REQUEST['idPesanan']);
				

		
	
/* End of file Controller.php */
/* Location: .//C/xampp/htdocs/food/mod/Controller.php */