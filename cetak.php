<?php session_start(); ?>

<style type="text/css">
body{
	font-family:Arial;
	font-size:13px;
}
</style>

<?php
include "koneksi.php";

$no_konsul=$_GET['no_konsul'];

$sqlm = mysql_query("select * from member where username='$_SESSION[usermbr]'");
$rm = mysql_fetch_array($sqlm);
$sqlu = mysql_query("SELECT YEAR(curdate()) - YEAR(tgl_lahir) AS umur FROM member where username='$_SESSION[usermbr]'");
$ru = mysql_fetch_array($sqlu);
?>

<body onLoad="window.print();window.closeoff()" >
<fieldset>
<h3>SISTEM PAKAR KERUSAKAN MOTOR VARIO 125</h3>
<fieldset>
NO KONSULTASI : <big><b><?php echo "$no_konsul"; ?></b></big>
</fieldset>
<fieldset>
<h3>DATA MEMBER</h3>
<p>Nama Lengkap<br>
<big><?php echo "$rm[nama]";?></big></p>
<p>UMUR<br>
<big><?php echo "$ru[umur]";?></big></p>
<p>Alamat<br>
<big><?php echo "$rm[alamat]";?></big></p>

</fieldset>

<fieldset>
<h3>DATA DIAGNOSA</h3>
<table class="" border="1" cellpadding="5" cellspacing="0" width="100%" border="1" align="center">
<thead>
    <tr>
      <th colspan="3" align="center" bgcolor="#CCCCCC"><strong> Gejala Yang Anda Miliki Adalah :</strong></th>
  </tr>
</thead>
<tbody>

<?php
  $no=1;
  $strsqlku= mysql_query("select * from konsultasi where id_member=$rm[id_member] and no_konsul='$_GET[no_konsul]'");
  while($row=mysql_fetch_array($strsqlku)){
  $strsqlku2 = mysql_query("select * from gejala where kd_gejala='$row[kd_gejala]'");
  while($row2= mysql_fetch_array($strsqlku2)){

  echo "<tr>";
  echo    "<td width='5%'>$no</td>";
  echo    "<td width='50%'>$row2[nama_gejala]</td>";
  echo    "<td width='50%'>Nilai Kepastian Gejala : $row[cf]</td>";
  echo"</tr>";


  $no++;

}

}

?>
</tbody>
</table>
<?php

$sqlh = mysql_query("select * from hasil_konsultasi where id_member='$rm[id_member]' and no_konsul='$_GET[no_konsul]'");
while($rh = mysql_fetch_array($sqlh)){

		$angka= $rh['max'];


    $sqlhp = mysql_query("select * from kerusakan where kd_kerusakan='$rh[kd_kerusakan]'");
    $rhp = mysql_fetch_array($sqlhp);

  }
?>
<table cellpadding="5" cellspacing="0" width='100%' border='1' align='center'>
<thead>
    <tr>
      <th colspan='3' align='center' bgcolor='#CCCCCC'><strong> KESIMPULAN</strong></th>
  </tr>
</thead>
<tbody>
  <tr>
    <td>Kemungkinan Motor Vario 125 anda terindikasi   : <?php echo "$rhp[nama_kerusakan]";  ?> <?php echo "$angka %"; ?></td>
</tr>
</tbody>
</table>

</fieldset>
<fieldset>
&copy; SISTEM PAKAR KERUSAKAN MOTOR VARIO 125
</fieldset>
</body>
</fieldset>
