
<?php include "koneksi.php";?>
<?php
//QUERY KRIM BALIK PESAN
if(isset($_POST["kirim"])){

        $cek  = mysql_query("select * from pesanm where id_member='$_GET[idpe]'");
        $rcek = mysql_num_rows($cek);

        if($rcek>0){


                  $pesan = nl2br($_POST["balaspesan"]);

                  $sqlbp = mysql_query("insert into balas_pesan (id_member, id_pesan, pesan, status, waktu) values ('$_GET[idpe]', '$_POST[id_pesan]' , '$pesan','notyet', NOW())");
                          
                           mysql_query("update pesanm set status='ok' where id_balas='$_POST[id_balas]' and id_member='$_GET[idpe]'");

                  if($sqlbp){
                    echo "<div align='center'class='alert alert-success'>
                                <strong>Pesan Berhasil Dikirim!
                                  </div>";
                                  echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?r=lihatpesan&idpe=$_GET[idpe]'>";
                  }else{
                    echo "<div align='center'class='alert alert-danger'>
                                <strong>Pesan Gagal Dikirim!
                                  </div>";
                                  echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?r=lihatpesan&idpe=$_GET[idpe]'>";
                  }
                //  echo "<META HTTP-EQUIV='Refresh' Content='1; URL='?r=lihatpesan&idpe=$_GET[idpe]'>";

      }else{
                
                        $sqlcek =  mysql_query("update pesanm set status='ok' where id_balas='$_POST[id_balas]' and id_member='$_GET[idpe]'");

                if($sqlcek){  echo "<div align='center'class='alert alert-danger'>
                              <strong>Sesi Pesan ini sudah dihapus user!
                                </div>";

                              echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?r=pesan'>";
                              }else{

                              }
      }

}
// batas kirim
?>
<?php



 ?>



<?php

$sqlpe = mysql_query("SELECT * from pesanm where id_member='$_GET[idpe]' order by id_pesanm asc");

?>



<?php
$testing=mysql_num_rows(mysql_query("SELECT * FROM pesanm where  id_member='$_GET[idpe]' "));

if($testing>0){
echo"  <p>
      <button data-toggle='modal' data-target='#myModal' class='btn btn-dangerpesan'><span class='glyphicon glyphicon-trash'></span>Hapus Semua Pesan</button>
  </p>";

while($rpe = mysql_fetch_array($sqlpe)){
  $tgl = substr($rpe["waktu"],8,2);
  $bln = substr($rpe["waktu"],5,2);
  $thn = substr($rpe["waktu"],0,4);
  $jam = substr($rpe["waktu"],11,5);


  if($rpe["status"]=="notyet"){
    $warna="id='wellbaru'";
  }else{
    $warna="";
  }

        echo"
        <div class='well well-lg' $warna;><p align='left'>$rpe[pesan] </p><p align='left'><font color = 'cccccc'>$tgl-$bln-$thn  ($jam)</font></p> </div>
        ";
        $sqlpeb = mysql_query("select * from balas_pesan where id_member='$_GET[idpe]' and id_pesan='$rpe[id_pesanm]'");
        while($rpeb   = mysql_fetch_array($sqlpeb)){
        $tgl2 = substr($rpeb["waktu"],8,2);
        $bln2 = substr($rpeb["waktu"],5,2);
        $thn2 = substr($rpeb["waktu"],0,4);
        $jam2 = substr($rpeb["waktu"],11,5);

        if($rpeb>0){


        echo"
        <div class='well well-lg' ><p align='right'>$rpeb[pesan] </p><p align='right'><font color = 'cccccc'>$tgl2-$bln2-$thn2  ($jam2)</font></p></div>
        ";
      }else{

      }
    }
}
      $q_idbalas=mysql_query("SELECT id_balas from pesanm where id_member='$_GET[idpe]' ORDER BY id_pesanm DESC LIMIT 1");
      $qidbalas= mysql_fetch_array($q_idbalas);
      //$q_idbalas=mysql_query("select max(id_balas) as id_balasku from pesan where id_member='$_GET[idpe]'");
      //$qidbalas= mysql_fetch_array($q_idbalas);

      $q_idpesan=mysql_query("select max(id_pesanm) as id_pesanm from pesanm where id_member='$_GET[idpe]'");
      $qidpesan= mysql_fetch_array($q_idpesan);

   

?>
<form name="form1" method="post" action="" enctype="multipart/form-data">
<p>
    <input name="id_pesan" type="hidden" class="form-control"  value="<?php echo "$qidpesan[id_pesanm]"; ?>" >
    <input name="id_balas" type="hidden" class="form-control"  value="<?php echo "$qidbalas[id_balas]"; ?>" >
    <textarea name="balaspesan" class="form-control" type="text"  ></textarea>  </p>

  <p>
    <input name="kirim" type="submit" id="simpan" class="btn btn-success" value="BALAS PESAN">
    <a href='?r=pesan'class='btn btn-warning' >Batal</a>
</p>
</form>


<!--HAPUS ALL PESAN -->

 <div id="myModal" class="modal fade">
 	<div class="modal-dialog modal-lg ">
 		<div class="modal-content ">
 			<div class="modal-header">
	       <form action="" method="post">
 				      <h4 class="modal-title">Konfirmasi</h4>
 			</div>
 			<div class="modal-body">
 				Apakah Anda Yakin Akan menghapus semua kotak masuk?

 				</div>
 				<div class="modal-footer">
 				  <input name="hapus" type="submit" class="btn btn-primary" id="hapus" value="hapus">
 					<button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>

 				</div>
</form>
</div>
</div>
</div>

 <?php
 if(isset($_POST["hapus"])){
   include "koneksi.php";
   $sqlpe = mysql_query("delete from balas_pesan where id_member=$rm[id_member]");
            mysql_query("delete from pesanm where id_member=$rm[id_member]");

   if($sqlpe){
     echo "<div align='center'class='alert alert-success'>
                 <strong>Pesan Berhasil Dihapus!
                   </div>";
   }else{
     echo "<div align='center'class='alert alert-danger'>
                 <strong>Pesan Gagal Dihapus!
                   </div>";
   }
    echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?r=pesan'>";
 }
}else{

  echo"<p ><center style='font-family:GreyscaleBasic;font-weight:bold;'>TIDAK ADA KOTAK MASUK </center></p>";
}


    ?>
  <p align="right">  <button class="btn btn-success" value="Scroll Top" id="tombolScrollTop" onclick="scrolltotop()"><span class='glyphicon glyphicon-arrow-up'></span></button>
</p>
<script>



      function scrolltotop()
      {
      	$('html, body').animate({scrollTop : 0},500);
      }


      </script>
