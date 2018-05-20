<?php
/**
 * 
 */


/**
 * 
 */
				require 'model.php';
				$action = $_GET['act'];
				if ($_GET['act'] =="search") {
				$param2 = $_GET['sel'];
				$param= $_GET['cari'];
				}
				
				$objwarung = new Model();
				
				
				
		
				switch ($action) {

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
				$menu = $_GET['id'];
						$result = $objwarung->get_menu($menu);
						echo $result;
						break;
				}
				
				

		
	
/* End of file Controller.php */
/* Location: .//C/xampp/htdocs/food/mod/Controller.php */