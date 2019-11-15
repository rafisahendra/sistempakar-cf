<?php include "koneksi.php"; ?>



<div class="table-responsive">
<table class="table table-hover table-sm table-bordered" >
<thead class="bg-primary" >
<tr id="thpo">
  <th width='5%' class="text-center" >NO</th>
  <th class="text-center">NAMA LENGKAP</th>
  <th class="text-center">ACTION</th>
 </tr>
 </thead>
 <tbody class="">
 <?php

 $sqlh = mysql_query("select distinct(id_member) from hasil_konsultasi order by waktu asc");
$no = 1;
while($rh = mysql_fetch_array($sqlh)){
  	$sqlhu = mysql_query("select * from member where id_member='$rh[id_member]'");
    $rhu = mysql_fetch_array($sqlhu);
  echo "<tr>
    <td >$no</td>
    <td>$rhu[nama]</td>
    <td align='center'>
    <a href='?r=lihathasil&idh=$rh[id_member]'class='btn btn-success' > <span class='glyphicon glyphicon-eye-open'></span>LIHAT</a>

  </td>




  </tr>";

  $no++;

}
?>

</tbody>

 </table> </div>
 </div>
 </div>
