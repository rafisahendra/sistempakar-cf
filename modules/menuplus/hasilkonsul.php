<?php include "koneksi.php";
$sqlm = mysql_query("select * from member where username='$_SESSION[usermbr]'");
$rm = mysql_fetch_array($sqlm);



$sqlh = mysql_query("select * from hasil_konsultasi where id_member='$rm[id_member]' order by no_konsul desc");

?>

<div >
<a href='?r=hasilkonsultasi'class='btn btn-success' > <span class='glyphicon glyphicon-edit'></span> Back</a>
</div>
<div class="table-responsive">
<table class="table table-hover table-sm table-bordered" >
<thead id="thpo" >
<tr id='thpo'>
  <th width='5%' class="text-center">NO</th>
  <th class="text-center">HASIL DIAGNOSA KERUSAKAN</th>
  <th class="text-center">GEJALA</th>
  <th class="text-center">CF</th>
  <th width='20%' class="text-center">WAKTU KONSULTASI</th>
  <th width='20%' class="text-center"> ACTION </th>
 </thead>
 <tbody class="">
 <?php

$no = 1;
while($rh = mysql_fetch_array($sqlh)){

    $tgl = substr($rh["waktu"],8,2);
    $bln = substr($rh["waktu"],5,2);
    $thn = substr($rh["waktu"],0,4);
    $jam = substr($rh["waktu"],11,5);

    $cekmax=$rh['max'];

    if($cekmax>0){


    $sqlhp = mysql_query("select * from kerusakan where kd_kerusakan='$rh[kd_kerusakan]'");
    $rhp = mysql_fetch_array($sqlhp);

    $sqlhg = mysql_query("select * from hasil_konsultasi,konsultasi where hasil_konsultasi.no_konsul=konsultasi.no_konsul
      and hasil_konsultasi.no_konsul='$rh[no_konsul]'
      and konsultasi.no_konsul='$rh[no_konsul]'");

  	$gejala =array();

  	while($rhg = mysql_fetch_array($sqlhg)){


   $namagejala = mysql_query("select * from gejala where kd_gejala='$rhg[kd_gejala]'");
   $rng=mysql_fetch_array($namagejala);

    	$gejala[] = $rng['nama_gejala'];
  	}

  echo "<tr>
    <td >$no</td>
    <td>$rhp[nama_kerusakan]</td>
    <td>- ".implode('<br>- ',$gejala)."</td>
    <td>$rh[max]</td>
    <td>$tgl-$bln-$thn    ( $jam )</td>
    <td align='center'><a href='cetak.php?&no_konsul=$rh[no_konsul]' target='_blank'><button type='button' id='' class='btn btn-info'> CETAK</button></a>
    </td>
  </tr>";

  $no++;

}else{

    $sqlhp = mysql_query("select * from kerusakan where kd_kerusakan='$rh[kd_kerusakan]'");
    $rhp = mysql_fetch_array($sqlhp);

    $sqlhg = mysql_query("select * from hasil_konsultasi,konsultasi where hasil_konsultasi.no_konsul=konsultasi.no_konsul
      and hasil_konsultasi.no_konsul='$rh[no_konsul]'
      and konsultasi.no_konsul='$rh[no_konsul]'");

    $gejala =array();

    while($rhg = mysql_fetch_array($sqlhg)){


   $namagejala = mysql_query("select * from gejala where kd_gejala='$rhg[kd_gejala]'");
   $rng=mysql_fetch_array($namagejala);

      $gejala[] = $rng['nama_gejala'];
    }

  echo "<tr>
    <td >$no</td>
    <td>Tidak Terindikasi kerusakan</td>
    <td>- ".implode('<br>- ',$gejala)."</td>
    <td>$rh[max]</td>
    <td>$tgl-$bln-$thn    ( $jam )</td>
    <td align='center'>----</td>
  </tr>";

  $no++;
}
}
?>

</tbody>

</table>
 </div>

 <p align="right">  <button class="btn btn-success" value="Scroll Top" id="tombolScrollTop" onclick="scrolltotop()"><span class='glyphicon glyphicon-arrow-up'></span></button>
</p>

<script>

     function scrolltotop()
     {
       $('html, body').animate({scrollTop : 0},500);
     }


     </script>
