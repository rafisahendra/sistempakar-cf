<?php include "koneksi.php";
//$coba= mysql_query("select max(cf) as cfmax from hasil_konsultasi where id_member'$_GET[idh]'");
//while($cobaa = mysql_fetch_array($coba)){
//$cfmax=$cobaa['cfmax'];

//}
// $qno_konsul=mysql_query("select max(no_konsul) as max_no from konsultasi");
//$array_max_no= mysql_fetch_array($qno_konsul);

$sqlh = mysql_query("select * from hasil_konsultasi where id_member='$_GET[idh]'  order by no_konsul desc");

?>

<div >
<a href='?r=hasilkonsultasi'class='btn btn-success' > <span class='glyphicon glyphicon-circle-arrow-left'></span>Back</a>
</div>
<div class="table-responsive">
<table class="table table-hover table-sm table-bordered" >
<thead class="bg-primary" >
<tr id="thpo">
  <th width='5%' class="text-center" rowspan="2">NO</th>
  <th class="text-center" rowspan="2">GEJALA</th>
  <th class="text-center" colspan="4" >CF</th>
  <th width='10%' class="text-center" rowspan="2">HASIL AKHIR</th>
  <th width='19%' class="text-center" rowspan="2">KERUSAKAN</th>
  <th width='10%' class="text-center" rowspan="2">WAKTU KONSULTASI</th>
</tr>
<tr  id="thpo">
  <th width='10%' class="text-center">P01</th>
  <th width='10%' class="text-center">P02</th>
  <th width='10%' class="text-center">P03</th>
  <th width='10%' class="text-center">P04</th>
</tr>
 </thead>

 <tbody class="">
 <?php

 $no = 1;
while($rh = mysql_fetch_array($sqlh)){
  $tgl = substr($rh["waktu"],8,2);
  $bln = substr($rh["waktu"],5,2);
  $thn = substr($rh["waktu"],0,4);
  $jam = substr($rh["waktu"],11,5);

  //  $sqlp1=mysql_query("select * from hasil_konsultasi where kd_kerusakan='P01' and no_konsul='$rh[no_konsul]'");
  //  $rp1=mysql_fetch_array($sqlp1);
  //  $sqlp2=mysql_query("select * from hasil_konsultasi where kd_kerusakan='P02' and no_konsul='$rh[no_konsul]'");
  //  $rp2=mysql_fetch_array($sqlp2);
  //  $sqlp3=mysql_query("select * from hasil_konsultasi where kd_kerusakan='P03' and no_konsul='$rh[no_konsul]'");
  //  $rp3=mysql_fetch_array($sqlp3);
  //  $sqlp4=mysql_query("select * from hasil_konsultasi where kd_kerusakan='P04' and no_konsul='$rh[no_konsul]'");
  //  $rp4=mysql_fetch_array($sqlp4);
  //  $sqlpakhir=mysql_query("select distinct(no_konsul) from hasil_konsultasi" );
  //  $rpakhir=mysql_fetch_array($sqlpakhir);

    $cekmax=$rh['max'];
    // var_dump($cekmax);exit;
    if($cekmax>0){

            $sqlhp = mysql_query("select * from kerusakan where kd_kerusakan='$rh[kd_kerusakan]'");
            $rhp = mysql_fetch_array($sqlhp);

            $sqlhg = mysql_query("select * from hasil_konsultasi,konsultasi where hasil_konsultasi.no_konsul=konsultasi.no_konsul
              and hasil_konsultasi.no_konsul='$rh[no_konsul]'
              and konsultasi.no_konsul='$rh[no_konsul]' ");

            $gejala =array();
            while($rhg = mysql_fetch_array($sqlhg)){
              $gejala[] = $rhg['kd_gejala'];
            }


        $r1=$rh["cf1"];
        $r2=$rh["cf2"];
        $r3=$rh["cf3"];
        $r4=$rh["cf4"];

        $r11=$r1*100;
        $r22=$r2*100;
        $r33=$r3*100;
        $r44=$r4*100;

          echo "<tr>
           <td >$no</td>
           <td>".implode(', ',$gejala)."</td>
           <td>$r11%</td>
           <td>$r22%</td>
           <td>$r33%</td>
           <td>$r44%</td>
           <td>$rh[max]%</td>
           <td>$rhp[nama_kerusakan]</td>
           <td>$tgl-$bln-$thn    ( $jam )</td>



         </tr>";

  $no++;

}else{



        $sqlhp = mysql_query("select * from kerusakan where kd_kerusakan='$rh[kd_kerusakan]'");
        $rhp = mysql_fetch_array($sqlhp);

        $sqlhg = mysql_query("select * from hasil_konsultasi,konsultasi where hasil_konsultasi.no_konsul=konsultasi.no_konsul
          and hasil_konsultasi.no_konsul='$rh[no_konsul]'
          and konsultasi.no_konsul='$rh[no_konsul]' ");

        $gejala =array();
        while($rhg = mysql_fetch_array($sqlhg)){
          $gejala[] = $rhg['kd_gejala'];
        }


        $r1=$rh["cf1"];
        $r2=$rh["cf2"];
        $r3=$rh["cf3"];
        $r4=$rh["cf4"];

        $r11=$r1*100;
        $r22=$r2*100;
        $r33=$r3*100;
        $r44=$r4*100;

        echo "<tr>
        <td >$no</td>
        <td>".implode(', ',$gejala)."</td>
        <td>$r11%</td>
        <td>$r22%</td>
        <td>$r33%</td>
        <td>$r44%</td>
        <td>$rh[max]%</td>
        <td>Tidak Terindikasi kerusakan</td>
        <td>$tgl-$bln-$thn    ( $jam )</td>



        </tr>";

        $no++;
}
}
?>

</tbody>

 </table> </div>
 </div>
 </div>
