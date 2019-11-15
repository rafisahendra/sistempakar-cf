<?php
	$host	= "localhost";
	$user	= "root";
	$pass	= "";
	$db		= "cf_motor";

	$con 	= mysql_connect($host, $user, $pass);
	$condb	= mysql_select_db($db, $con);

	// Cuma buat ngetes doank
	/*if($con){
		echo "Terkoneksi dengan MySQL<br>";
		if($condb){
			echo "Database $db bisa diakses";
		}else{
			echo "Database $db tidak ada";
		}
	}else{
		echo "Gagal Koneksi";
	}*/
?>
