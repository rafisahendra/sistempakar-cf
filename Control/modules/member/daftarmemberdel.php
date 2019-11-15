<?php
include "koneksi.php";
$sqlm = mysql_query("delete from member where id_member='$_GET[idm]'");
if($sqlm){
  echo "<div align='center'class='alert alert-success'>
              <strong>Data Berhasil Dihapus!
                </div>";
  }else{
    echo "<div align='center'class='alert alert-success'>
                <strong>Data Gagal Dihapus!
                  </div>";
  }
echo "<META HTTP-EQUIV='Refresh' Content='1; url=?r=daftarmember'>";
?>
