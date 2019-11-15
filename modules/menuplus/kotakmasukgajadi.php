<?php
//QUERY KRIM BALIK PESAN
if(isset($_POST["balas"])){
  include "koneksi.php";
  $pesan = nl2br($_POST["balaspesan"]);
  $id_member = $rm["id_member"];
  $sqlpe = mysql_query("insert into pesan (id_admin ,id_member, id_balas, pesan, status, waktu) values ('$_POST[id_admin]','$id_member', '$_POST[id_balas]', '$pesan','notyet', NOW())");
           mysql_query("update balas_pesan set status='ok' where id_balas='$_POST[id_balas]'");
  if($sqlpe){
    echo "<div align='center'class='alert alert-success'>
                <strong>Pesan Berhasil Dikirim!
                  </div>";
  }else{
    echo "<div align='center'class='alert alert-danger'>
                <strong>Pesan Gagal Dikirim!
                  </div>";

  }
  echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?r=kotakmasuk'>";
}

?>


<?php include "koneksi.php";
$sqlm = mysql_query("select * from member where username='$_SESSION[usermbr]'");
$rm = mysql_fetch_array($sqlm);

$sqlpeb = mysql_query("select * from balas_pesan where id_member='$rm[id_member]' order by status asc");

?>

<div >
<a href='?r=pesan'class='btn btn-success' > <span class='glyphicon glyphicon-edit'></span>Back</a>
<button data-toggle="modal" data-target="#myModal" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>Hapus Semua Pesan</button>

</div>
<div class="table-responsive">
  <table class="table table-hover table-sm table-bordered" >
    <thead class="bg-primary" >
        <tr id="thpo">
          <th width='5%' class="text-center">NO</th>
          <th class="text-center">PESAN</th>
          <th class="text-center">WAKTU</th>
          <th width='25%' class="text-center">ACTION</th>
    </thead>
    <tbody class="bg-warning">
        <?php
          $no = 1;
          while($rpeb = mysql_fetch_array($sqlpeb)){
            $tgl = substr($rpeb["waktu"],8,2);
            $bln = substr($rpeb["waktu"],5,2);
            $thn = substr($rpeb["waktu"],0,4);
            $jam = substr($rpeb["waktu"],11,5);

            if($rpeb["status"]=="ok"){
              $bg = "#ffff99";
            }else {
              $bg = "#ffcc99";
              }

            echo "<tr>";
              echo "  <td style='background:$bg'>$no</td>";
              echo "  <td style='background:$bg'>$rpeb[pesan]</td>";
              echo "  <td style='background:$bg'>$tgl-$bln-$thn    ( $jam )</td>";
              echo "  <td align='center'>";
              if($rpeb["status"]=="notyet"){
                echo"   <a href='javascript:showModalb(\"$rpeb[id_admin]\",\"$rpeb[id_balas]\", \"$rpeb[pesan]\")' class='btn btn-success' > <span class='glyphicon glyphicon-edit'></span>Balas Pesan</a>
                        <a href='?r=hapuspesan&idpeb=$rpeb[id_balas]'class='btn btn-danger'>  <span class='glyphicon glyphicon-trash'>Hapus</a>";
                      }
              else{
                echo"  <a href='?r=hapuspesan&idpeb=$rpeb[id_balas]'class='btn btn-danger'>  <span class='glyphicon glyphicon-trash'>Hapus</a>";


              }

            echo "  </td>";
            echo "</tr>";
            $no++;




            }
            ?>

        </tbody>
      </table>
    </div>

    <script type="text/javascript">
      function showModalb(id1, id2, pesan) {
        $('#id_admin').val(id1);
        $('#id_balas').val(id2);
        $('#pesan').val(pesan);
        $('#myModalb').modal('show');
      }
    </script>

<!-- BALAS PESAN -->
<div id="myModalb" class="modal fade">
	<div class="modal-dialog modal-lg ">
		<div class="modal-content ">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Balas Pesan</h4>
			</div>
			<div class="modal-body">
				<form action="" method="post">
          <div class="form-group">
            	<input id="id_admin" name="id_admin" type="hidden" class="form-control" >
						<input id="id_balas" name="id_balas" type="hidden" class="form-control" >
					</div>

          <div class="form-group">
						<label>PESAN</label>
						<textarea  cols="40" rows="15" id="pesan" name="pesan" type="text" class="form-control" /disabled ></textarea>
					</div>

          <div class="form-group">
            <label>BALAS PESAN</label>
            <textarea  name="balaspesan" type="text" class="form-control" ></textarea>
          </div>

				</div>
				<div class="modal-footer">
				  <input name="balas" type="submit" class="btn btn-primary" value="Balas Pesan">
					<button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>

				</div>
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
 <?php
 if(isset($_POST["hapus"])){
   include "koneksi.php";
   $sqlpe = mysql_query("delete from balas_pesan where id_member=$rm[id_member]");
  
   if($sqlpe){
     echo "<div align='center'class='alert alert-success'>
                 <strong>Pesan Berhasil Dihapus!
                   </div>";
   }else{
     echo "<div align='center'class='alert alert-danger'>
                 <strong>Pesan Gagal Dihapus!
                   </div>";
   }
    echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?r=kotakmasuk'>";
 }
    ?>
