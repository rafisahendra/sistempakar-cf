<?php include "koneksi.php"; ?>

<?php
if(isset($_POST["simpan"])){
  include "koneksi.php";
  $sqlg = mysql_query("insert into gejala (kd_gejala,kd_kerusakan,nama_gejala) values ('$_POST[kd_gejala]', '$_POST[kd_kerusakan]','$_POST[nama_gejala]')");

  if($sqlg){
    echo "<div align='center'class='alert alert-success'>
                <strong>Data Berhasil Disimpan!
                  </div>";
  }else{
    echo "<div align='center'class='alert alert-danger'>
                <strong>Data Gagal Disimpan!
                  </div>";
  }
   echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?r=gejala'>";
}
   ?>

   <?php
   if(isset($_POST["edit"])){
     include "koneksi.php";

     $sqlg = mysql_query("update gejala set kd_gejala='$_POST[kd_gejala]', kd_kerusakan='$_POST[kd_kerusakan]',nama_gejala='$_POST[nama_gejala]'  where id_gejala='$_POST[id_gejala]'");
     if($sqlg){
       echo "<div align='center'class='alert alert-success'>
                   <strong>Update data Berhasil!
                     </div>";
     }else{
       echo "<div align='center'class='alert alert-danger'>
                   <strong>Update data Gagal!
                     </div>";
     }
     echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?r=gejala'>";
   }
   ?>


<div >
<button data-toggle="modal" data-target="#myModal" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>Tambah Gejala</button>
</div>

<div class="table-responsive">
<table class="table table-hover table-sm table-bordered" >
<thead  >
<tr id="thpo">
  <th width='3%' class="text-center" >NO</th>
  <th class="text-center">KODE GEJALA</th>
  <th class="text-center">NAMA GEJALA</th>
  <th class="text-center">KODE KERUSAKAN</th>
  <th width='20%' class="text-center">ACTION</th>
 </tr>
 </thead>
 <tbody class="">
 <?php
$sqlg = mysql_query("select * from gejala order by id_gejala asc");
$no = 1;
while($rg = mysql_fetch_array($sqlg)){

  echo "<tr>
    <td >$no</td>
    <td >$rg[kd_gejala]</td>
    <td>$rg[nama_gejala]</td>
    <td>$rg[kd_kerusakan]</td>
    <td align='center'>
    <a href='javascript:showModalG(\"$rg[id_gejala]\", \"$rg[kd_gejala]\",\"$rg[nama_gejala]\", \"$rg[kd_kerusakan]\" )' class='btn btn-success' > <span class='glyphicon glyphicon-edit'></span>Edit</a>
    <a href='?r=gejaladel&idg=$rg[id_gejala]'class='btn btn-danger'>  <span class='glyphicon glyphicon-trash'>Hapus</a>

  </td>


  </tr>";

  $no++;
}

?>

</tbody>

 </table> </div>
 </div>
 </div>
<!-- MODAL UNTUK ADD -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog modal-lg ">
		<div class="modal-content ">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah Gejala Baru</h4>
			</div>
			<div class="modal-body">
				<form action="" method="post">
					<div class="form-group">
						<label>Kode Gejala</label>
						<input name="kd_gejala" type="text" class="form-control" >
					</div>
					<div class="form-group">
						<label>Kode kerusakan</label>
            <?php
              $sqlp = mysql_query("select * from kerusakan order by id_kerusakan asc");
              echo "<select name='kd_kerusakan' class='form-control'>";
              echo "<option value=''>Pilih kerusakan</option>";
              while($rp=mysql_fetch_array($sqlp)){
              echo "<option value='$rp[kd_kerusakan]'>$rp[kd_kerusakan] - $rp[nama_kerusakan]</option>";
              }
              echo "</select>";
            ?>

					</div>
					<div class="form-group">
						<label>Nama Gejala</label>
						<input name="nama_gejala" type="text" class="form-control" >
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
  function showModalG(id, kd_gejala, nama_gejala, kd_kerusakan ) {
    $('#id_gejala').val(id);
    $('#kd_gejala').val(kd_gejala);
    if(kd_kerusakan=='P01') { $('#kd_kerusakan[value="P01"]').attr("selected", "selected");}
    if(kd_kerusakan=='P02') { $('#kd_kerusakan[value="P02"]').attr("selected", "selected");}
    if(kd_kerusakan=='P03') { $('#kd_kerusakan[value="P03"]').attr("selected", "selected");}
    if(kd_kerusakan=='P04') { $('#kd_kerusakan[value="P04"]').attr("selected", "selected");}
    $('#nama_gejala').val(nama_gejala);
    $('#kd_kerusakan').val(kd_kerusakan);
    $('#myModalG').modal('show');
  }
</script>

<!--MODAL EDIT DATA-->
<div id="myModalG" class="modal fade">
	<div class="modal-dialog modal-lg ">
		<div class="modal-content ">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Edit Gejala</h4>
			</div>
			<div class="modal-body">
				<form action="" method="post">
					<div class="form-group">
            <input id="id_gejala" name="id_gejala" type="hidden" class="form-control" >
						<label>Kode Gejala</label>
						<input id="kd_gejala" name="kd_gejala" type="text" class="form-control"  >
					</div>
					<div class="form-group">
						<label>Kode kerusakan</label>
						 <?php
              $sqlp = mysql_query("select * from kerusakan order by id_kerusakan asc");
              echo "<select name='kd_kerusakan' class='form-control'>";
              echo "<option value=''>Pilih kerusakan</option>";
              while($rp=mysql_fetch_array($sqlp)){
              echo "<option value='$rp[kd_kerusakan]'>$rp[kd_kerusakan] - $rp[nama_kerusakan]</option>";
              }
              echo "</select>";
            ?>

					</div>
					<div class="form-group">
						<label>Nama Gejala</label>
						<input id="nama_gejala" name="nama_gejala" type="text" class="form-control" >
					</div>

				</div>
				<div class="modal-footer">
				  <input name="edit" type="submit" class="btn btn-primary" id="edit" value="Edit">
					<button type="button" class="btn btn-success" data-dismiss="modal">Batal</button>

				</div>
			</form>
