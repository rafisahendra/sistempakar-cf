<?php include "koneksi.php";
$sqlpe = mysql_query("select * from pesan where id_member='$_GET[idpe]' order by id_pesan desc");

?>

<div >
<a href='?r=pesan'class='btn btn-success' > <span class='glyphicon glyphicon-edit'></span>Back</a>
</div>
<div class="table-responsive">
<table class="table table-hover table-sm table-bordered" >
<thead class="bg-primary" >
<tr id="thpo">
  <th width='5%' class="text-center">NO</th>
  <th class="text-center">PESAN</th>
  <th class="text-center">WAKTU</th>
  <th class="text-center">STATUS</th>
  <th width='20%' class="text-center">ACTION</th>
 </thead>
 <tbody class="bg-warning">
 <?php
 $no = 1;
while($rpe = mysql_fetch_array($sqlpe)){
  echo "<tr>
    <td >$no</td>
    <td>$rpe[pesan]</td>
    <td>$rpe[waktu]</td>
      <td>$rpe[status]</td>
    <td align='center'>
      <a href='?r=balaspesan&idpe=$rpe[id_pesan]' class='btn btn-success' > <span class='glyphicon glyphicon-edit'></span>Balas Pesan</a>
      <a href='javascript:showModal(\"$rpe[id_pesan]\", \"$rpe[pesan]\")' class='btn btn-success' > <span class='glyphicon glyphicon-edit'></span>Balas Pesan</a>
    </td>
  </tr>";
  $no++;




}
?>

</tbody>

 </table> </div>


<script type="text/javascript">
  function showModal(id, pesan) {
    $('#id_pesan').val(id);
    $('#pesan').val(pesan);
    $('#myModal').modal('show');
  }
</script>

<div id="myModal" class="modal fade">
	<div class="modal-dialog modal-lg ">
		<div class="modal-content ">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah Penyakit Baru</h4>
			</div>
			<div class="modal-body">
				<form action="" method="post">
          <div class="form-group">
						<input id="id_pesan" name="id_pesan" type="hidden" class="form-control" >
					</div>

          <div class="form-group">
						<label>Keterangan</label>
						<textarea id="pesan" name="pesan" type="text" class="form-control" ></textarea>
					</div>

				</div>
				<div class="modal-footer">
				  <input name="simpan" type="submit" class="btn btn-primary" id="simpan" value="simpan">
					<button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>

				</div>
			</form>
