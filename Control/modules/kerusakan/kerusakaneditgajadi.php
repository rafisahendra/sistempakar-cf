<?php
include "koneksi.php";
$sqlp = mysql_query("select * from penyakit where id_penyakit='$_GET[idp]'");
$rp = mysql_fetch_array($sqlp);
?>
<form name="form1" method="post" action="" enctype="multipart/form-data">
  <p>UBAH DATA PENYAKIT  </p>
  <input type="hidden" name="id_penyakit" value="<?php echo "$rp[id_penyakit]"; ?> " />
  <p>Kode Penyakit
    <input name="kd_penyakit" class="form-control"  type="text"  value="<?php echo "$rp[kd_penyakit]"; ?>"/disabled>
  </p>
  <p>Nama Penyakit
    <input name="nama_penyakit" class="form-control" type="text"  value="<?php echo "$rp[nama_penyakit]"; ?>"/disabled>
  </p>
  <p>Keterangan
    <textarea name="keterangan" class="form-control"  type="text"  ><?php echo "$rp[keterangan]"; ?></textarea>
  </p>
  <p>Penangglangan
    <textarea name="penanggulangan" class="form-control" type="text"  ><?php echo "$rp[penanggulangan]"; ?></textarea>
  </p>

  <p>
    <input name="simpan" type="submit" id="simpan" class="btn btn-info" value="SIMPAN DATA PENYAKIT">
    <a href='?r=penyakit&idp=$rp[id_penyakit]'class='btn btn-warning' >Batal</a>
</p>
</form>

<?php
if(isset($_POST["simpan"])){
  include "koneksi.php";
  $keterangan= nl2br($_POST["keterangan"]);
  $penanggulangan = nl2br($_POST["penanggulangan"]);
  $sqlp = mysql_query("update penyakit set keterangan='$keterangan',penanggulangan='$penanggulangan'  where id_penyakit='$_POST[id_penyakit]'");
  if($sqlp){
  	echo "Data Berhasil Disimpan";
  }else{
  	echo "Penyimpanan Data Gagal";
  }
  echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?r=penyakit'>";
}
?>
