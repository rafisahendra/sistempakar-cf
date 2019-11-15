<?php
include "koneksi.php";
$sqlg = mysql_query("delete from gejala where id_gejala='$_GET[idg]'");
if($sqlg){
  echo "<div align='center'class='alert alert-success'>
              <strong>Data Berhasil Dihapus!
                </div>";
  }else{
    echo "<div align='center'class='alert alert-success'>
                <strong>Data Gagal Dihapus!
                  </div>";
  }
echo "<META HTTP-EQUIV='Refresh' Content='1; url=?r=gejala'>";
?>
