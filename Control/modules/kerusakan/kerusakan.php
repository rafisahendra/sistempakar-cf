<?php include "koneksi.php"; ?>

<?php
if(isset($_POST["simpan"])){
  include "koneksi.php";
  $penanggulangan = nl2br($_POST["penanggulangan"]);
  $keterangan=nl2br($_POST["keterangan"]);
  $sqlp = mysql_query("insert into kerusakan (kd_kerusakan,nama_kerusakan,keterangan,penanggulangan) values ('$_POST[kd_kerusakan]', '$_POST[nama_kerusakan]','$keterangan','$penanggulangan')");

  if($sqlp){
    echo "<div align='center'class='alert alert-success'>
                <strong>Data Berhasil Ditambah!
                  </div>";
  }else{
    echo "<div align='center'class='alert alert-danger'>
                <strong>Data Gagal Ditambah!
                  </div>";
  }
   echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?r=kerusakan'>";
}
   ?>


     <?php
     include "koneksi.php";
     if(isset($_POST["edit"])){

       $penanggulangan = nl2br($_POST["penanggulangan"]);
       $keterangan=nl2br($_POST["keterangan"]);
       $sqlp = mysql_query("update kerusakan set nama_kerusakan='$_POST[nama_kerusakan]',keterangan='$keterangan', penanggulangan='$penanggulangan'  where id_kerusakan='$_POST[id_kerusakan]'");
       if($sqlp){
         echo "<div align='center'class='alert alert-success'>
                     <strong>Data Berhasil Diupdate!
                       </div>";
       }else{
         echo "<div align='center'class='alert alert-danger'>
                     <strong>Data gagal Diupdate!
                       </div>";
       }
       echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?r=kerusakan'>";
     }
     ?>


<div >
<button data-toggle="modal" data-target="#myModal" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>Tambah kerusakan</button>
</div>

<div class="table-responsive">
<table class="table table-hover table-sm table-bordered" >
<thead  >
<tr id="thpo">
  <th class="text-center" >NO</th>
  <th class="text-center">KODE KERUSAKAN</th>
  <th class="text-center">NAMA KERUSAKAN</th>
  <th class="text-center">PENANGGULANGAN</th>
  <th width='20%' class="text-center">ACTION</th>
 </tr>
 </thead>
 <tbody class="">
 <?php
$sqlp = mysql_query("select * from kerusakan order by id_kerusakan asc");
$no = 1;
while($rp = mysql_fetch_array($sqlp)){





  echo "<tr>
    <td >$no</td>
    <td>$rp[kd_kerusakan]</td>
    <td>$rp[nama_kerusakan]</td>
    <td>$rp[penanggulangan]</td>
    <td align='center'>
    <a href='javascript:showModalP(\"$rp[id_kerusakan]\", \"$rp[kd_kerusakan]\",\"$rp[nama_kerusakan]\", \"$rp[keterangan]\", \"$rp[penanggulangan]\" )' class='btn btn-success' > <span class='glyphicon glyphicon-edit'></span>Edit</a>
    <a href='?r=kerusakandel&idp=$rp[id_kerusakan]'class='btn btn-danger'>  <span class='glyphicon glyphicon-trash'></span>Hapus</a>

  </td>


  </tr>";

  $no++;
}


?>

</tbody>

 </table> </div>
 </div>
 </div>

 <!-- MODAL UNTUK TAMBAH kerusakan -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog modal-lg ">
		<div class="modal-content ">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah data kerusakan </h4>
			</div>
			<div class="modal-body">
				<form action="" method="post">
					<div class="form-group">
						<label>Kode kerusakan</label>
						<input name="kd_kerusakan" type="text" class="form-control" >
					</div>
					<div class="form-group">
						<label>Nama kerusakan</label>
						<input name="nama_kerusakan" type="text" class="form-control" >
					</div>
          <div class="form-group">
						<label>Keterangan</label>
						<textarea name="keterangan" type="text" class="form-control" ></textarea>
					</div>
					<div class="form-group">
						<label>Penangglangan</label>
						<textarea name="penanggulangan" type="text" class="form-control" ></textarea>
					</div>



				</div>
				<div class="modal-footer">
				  <input name="simpan" type="submit" class="btn btn-primary" id="simpan" value="simpan">
					<button type="button" class="btn btn-success" data-dismiss="modal">Batal</button>

				</div>
			</form>
        </div>
	</div>
</div>


<script type="text/javascript">
  function showModalP(id, kd_kerusakan, nama_kerusakan, keterangan, penanggulangan ) {
    $('#id_kerusakan').val(id);
    $('#kd_kerusakan').val(kd_kerusakan);
    $('#nama_kerusakan').val(nama_kerusakan);
    $('#keterangan').val(keterangan);
    $('#penanggulangan').val(penanggulangan);
    $('#myModalP').modal('show');
  }
</script>


<!-- MODAL UNTUK EDIT kerusakan -->

<div id="myModalP" class="modal fade">
	<div class="modal-dialog modal-lg ">
		<div class="modal-content ">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Edit kerusakan</h4>
			</div>
			<div class="modal-body">
				<form action="" method="post">
          <input id="id_kerusakan" name="id_kerusakan" type="hidden" class="form-control"  >
					<div class="form-group">
						<label>Kode kerusakan</label>
						<input id="kd_kerusakan" name="kd_kerusakan" type="text" class="form-control" disabled >
					</div>
					<div class="form-group">
						<label>Nama kerusakan</label>
						<input id="nama_kerusakan" name="nama_kerusakan" type="text" class="form-control" >
					</div>
          <div class="form-group">
						<label>Keterangan</label>
						<textarea id="keterangan" name="keterangan" class="form-control" ></textarea>
					</div>
					<div class="form-group">
						<label>Penanggulangan</label>
						<textarea id="penanggulangan" name="penanggulangan"  class="form-control" ></textarea>
					</div>



				</div>
				<div class="modal-footer">
				  <input name="edit" type="submit" class="btn btn-primary" id="edit" value="Edit">
					<button type="button" class="btn btn-success" data-dismiss="modal">Batal</button>

				</div>
			</form>
