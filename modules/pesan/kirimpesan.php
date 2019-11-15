<?php
if(isset($_POST["kirim"])){
  include "koneksi.php";
  $pesan = nl2br($_POST["pesan"]);

        $sqlpe =   mysql_query("insert into pesanm (id_member,id_balas ,pesan,status,waktu) values ('$_POST[id_member]','','$pesan','notyet',NOW())");
  if($sqlpe){
    echo "<div align='center'class='alert alert-success'>
                <strong>Pesan Berhasil Dikirim!
                  </div>";
  }else{
    echo "<div align='center'class='alert alert-danger'>
                <strong>Pesan Gagal Dikirim!
                  </div>";
  }
  echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?r=homemember'>";
}
?>

<?php include "koneksi.php";
$sqlm = mysql_query("select * from member where username='$_SESSION[usermbr]'");
$rm = mysql_fetch_array($sqlm);


?>


<div id="viewregister">
<fieldset>
<form name="form1" method="post" action="" enctype="multipart/form-data">
  <h3 align="center">Kirim Pesan Anda</h3>
    <input type="hidden" name="id_member" value="<?php echo "$rm[id_member]"; ?>" />
  <p><a  href='?r=kotakmasuk'class='btn btn-info' > <span class='glyphicon glyphicon-list'></span> LIHAT KOTAK MASUK  </a>
    <textarea  name="pesan" id="textareapesan" class="form-control"></textarea>
  </p>
  <div align="center">
  <p>
    <input align="center" name="kirim" type="submit"  class="btn btn-info btn-block glyphicon glyphicon-message" value="Kirim ">

  </p>
  </div>
</form>


</div>
</fieldset>
