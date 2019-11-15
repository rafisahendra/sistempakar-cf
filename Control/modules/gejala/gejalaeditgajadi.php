<?php
include "koneksi.php";
$sqlg = mysql_query("select * from gejala where id_gejala='$_GET[idg]'");
$rg = mysql_fetch_array($sqlg);
?>
<form name="form1" method="post" action="" enctype="multipart/form-data">
  <p>UBAH DATA GEJALA  </p>
  <input type="hidden" class="form-control"  name="id_gejala" value="<?php echo "$rg[id_gejala]"; ?>" />
  <p>Kode Gejala
    <input name="kd_gejala" class="form-control" type="text"  value="<?php echo "$rg[kd_gejala]"; ?>"/disabled>
  </p>
  <p>Kode Penyakit
    <input name="kd_penyakit" class="form-control" type="text"  value="<?php echo "$rg[kd_penyakit]"; ?>"/disabled>
  </p>
  <p>Nama Gejala
    <textarea name="nama_gejala" class="form-control" type="text"  ><?php echo "$rg[nama_gejala]"; ?></textarea>
  </p>

  <p>
    <input name="simpan" type="submit" id="simpan" class="btn btn-info" value="SIMPAN DATA PENYAKIT">
    <a href='?r=penyakit&idp=$rp[id_penyakit]'class='btn btn-warning' >Batal</a>
</p>
</form>

<?php
if(isset($_POST["simpan"])){
  include "koneksi.php";

  $keterangan = nl2br($_POST["penanggulangan"]);
  $sqlp = mysql_query("update penyakit set kd_penyakit='$_POST[kd_penyakit]', nama_penyakit='$_POST[nama_penyakit]',penanggulangan='$keterangan'  where id_penyakit='$_POST[id_penyakit]'");
  if($sqlp){
  	echo "Data Berhasil Disimpan";
  }else{
  	echo "Penyimpanan Data Gagal";
  }
  echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?r=penyakit'>";
}
?>
