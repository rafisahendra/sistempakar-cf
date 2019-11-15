<?php
include "koneksi.php";
$sqlm = mysql_query("select * from member where id_member='$_GET[idm]'");
$rm = mysql_fetch_array($sqlm);



?>
<form name="form1" method="post" action="" enctype="multipart/form-data">
  <p>UBAH DATA USER  </p>
  <input type="hidden" name="id_member" value="<?php echo "$rm[id_member]"; ?>" />
    <p>Username
      <input name="username" class="form-control" type="text" id="username" class="form-control" value="<?php echo "$rm[username]"; ?>" /disabled>
  </p>
    <p>Password
      <input name="password" class="form-control" type="text" id="password" class="form-control" value=" <?php echo "$rm[password]"; ?>">
    </p>
    <p>Nama Lengkap
      <input name="nama" class="form-control" type="text" id="namalengkap" class="form-control"  value=" <?php echo "$rm[nama]"; ?> ">
    </p>
    <p>Alamat
      <textarea name="alamat" class="form-control" type="text" id="alamat" ><?php echo "$rm[alamat]"; ?></textarea>
    </p>

    <?php
    if($rm["jk"] == "pria"){
    	$p = "checked";    $w = "";
    }
    else if($rm["jk"] == "wanita"){
    	$p = "";    $w = "checked";
    }
    else{
    	$p = "";    $w = "";
    }
    ?>
    <p>JENIS KELAMIN <br>
      <input name="jk" type="radio" value="pria" <?php echo "$p"; ?>>
      Pria
      <input name="jk" type="radio" value="wanita" <?php echo "$w"; ?>>
      Wanita
    </p>
    <p>Umur
      <input name="umur" type="text" id="umur" class="form-control"  value=" <?php echo "$rm[umur]"; ?>">
    </p>
    <input name="simpan" type="submit" id="simpan" class="btn btn-info" value="SIMPAN DATA MEMBER">
    <a href='?r=member&idm=$rm[id_member]'class='btn btn-warning' >Batal</a>
</p>
</form>

<?php
if(isset($_POST["simpan"])){
  include "koneksi.php";
  $alamat = nl2br($_POST["alamat"]);
  $sqlm = mysql_query("update member set nama='$_POST[nama]', jk='$_POST[jk]', alamat='$alamat', umur='$_POST[umur]', password='$_POST[password]' where id_member='$_POST[id_member]'");
  if($sqlm){
  	echo "Data Berhasil Disimpan";
  }else{
  	echo "Penyimpanan Data Gagal";
  }
  echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?r=daftarmember'>";
}
?>
