
<?php
$sqlm = mysql_query("select * from member where username='$_SESSION[usermbr]'");
$rm = mysql_fetch_array($sqlm);
$idmember=$rm['id_member'];

$no_konsul=$_GET['no_konsul'];
?>

<center style="font-family:GreyscaleBasic;font-weight:bold;">
    <font size="6" color="black">Hasil Konsultasi</font>

        <div class="panel panel-default">
            <div align="center">
<?php

include "koneksi.php";



//untuk mengambil nama dari gejala dari tabel konsultasi
$strsqlku="select * from konsultasi where id_member=$rm[id_member] and no_konsul=$no_konsul";
$hasil=mysql_query($strsqlku);
$no=1;
?>

  <p></p>
<table class="table table-hover table-sm table-bordered" width="100%" border="1" align="center">
  <tr>
      <td colspan="3" align="center" bgcolor="#CCCCCC"><strong> Gejala Yang Anda Miliki Adalah :</strong></td>
  </tr>
</table>
  </div>
<?php

          while($row=mysql_fetch_array($hasil))
          {
            //mengambil nama gejala
          $strsqlku2 = mysql_query("select * from gejala where kd_gejala='$row[kd_gejala]'");
          while($row2=mysql_fetch_array($strsqlku2)){


            echo"<div class='table-responsive'>";
          echo "<table class='table table-hover table-sm table-bordered align='center'>";
          echo "<tr>";
          echo    "<td width='5%'>$no</td>";
          echo    "<td width='7%'>$row2[kd_gejala]</td>";
          echo    "<td width='50%'>$row2[nama_gejala]</td>";
          echo    "<td width='50%'>Nilai Kepastian Gejala : $row[cf]</td>";
          echo"</tr>";
          echo "</table>";
          echo"</div>";

          $no++;
          }
          }


echo"</tr>";
$g01=mysql_num_rows(mysql_query("SELECT * FROM konsultasi where  kd_gejala='G01' and no_konsul='$_GET[no_konsul]'"));
$g02=mysql_num_rows(mysql_query("SELECT * FROM konsultasi where  kd_gejala='G02' and no_konsul='$_GET[no_konsul]'"));
$g03=mysql_num_rows(mysql_query("SELECT * FROM konsultasi where  kd_gejala='G03' and no_konsul='$_GET[no_konsul]'"));
$g04=mysql_num_rows(mysql_query("SELECT * FROM konsultasi where  kd_gejala='G04' and no_konsul='$_GET[no_konsul]'"));
$g06=mysql_num_rows(mysql_query("SELECT * FROM konsultasi where  kd_gejala='G06' and no_konsul='$_GET[no_konsul]'"));
$g07=mysql_num_rows(mysql_query("SELECT * FROM konsultasi where  kd_gejala='G07' and no_konsul='$_GET[no_konsul]'"));
$g08=mysql_num_rows(mysql_query("SELECT * FROM konsultasi where  kd_gejala='G08' and no_konsul='$_GET[no_konsul]'"));
$g05=mysql_num_rows(mysql_query("SELECT * FROM konsultasi where  kd_gejala='G05' and no_konsul='$_GET[no_konsul]'"));
$g09=mysql_num_rows(mysql_query("SELECT * FROM konsultasi where  kd_gejala='G09' and no_konsul='$_GET[no_konsul]'"));
$g10=mysql_num_rows(mysql_query("SELECT * FROM konsultasi where  kd_gejala='G10' and no_konsul='$_GET[no_konsul]'"));
$g11=mysql_num_rows(mysql_query("SELECT * FROM konsultasi where  kd_gejala='G11' and no_konsul='$_GET[no_konsul]'"));
$g12=mysql_num_rows(mysql_query("SELECT * FROM konsultasi where  kd_gejala='G12' and no_konsul='$_GET[no_konsul]'"));
$g13=mysql_num_rows(mysql_query("SELECT * FROM konsultasi where  kd_gejala='G13' and no_konsul='$_GET[no_konsul]'"));
$g14=mysql_num_rows(mysql_query("SELECT * FROM konsultasi where  kd_gejala='G14' and no_konsul='$_GET[no_konsul]'"));
$g15=mysql_num_rows(mysql_query("SELECT * FROM konsultasi where  kd_gejala='G15' and no_konsul='$_GET[no_konsul]'"));



//rule
//RULE 1	IF G1 AND G2 AND G4 THEN P1 (0,85)
if(($g01 > 0)&& ($g02 > 0) && ($g03 > 0) ){

  $cfp11 = mysql_fetch_array(mysql_query("SELECT * FROM konsultasi where kd_gejala='G01'and no_konsul='$_GET[no_konsul]'"));
  $cfp12 = mysql_fetch_array(mysql_query("SELECT * FROM konsultasi where kd_gejala='G02'and no_konsul='$_GET[no_konsul]'"));
  $cfp14 = mysql_fetch_array(mysql_query("SELECT * FROM konsultasi where kd_gejala='G03'and no_konsul='$_GET[no_konsul]'"));


  $nilai11 = $cfp11['cf'];
  $nilai12 = $cfp12['cf'];
  $nilai13 = $cfp14['cf'];

  $min = min($nilai11,$nilai12,$nilai13);
  $hasil11 = $min*0.85;



  //mysql_query("insert into hasil_cfrule (no_konsul,id_rule,id_member,cf) values ('$no_konsul','1','$idmember','$hasil11')");

}

//RULE 2	IF G1 AND G2 AND G5 THEN P1 (0,7)
if(($g01 > 0)&&($g02 > 0) && ($g05 > 0) ){

  $cfp21 = mysql_fetch_array(mysql_query("SELECT * FROM konsultasi where kd_gejala='G01'and no_konsul='$_GET[no_konsul]'"));
  $cfp22 = mysql_fetch_array(mysql_query("SELECT * FROM konsultasi where kd_gejala='G02'and no_konsul='$_GET[no_konsul]'"));
  $cfp25 = mysql_fetch_array(mysql_query("SELECT * FROM konsultasi where kd_gejala='G05'and no_konsul='$_GET[no_konsul]'"));


  $nilai21 = $cfp21['cf'];
  $nilai22 = $cfp22['cf'];
  $nilai25 = $cfp25['cf'];

  $min = min($nilai21,$nilai22,$nilai25);
  $hasil12 = $min*0.7;


  //mysql_query("insert into hasil_cfrule (no_konsul,id_rule,id_member,cf)values('$no_konsul','2','$idmember','$hasil12')");


}

//RULE 3	IF G1 AND G3 AND G5 THEN P1 (0,6)
if(($g01 > 0) && ($g03 > 0) && ($g05 > 0)){


$cfp31 = mysql_fetch_array(mysql_query("SELECT * FROM konsultasi where kd_gejala='G01'and no_konsul='$_GET[no_konsul]'"));
$cfp33 = mysql_fetch_array(mysql_query("SELECT * FROM konsultasi where kd_gejala='G03'and no_konsul='$_GET[no_konsul]'"));
$cfp35 = mysql_fetch_array(mysql_query("SELECT * FROM konsultasi where kd_gejala='G05'and no_konsul='$_GET[no_konsul]'"));



$nilai31 = $cfp31['cf'];
$nilai33 = $cfp33['cf'];
$nilai35 = $cfp35['cf'];

$min = min($nilai31,$nilai33,$nilai35);
$hasil13 = $min*0.6;



//mysql_query("insert into hasil_cfrule (no_konsul,id_rule,id_member,cf)values('$no_konsul','3','$idmember','$hasil13')");

}

//RULE 4	IF G3 AND G4 AND G5 THEN P1 (0,55)
		if(($g02 > 0) && ($g03 > 0) && ($g04 > 0)){
			$cfp43 = mysql_fetch_array(mysql_query("SELECT * FROM konsultasi where kd_gejala='G02'and no_konsul='$_GET[no_konsul]'"));
			$cfp44 = mysql_fetch_array(mysql_query("SELECT * FROM konsultasi where kd_gejala='G03'and no_konsul='$_GET[no_konsul]'"));
			$cfp45 = mysql_fetch_array(mysql_query("SELECT * FROM konsultasi where kd_gejala='G04'and no_konsul='$_GET[no_konsul]'"));

			$nilai43 = $cfp43['cf'];
			$nilai44 = $cfp44['cf'];
			$nilai45 = $cfp45['cf'];

			$min = min($nilai43,$nilai44,$nilai45);
			$hasil14 = $min*0.55;



			//mysql_query("insert into hasil_cfrule (no_konsul,id_rule,id_member,cf)values('$no_konsul','4','$idmember','$hasil14')");
		}

//RULE 5 	IF G6 AND G7 AND G8 THEN P2 (0,8)
		if(($g06 > 0) && ($g07 > 0) && ($g08 > 0)){
			$cfp56 = mysql_fetch_array(mysql_query("SELECT * FROM konsultasi where kd_gejala='G06'and no_konsul='$_GET[no_konsul]'"));
			$cfp57 = mysql_fetch_array(mysql_query("SELECT * FROM konsultasi where kd_gejala='G07'and no_konsul='$_GET[no_konsul]'"));
			$cfp58 = mysql_fetch_array(mysql_query("SELECT * FROM konsultasi where kd_gejala='G08'and no_konsul='$_GET[no_konsul]'"));

			$nilai56 = $cfp56['cf'];
			$nilai57 = $cfp57['cf'];
			$nilai58 = $cfp58['cf'];

			$min = min($nilai56,$nilai57,$nilai58);
			$hasil15 = $min*0.8;



			//mysql_query("insert into hasil_cfrule (no_konsul,id_rule,id_member,cf)values('$no_konsul','5','$idmember','$hasil15')");
		}

//RULE 6	IF G6 AND G7 THEN P2(0,7)
		if(($g06 > 0)  && ($g07 > 0)){
			$cfp66 = mysql_fetch_array(mysql_query("SELECT * FROM konsultasi where kd_gejala='G06'and no_konsul='$_GET[no_konsul]'"));
			$cfp67 = mysql_fetch_array(mysql_query("SELECT * FROM konsultasi where kd_gejala='G07'and no_konsul='$_GET[no_konsul]'"));

			$nilai66 = $cfp66['cf'];
			$nilai67 = $cfp67['cf'];

			$min = min($nilai66,$nilai67);
			$hasil16 = $min*0.7;



      //mysql_query("insert into hasil_cfrule (no_konsul,id_rule,id_member,cf)values('$no_konsul','6','$idmember','$hasil16')");
    }

//RULE 7	IF G6 AND G8 AND G9 THEN P2 (0,7)
		if(($g06 > 0) && ($g08 > 0)&& ($g09 > 0)){

			$cfp76 = mysql_fetch_array(mysql_query("SELECT * FROM konsultasi where kd_gejala='G06'and no_konsul='$_GET[no_konsul]'"));
			$cfp78 = mysql_fetch_array(mysql_query("SELECT * FROM konsultasi where kd_gejala='G08'and no_konsul='$_GET[no_konsul]'"));
			$cfp79 = mysql_fetch_array(mysql_query("SELECT * FROM konsultasi where kd_gejala='G09'and no_konsul='$_GET[no_konsul]'"));


			$nilai76 = $cfp76['cf'];
			$nilai78 = $cfp78['cf'];
			$nilai79 = $cfp79['cf'];


			$min = min($nilai76,$nilai78,$nilai79);
			$hasil17 = $min*0.7;


      //mysql_query("insert into hasil_cfrule (no_konsul,id_rule,id_member,cf)values('$no_konsul','7','$idmember','$hasil17')");
    }

//RULE 8 IF G10 AND G11 AND G12 THEN K03(0.8)
    if(($g10 > 0) && ($g11 > 0)&& ($g12 > 0)){

      $cfp810 = mysql_fetch_array(mysql_query("SELECT * FROM konsultasi where kd_gejala='G10'and no_konsul='$_GET[no_konsul]'"));
      $cfp811 = mysql_fetch_array(mysql_query("SELECT * FROM konsultasi where kd_gejala='G11'and no_konsul='$_GET[no_konsul]'"));
      $cfp812 = mysql_fetch_array(mysql_query("SELECT * FROM konsultasi where kd_gejala='G12'and no_konsul='$_GET[no_konsul]'"));


      $nilai810 = $cfp810['cf'];
      $nilai811 = $cfp811['cf'];
      $nilai812 = $cfp812['cf'];


      $min = min($nilai810,$nilai811,$nilai812);
      $hasil18 = $min*0.8;


      //mysql_query("insert into hasil_cfrule (no_konsul,id_rule,id_member,cf)values('$no_konsul','8','$idmember','$hasil18')");
    }

//RULE 9	IF G10 AND G11 THEN K03 (0,5)
		if(($g10 > 0)&& ($g11 > 0)){
			$cfp910 = mysql_fetch_array(mysql_query("SELECT * FROM konsultasi where kd_gejala='G10'and no_konsul='$_GET[no_konsul]'"));
			$cfp911 = mysql_fetch_array(mysql_query("SELECT * FROM konsultasi where kd_gejala='G11'and no_konsul='$_GET[no_konsul]'"));


			$nilai910 = $cfp910['cf'];
			$nilai911 = $cfp911['cf'];


			$min = min($nilai910,$nilai911);
			$hasil19 = $min*0.5;


      //mysql_query("insert into hasil_cfrule (no_konsul,id_rule,id_member,cf)values('$no_konsul','9','$idmember','$hasil19')");
    }

//RULE 10	IF G10 AND G12 THEN P3 (0,75)
			if(($g09 > 0) && ($g10 > 0)){

			$cfp1010 = mysql_fetch_array(mysql_query("SELECT * FROM konsultasi where kd_gejala='G09'and no_konsul='$_GET[no_konsul]'"));
			$cfp1012 = mysql_fetch_array(mysql_query("SELECT * FROM konsultasi where kd_gejala='G10'and no_konsul='$_GET[no_konsul]'"));

			$nilai1010 = $cfp1010['cf'];
			$nilai1012 = $cfp1012['cf'];

			$min = min($nilai1010,$nilai1012);
			$hasil110 = $min*0.75;



      //mysql_query("insert into hasil_cfrule (no_konsul,id_rule,id_member,cf)values('$no_konsul','10','$idmember','$hasil110')");
    }

//RULE 11	IF G13 AND G14 AND G15 THEN P4 (0,8)
    		if(($g13 > 0) && ($g14 > 0)&& ($g15 > 0)){

    			$cfp1113 = mysql_fetch_array(mysql_query("SELECT * FROM konsultasi where kd_gejala='G13'and no_konsul='$_GET[no_konsul]'"));
          $cfp1114 = mysql_fetch_array(mysql_query("SELECT * FROM konsultasi where kd_gejala='G14'and no_konsul='$_GET[no_konsul]'"));
          $cfp1115 = mysql_fetch_array(mysql_query("SELECT * FROM konsultasi where kd_gejala='G15'and no_konsul='$_GET[no_konsul]'"));

    			$nilai1113 = $cfp1113['cf'];
          $nilai1114 = $cfp1114['cf'];
    			$nilai1115 = $cfp1115['cf'];

    			$min = min($nilai1113,$nilai1114,$nilai1115);
    			$hasil111 = $min*0.8;



          //mysql_query("insert into hasil_cfrule (no_konsul,id_rule,id_member,cf)values('$no_konsul','11','$idmember','$hasil111')");
        }

//RULE 12	IF G13 AND G15 THEN P4 (0,7)
		if(($g13 > 0) && ($g15 > 0)){

			$cfp1213 = mysql_fetch_array(mysql_query("SELECT * FROM konsultasi where kd_gejala='G13'and no_konsul='$_GET[no_konsul]'"));
			$cfp1215 = mysql_fetch_array(mysql_query("SELECT * FROM konsultasi where kd_gejala='G15'and no_konsul='$_GET[no_konsul]'"));

			$nilai1213 = $cfp1213['cf'];
			$nilai1215 = $cfp1215['cf'];

			$min = min($nilai1213,$nilai1215);
			$hasil112 = $min*0.7;



      //mysql_query("insert into hasil_cfrule (no_konsul,id_rule,id_member,cf)values('$no_konsul','12','$idmember','$hasil112')");
    }

//RULE 13	IF G13 AND G14 THEN P4 (0,6)
		if(($g13 > 0) && ($g14 > 0)){

			$cfp1313 = mysql_fetch_array(mysql_query("SELECT * FROM konsultasi where kd_gejala='G13'and no_konsul='$_GET[no_konsul]'"));
			$cfp1314 = mysql_fetch_array(mysql_query("SELECT * FROM konsultasi where kd_gejala='G14'and no_konsul='$_GET[no_konsul]'"));

			$nilai1313 = $cfp1313['cf'];
			$nilai1314 = $cfp1314['cf'];

			$min = min($nilai1313,$nilai1314);
			$hasil113 = $min*0.5;


      //mysql_query("insert into hasil_cfrule (no_konsul,id_rule,id_member,cf)values('$no_konsul','13','$idmember','$hasil113')");
    }

    //p1 :h1,h2,h3,h4
    //p2 :h5,h6,h7
    //p3 :h8,h9,h10
    //p4 :h11,h12,h13

    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

    $h1=$hasil11;
		$h2=$hasil12;
		$h3=$hasil13;
		$h4=$hasil14;
		$h5=$hasil15;
		$h6=$hasil16;
		$h7=$hasil17;
		$h8=$hasil18;
		$h9=$hasil19;
		$h10=$hasil110;
		$h11=$hasil111;
  	$h12=$hasil112;
    $h13=$hasil113;

//penggabungan hasil cf
//K01 --> h1

//penggabungan hasil cf
//K01 --> 4 proses

    if(($h1>0)&& ($h2>0)&& ($h3>0)&& ($h4>0)){
      $h1rule = $h1 + ($h2*(1-$h1));
      $h11rule= $h1rule + ($h3*(1-$h1rule));
      $h111rule= $h11rule + ($h4*(1-$h11rule));
      $h1akhir= $h111rule;

    }

  //p1 --> 3 proses dimulai h1
    else if(($h1>0)&&($h2>0)&&($h3>0)){
      $h1rule = $h1 + ($h2*(1-$h1));
      $h11rule= $h1rule + ($h3*(1-$h1rule));
      $h1akhir=$h11rule;
    }
    else if(($h1>0)&&($h2>0)&&($h4>0)){
      $h1rule = $h1 + ($h2*(1-$h1));
      $h11rule= $h1rule + ($h4*(1-$h1rule));
      $h1akhir=$h11rule;
    }


      else if(($h1>0)&&($h3>0)&&($h4>0)){
      $h1rule = $h1 + ($h3*(1-$h1));
      $h11rule= $h1rule + ($h4*(1-$h1rule));
      $h1akhir=$h11rule;
    }

    //p1--> 3 proses dimulai h2

    else if(($h2>0)&&($h3>0)&&($h4>0)){
      $h1rule = $h2 + ($h3*(1-$h1));
      $h11rule= $h1rule + ($h4*(1-$h1rule));
      $h1akhir=$h11rule;
    }

  //p1--> 2 proses dimulai h1
    elseif(($h1>0) && ($h2>0)){
      $h1rule = $h1 + ($h2*(1-$h1));
      $h1akhir=$h1rule;
    }
    elseif(($h1>0)&&($h3>0)){
      $h1rule = $h1 + ($h3*(1-$h1));
      $h1akhir=$h1rule;
    }
    elseif(($h1>0)&&($h4>0)){
      $h1rule = $h1 + ($h4*(1-$h1));
      $h1akhir=$h1rule;
    }

  //p1--> 2 proses dimulai h2

      else if(($h2>0)&&($h3>0)){
        $h1rule = $h2 + ($h3*(1-$h2));
        $h1akhir=$h1rule;
      }
      else if(($h2>0)&&($h4>0)){
        $h1rule = $h2 + ($h4*(1-$h2));
        $h1akhir=$h1rule;
      }

    //p1--> 2 proses dimulai h3

      else if(($h3>0)&&($h4>0)){
        $h1rule = $h3 + ($h4*(1-$h3));
        $h1akhir=$h1rule;
      }

    //K01 --> 1 proses semuanya
      else if($h1>0){
        $h1akhir=$h1;
      }
      else if($h2>0){
          $h1akhir=$h2;
        }
      else if($h3>0){
        $h1akhir=$h3;
      }
      else if($h4>0){
        $h1akhir=$h4;
      }
      else{
          $h1akhir=0;
      }


//K02 --> h5 3 proses
    if(($h5>0)&&($h6>0)&&($h7>0)){
        $h2rule = $h5 + ($h6*(1-$h5));
        $h22rule= $h2rule + ($h7*(1-$h2rule));
        $h2akhir=$h22rule;
      }

//K02 --> h5 2 proses
      else if(($h5>0)&&($h6>0)){
        $h2rule = $h5 + ($h6*(1-$h5));
        $h2akhir=$h2rule;
      }
      else if(($h5>0)&&($h7>0)){
        $h2rule = $h5 + ($h7*(1-$h5));
        $h2akhir=$h2rule;
      }


//K02 --> h6 2 proses

      else if(($h6>0)&&($h7>0)){
        $h2rule = $h6 + ($h7*(1-$h6));
        $h2akhir=$h2rule;
      }
//K02 --> h7--> 1 proses semuanya
      else if($h5>0){
        $h2akhir=$h5;
      }
      else if($h6>0){
          $h2akhir=$h6;
      }
      else if($h7>0){
        $h2akhir=$h7;
      }

      else{
          $h2akhir=0;
      }

//K03--> H8 3 proses
  if(($h8>0)&&($h9>0)&&($h10>0)){
      $h3rule = $h8 + ($h9*(1-$h8));
      $h33rule= $h3rule + ($h10*(1-$h3rule));
      $h3akhir=$h33rule;
    }


//K03--> h8 2 proses
     else if(($h8>0)&&($h9>0)){
        $h3rule = $h8 + ($h9*(1-$h8));
        $h3akhir=$h3rule;
      }
      else if(($h8>0)&&($h10>0)){
        $h3rule = $h8 + ($h10*(1-$h8));
        $h3akhir=$h3rule;
       }
//K03--> h9 2 proses
      else if(($h9>0)&&($h10>0)){
        $h3rule = $h9 + ($h10*(1-$h9));
        $h3akhir=$h3rule;
      }
//K03 --> h9 smua proses
      else if($h8>0){
      $h3akhir=$h8;
      }
      else if($h9>0){
        $h3akhir=$h9;
      }
      else if($h10>0){
        $h3akhir=$h10;
      }
      else{
          $h3akhir=0;
      }

//K04--> h11 3 proses
      if(($h11>0)&&($h12>0)&&($h13>0)){
          $h4rule = $h11 + ($h12*(1-$h11));
          $h44rule= $h4rule + ($h13*(1-$h4rule));
          $h4akhir=$h44rule;
        }


//K04 --> h11 2 proses

     else if(($h11>0)&&($h12>0)){
        $h4rule = $h11 + ($h12*(1-$h11));
        $h4akhir=$h4rule;
      }
      else if(($h11>0)&&($h13>0)){
         $h4rule = $h11 + ($h13*(1-$h11));
         $h4akhir=$h4rule;
       }

 //K04 --> h12 2 proses

      else if(($h12>0)&&($h13>0)){
         $h4rule = $h12 + ($h13*(1-$h12));
         $h4akhir=$h4rule;
       }
//K04 --> h11
      else if($h11>0){
        $h4akhir=$h11;
      }
      else if($h12>0){
        $h4akhir=$h12;
      }
      else if($h13>0){
        $h4akhir=$h13;
      }
      else{
          $h4akhir=0;
      }

      $h1rulef = number_format($h1rule, 3, '.', '');
      $h11rulef = number_format($h11rule, 3, '.', '');
      $h111rulef = number_format($h111rule, 3, '.', '');
      $h2rulef = number_format($h2rule, 3, '.', '');
      $h22rulef = number_format($h22rule, 3, '.', '');
      $h3rulef = number_format($h3rule, 3, '.', '');
      $h33rulef = number_format($h33rule, 3, '.', '');
      $h4rulef = number_format($h4rule, 3, '.', '');
      $h44rulef = number_format($h44rule, 3, '.', '');

      $h1akhirf= number_format($h1akhir, 3, '.', '');
      $h2akhirf= number_format($h2akhir, 3, '.', '');
      $h3akhirf= number_format($h3akhir, 3, '.', '');
      $h4akhirf= number_format($h4akhir, 3, '.', '');


      $h1hasilakhir = $h1akhir;
      $h2hasilakhir = $h2akhir;
      $h3hasilakhir = $h3akhir;
      $h4hasilakhir = $h4akhir;

      $htotal=max($h1hasilakhir,$h2hasilakhir,$h3hasilakhir,$h4hasilakhir);

      $htotalpersen=$htotal*100;

      $hakhir = number_format($htotalpersen, 2, '.', '');

    echo "<table class='table table-hover table-sm table-bordered'>";
    echo "    <thead >";
    echo"  <tr id='thpokesimpulan'>";
    echo"    <th class='text-center'>KESIMPULAN</th>";

    echo"   </tr>";
    echo"   </thead>";
    echo"   <tbody class='bg-success'>";
    echo"  <tr>";
    echo"<td align='center'>";

    $sqlpen = mysql_query("select * from kerusakan order by id_kerusakan asc");
    $rpen = mysql_fetch_array($sqlpen);
    $penanggulangan=$rpen['penanggulangan'];

  //  mysql_query("insert into hasil_konsultasi (no_konsul,id_member,kd_kerusakan,cf,waktu)values('$no_konsul','$idmember','K01','$h1akhirf',NOW())");
  //  mysql_query("insert into hasil_konsultasi (no_konsul,id_member,kd_kerusakan,cf,waktu)values('$no_konsul','$idmember','K02','$h2akhirf',NOW())");
  //  mysql_query("insert into hasil_konsultasi (no_konsul,id_member,kd_kerusakan,cf,waktu)values('$no_konsul','$idmember','K03','$h3akhirf',NOW())");
  //  mysql_query("insert into hasil_konsultasi (no_konsul,id_member,kd_kerusakan,cf,waktu)values('$no_konsul','$idmember','K04','$h4akhirf',NOW())");

   if($htotal==0){  echo "Motor Vario 125 Anda Tidak terindikasi kerusakan ";
                    mysql_query("insert into hasil_konsultasi (no_konsul,id_member,kd_kerusakan,cf1,cf2,cf3,cf4,max,waktu)values('$no_konsul','$idmember','', '', '', '', '', '',NOW())");


   }else{
     if($htotal==$h1hasilakhir){
       echo" Kemungkinan Motor Vario 125 Anda Terindikasi kerusakan Accu Low : $hakhir %";
       mysql_query("insert into hasil_konsultasi (no_konsul,id_member,kd_kerusakan,cf1,cf2,cf3,cf4,max,waktu)values('$no_konsul','$idmember','K01', '$h1akhirf', '$h2akhirf', '$h3akhirf', '$h4akhirf', '$hakhir',NOW())");
       echo"<br>";
       echo"<br>";
       $sqlpen = mysql_query("select * from kerusakan where kd_kerusakan='K01'");
       $rpen = mysql_fetch_array($sqlpen);
       $ket = $rpen['keterangan'];
       $penanggulangan=$rpen['penanggulangan'];
       echo"<br>";
       echo"<br>";
       echo"<p align='justify'>";
       echo"$ket";
       echo"</p>";
       echo"<br>";
       echo"Beberapa Penanggulangan yang dapat dilakukan :  $penanggulangan ";
       echo"<br><br>";
       echo"<a href='cetak.php?&no_konsul=$no_konsul' target='_blank'><button type='button' id='btn-cetak' class='btn'> CETAK</button></a>";
     }
     else if($htotal==$h2hasilakhir){
       echo" Kemungkinan Motor vario 125 Anda Terindikasi  Radiator Bocor atau Rusak  : $hakhir %";
       mysql_query("insert into hasil_konsultasi (no_konsul,id_member,kd_kerusakan,cf1,cf2,cf3,cf4,max,waktu)values('$no_konsul','$idmember','K02','$h1akhirf','$h2akhirf','$h3akhirf','$h4akhirf','$hakhir',NOW())");
       $sqlpen = mysql_query("select * from kerusakan where kd_kerusakan='K02'");
       $rpen = mysql_fetch_array($sqlpen);
       $ket = $rpen['keterangan'];
       $penanggulangan=$rpen['penanggulangan'];
       echo"<br>";
       echo"<br>";
       echo"<p align='justify'>";
       echo"$ket";
       echo"</p>";
           echo"<br>";
      echo"Beberapa Penanggulangan yang dapat dilakukan :  $penanggulangan ";
      echo"<br><br>";
      echo"<a href='cetak.php?&no_konsul=$no_konsul' target='_blank'><button type='button' id='btn-cetak' class='btn'> CETAK</button></a>";
     }
     else if($htotal==$h3hasilakhir){
       echo" Kemungkinan Motor vario 125 Anda Starter Motor Rusak : $hakhir %";
       mysql_query("insert into hasil_konsultasi (no_konsul,id_member,kd_kerusakan,cf1,cf2,cf3,cf4,max,waktu)values('$no_konsul','$idmember','K03','$h1akhirf','$h2akhirf','$h3akhirf','$h4akhirf','$hakhir',NOW())");
       $sqlpen = mysql_query("select * from kerusakan where kd_kerusakan='K03'");
       $rpen = mysql_fetch_array($sqlpen);
       $ket = $rpen['keterangan'];
       $penanggulangan=$rpen['penanggulangan'];
       echo"<br>";
       echo"<br>";
       echo"<p align='justify'>";
       echo"$ket";
       echo"</p>";
           echo"<br>";
      echo"Beberapa Penanggulangan yang dapat dilakukan :  $penanggulangan ";
      echo"<br><br>";
      echo"<a href='cetak.php?&no_konsul=$no_konsul' target='_blank'><button type='button' id='btn-cetak' class='btn'> CETAK</button></a>";
     }
     else if($htotal==$h4hasilakhir){
       echo" Kemungkinan Motor vario 125 Anda Terindikasi  Sarigan bahan bakar kotor atau terdapat kebocoran pada sistem bahan bakar : $hakhir %";
       echo"<br>";
       mysql_query("insert into hasil_konsultasi (no_konsul,id_member,kd_kerusakan,cf1,cf2,cf3,cf4,max,waktu)values('$no_konsul','$idmember','K04','$h1akhirf','$h2akhirf','$h3akhirf','$h4akhirf','$hakhir',NOW())");
        $sqlpen = mysql_query("select * from kerusakan where kd_kerusakan='K04'");
        $rpen = mysql_fetch_array($sqlpen);
        $ket = $rpen['keterangan'];
        $penanggulangan=$rpen['penanggulangan'];
        echo"<br>";
        echo"<br>";
        echo"<p align='justify'>";
        echo"$ket";
        echo"</p>";
            echo"<br>";
       echo"Beberapa Penanggulangan yang dapat dilakukan :  $penanggulangan ";
       echo"<br><br>";
       echo"<a href='cetak.php?&no_konsul=$no_konsul' target='_blank'><button type='button' id='btn-cetak' class='btn'> CETAK</button></a>";
     }
   }
   echo"</td>";
  echo"</tr>";
  echo"</tbody>";
  echo"</table>";



   ?>
 </div>
<br>
   <p align="center"> <a class="btn btn-warning" data-toggle="collapse" href="#p2" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Detil Proses</a></p>
   <div class="collapse multi-collapse" id="p2">
     <div class="card card-body">
        <center  style="font-family:GreyscaleBasic;font-weight:bold;"> <h3> Proses Rule <h3> </center>



<div id="isiadmin">
   <p align='justify'>
   <?php

//TOMBOL DEIL PROSES!!!!!!!!!!!!!
//tampilan rule 1

   if(($g01>0)&&($g02>0)&&($g03>0)){  

      echo"Rule 1 : G01($nilai11) AND G02($nilai12) AND G03($nilai13) THEN Accu Low (0,85) ";
      echo"<br>";
      echo"CFr1 &nbsp;: min($nilai11,$nilai12,$nilai13) * 0.85 = $h1 ";
      echo"<br>";
      echo"<br>";
   }else{
      echo"Rule 1   tidak dieksekusi karna ada evidence yang tidak fakta";
      echo"<br>";
        echo"<br>";
   }

 //rule 2
   if(($g01>0)&&($g02>0)&&($g05>0)){
      echo"Rule 2 : G01($nilai21) AND G02($nilai22) AND G05($nilai25) THEN Accu Low (0,7) ";
      echo"<br>";
      echo"CFr2&nbsp;: min($nilai21,$nilai22,$nilai25) * 0.7 = $h2 ";
      echo"<br>";
      echo"<br>";
   }else{
      echo"Rule 2   tidak dieksekusi karna ada evidence yang tidak fakta";
      echo"<br>";
        echo"<br>";
   }

//rule 3
   if(($g01>0)&&($g03>0)&&($g05>0)){
      echo"Rule 3 : G02($nilai31) AND G03($nilai33) AND G05($nilai35) THEN Accu Low (0,6) ";
      echo"<br>";
      echo"CFr3&nbsp;: min($nilai31,$nilai33,$nilai35) * 0.6 = $h3 ";
      echo"<br>";
      echo"<br>";
   }else{
      echo"Rule 3 tidak dieksekusi karna ada evidence yang tidak fakta";
      echo"<br>";
        echo"<br>";
   }

 //rule 4
    if(($g02>0)&&($g03>0)&&($g04>0)){
      echo"Rule 4 : G02($nilai43) AND G03($nilai44) AND G04($nilai45) THEN Accu Low (0,55) ";
      echo"<br>";
      echo"CFr4&nbsp;: min($nilai43,$nilai44,$nilai45) * 0.55 = $h4";
      echo"<br>";
      echo"<br>";
    }else{
      echo"Rule 4 tidak dieksekusi karna ada evidence yang tidak fakta";
      echo"<br>";
        echo"<br>";
    }

//rule 5
    if(($g06>0)&&($g07>0)&&($g08>0)){
      echo"Rule 5 : G06($nilai56) AND G07($nilai57) AND G08($nilai58) THEN  Radiator Bocor atau Rusak (0,8) ";
      echo"<br>";
      echo"CFr5&nbsp;: min($nilai56,$nilai57,$nilai58) * 0.8 = $h5";
      echo"<br>";
      echo"<br>";
    }else{
      echo"Rule 5 tidak dieksekusi karna ada evidence yang tidak fakta";
      echo"<br>";
        echo"<br>";
    }

//rule 6
    if(($g06>0)&&($g07>0)){
      echo"Rule 6 : G06($nilai66) AND G07($nilai67) THEN  Radiator Bocor atau Rusak (0,7) ";
      echo"<br>";
      echo"CFr6&nbsp;: min($nilai66,$nilai67) * 0.7 = $h6 ";
      echo"<br>";
      echo"<br>";
    }else{
      echo"Rule 6 tidak dieksekusi karna ada evidence yang tidak fakta";
      echo"<br>";
        echo"<br>";
    }

//rule 7
    if(($g06>0)&&($g08>0)&&($g09>0)){
      echo"Rule 7 : G06($nilai76) AND G08($nilai78) AND G09($nilai79) THEN  Radiator Bocor atau Rusak (0,7) ";
      echo"<br>";
      echo"CFr7&nbsp;: min($nilai76,$nilai78,$nilai79) * 0.7 = $h7";
      echo"<br>";
      echo"<br>";
    }else{
      echo"Rule 7 tidak dieksekusi karna ada evidence yang tidak fakta";
      echo"<br>";
        echo"<br>";
    }

//rule 8
    if(($g10>0)&&($g11>0)&&($g12>0)){
      echo"Rule 8 : G10($nilai810) AND G11($nilai811) AND G12($nilai812) THEN  Starter Rusak (0,8) ";
      echo"<br>";
      echo"CFr8&nbsp;: min($nilai810,$nilai811,$nilai812) * 0.8 = $h8";
      echo"<br>";
      echo"<br>";
    }else{
      echo"Rule 8 tidak dieksekusi karna ada evidence yang tidak fakta";
      echo"<br>";
        echo"<br>";
    }

//rule 9
    if(($g10>0)&&($g11>0)){
      echo"Rule 9 : G10($nilai910) AND G11($nilai911) THEN  Starter Rusak (0,6) ";
      echo"<br>";
      echo"CFr9&nbsp;: min($nilai910,$nilai911) * 0.6 = $h9";
      echo"<br>";
      echo"<br>";
    }else{
      echo"Rule 9 tidak dieksekusi karna ada evidence yang tidak fakta";
      echo"<br>";
        echo"<br>";
    }

//rule 10
    if(($g09>0)&&($g10>0)){
      echo"Rule 10 : G09($nilai1010) AND G10($nilai1012) THEN  Starter Rusak (0,75) ";
      echo"<br>";
      echo"CFr10&nbsp;&nbsp;: min($nilai1010,$nilai1012) * 0.75 = $h10";
      echo"<br>";
      echo"<br>";
    }else{
      echo"Rule 10 tidak dieksekusi karna ada evidence yang tidak fakta";
      echo"<br>";
        echo"<br>";
    }

//rule 11
    if(($g13>0)&&($g14>0)&&($g15>0)){
      echo"Rule 11 : G13($nilai1113) AND G14($nilai1114) AND G15($nilai1115) THEN  Sarigan bahan bakar kotor atau terdapat kebocoran pada sistem bahan bakar (0,8) ";
      echo"<br>";
      echo"CFr11&nbsp;&nbsp;: min($nilai1113,$nilai1114,$nilai1115) * 0.8 = $h11";
      echo"<br>";
      echo"<br>";
    }else{
      echo"Rule 11 tidak dieksekusi karna ada evidence yang tidak fakta";
      echo"<br>";
      echo"<br>";
    }

//rule 12
    if(($g13>0)&&($g15>0)){
      echo"Rule 12 : G13($nilai1213) AND G15($nilai1215) THEN  Sarigan bahan bakar kotor atau terdapat kebocoran pada sistem bahan bakar (0,7) ";
      echo"<br>";
      echo"CFr12&nbsp;&nbsp;: min($nilai1213,$nilai1215) * 0.7 = $h12";
      echo"<br>";
      echo"<br>";
    }else{
      echo"Rule 12 tidak dieksekusi karna ada evidence yang tidak fakta";
      echo"<br>";
        echo"<br>";
    }

//rule 13
    if(($g13>0)&&($g14>0)){
      echo"Rule 13 : G13($nilai1313) AND G14($nilai1314) THEN  Sarigan bahan bakar kotor atau terdapat kebocoran pada sistem bahan bakar (0,5) ";
      echo"<br>";
      echo"CFr13&nbsp;&nbsp;: min($nilai1313,$nilai1314) * 0.5 = $h13";
      echo"<br>";
      echo"<br>";
    }else{
      echo"Rule 13 tidak dieksekusi karna ada evidence yang tidak fakta";
      echo"<br>";
        echo"<br>";
    }

   ?>
 </p>
</div>

  <center  style="font-family:GreyscaleBasic;font-weight:bold;"> <h3> Penggabungan Fakta Baru <h3> </center>
<div id="isiadmin">
<?php

echo"<br>";
echo"<p align='left'>";
if(($h1>0)&& ($h2>0)&& ($h3>0)&& ($h4>0)){
  echo"Karena Rule 1,2,3 dan 4 memiliki Hipotesa sama, maka cf digabungkan:<br>";
  echo"Cfgab1  = $h1 + ($h2*(1-$h1)) = $h1rulef <br>";
  echo"Cfgab2  = $h1rulef + ($h3*(1-$h1rulef)) = $h11rulef<br>";
  echo"Cfakhir1= $h11rulef + ($h4*(1-$h11rulef)) = $h111rulef<br>";

}

//p1 --> 3 proses dimulai h1
else if(($h1>0)&&($h2>0)&&($h3>0)){
  echo"Karena Rule 1,2 dan 3 memiliki Hipotesa sama, maka cf digabungkan:<br>";
  echo"Cfgab1  = $h1 + ($h2*(1-$h1))= $h1rulef <br>";
  echo"Cfakhir1= $h1rulef + ($h3*(1-$h1rulef))=$h11rulef<br>";

}
else if(($h1>0)&&($h2>0)&&($h4>0)){
  echo"Karena Rule 1,2 dan 4 memiliki Hipotesa sama, maka cf digabungkan:<br>";
  echo"Cfgab1  = $h1 + ($h2*(1-$h1))=$h1rulef<br>" ;
  echo"Cfakhir1= $h1rulef + ($h4*(1-$h1rulef))= $h11rulef<br>";

}


  else if(($h1>0)&&($h3>0)&&($h4>0)){
  echo"Karena Rfule 1,3 dan 4 memiliki Hipotesa sama, maka cf digabungkan:<br>";
  echo"Cfgab1  = $h1 + ($h3*(1-$h1))= $h1rulef <br>";
  echo"Cfakhir1= $h1rulef + ($h4*(1-$h1rulef))= $h11rulef<br>";
}

//p1--> 3 proses dimulai h2

else if(($h2>0)&&($h3>0)&&($h4>0)){
  echo"Karena Rule 2,3 dan 4 memiliki Hipotesa sama, maka cf digabungkan:<br>";
  echo"Cfgab1  =  $h2 + ($h3*(1-$h1))= $h1rulef<br>";
  echo"Cfakhir1= $h1rulef + ($h4*(1-$h1rulef))=$h11rulef<br>";
}

//p1--> 2 proses dimulai h1
else if(($h1>0) && ($h2>0)){
  echo"Karena Rule 1 dan 2 memiliki Hipotesa sama, maka cf digabungkan:<br>";
  echo"Cfakhir1 = $h1 + ($h2*(1-$h1))=$h1rulef<br>" ;

}
else if(($h1>0)&&($h3>0)){
    echo"Karena Rule 1 dan 3 memiliki Hipotesa sama, maka cf digabungkan:<br>";
    echo"Cfakhir1 = $h1 + ($h3*(1-$h1))=$h1rulef<br>";
}
else if(($h1>0)&&($h4>0)){
  echo"Karena Rule 1 dan 4 memiliki Hipotesa sama, maka cf digabungkan:<br>";
  echo"Cfakhir1 = $h1 + ($h4*(1-$h1))=$h1rulef <br>";

}

//p1--> 2 proses dimulai h2

  else if(($h2>0)&&($h3>0)){
    echo"Karena Rule 2 dan 3 memiliki Hipotesa sama, maka cf digabungkan:<br>";
    echo"Cfakhir1 = $h2 + ($h3*(1-$h2))=$h1rulef<br>";
  }
  else if(($h2>0)&&($h4>0)){
    echo"Karena Rule 2 dan 4 memiliki Hipotesa sama, maka cf digabungkan:<br>";
    echo"Cfakhir1 = $h2 + ($h4*(1-$h2))=$h1rulef <br> ";

  }

//p1--> 2 proses dimulai h3

  else if(($h3>0)&&($h4>0)){
    echo"Karena Rule 3 dan 4 memiliki Hipotesa sama, maka cf digabungkan:<br>";
    echo"Cfakhir1 = $h3 + ($h4*(1-$h3))=$h1rulef <br> ";
  }

//K01 --> 1 proses semuanya
  else if($h1>0){

    echo"Cfakhir1 = $h1<br>";
  }
  else if($h2>0){
        echo"Cfakhir1 = $h2<br>";
    }
  else if($h3>0){
      echo"Cfakhir1 = $h3<br>";
  }
  else if($h4>0){
      echo"Cfakhir1 = $h4<br>";
  }
  else{
        echo"Cfakhir1 = 0<br>";
  }

echo"<br>";
//K02 --> h5 3 proses
if(($h5>0)&&($h6>0)&&($h7>0)){
    echo"Karena Rule 5,6 dan 7 memiliki Hipotesa sama, maka cf digabungkan:<br>";
    echo"CfGab1   = $h5 + ($h6*(1-$h5))=$h2rulef <br> ";
    echo"Cfakhir2 = $h2rulef + ($h7*(1-$h2rulef)) = $h22rulef<br>";
  }

//K02 --> h5 2 proses
  else if(($h5>0)&&($h6>0)){
    echo"Karena Rule 5 dan 6 memiliki Hipotesa sama, maka cf digabungkan:<br>";
    echo"Cfakhir2 = $h5 + ($h6*(1-$h5)) = $h2rulef <br>" ;

  }
  else if(($h5>0)&&($h7>0)){
    echo"Karena Rule 5 dan 7 memiliki Hipotesa sama, maka cf digabungkan:<br>";
    echo"Cfakhir2 = $h5 + ($h7*(1-$h5)) = $h2rulef  <br>";

  }


//K02 --> h6 2 proses

  else if(($h6>0)&&($h7>0)){
    echo"Karena Rule 6 dan 7 memiliki Hipotesa sama, maka cf digabungkan:<br>";
    echo"Cfakhir2 = $h2rulef = $h6 + ($h7*(1-$h6)) = $h2rulef <br>";

  }
//K02 --> h7--> 1 proses semuanya
  else if($h5>0){
  echo"Cfakhir2 = $h5<br>";
  }
  else if($h6>0){
      echo"Cfakhir2 = $h6<br>";
  }
  else if($h7>0){
    echo"Cfakhir2 = $h7<br>";
  }

  else{
    echo"Cfakhir2 = 0<br>";
  }

echo"<br>";
//K03--> H8 3 proses
if(($h8>0)&&($h9>0)&&($h10>0)){
  echo"Karena Rule 8,9 dan 10 memiliki Hipotesa sama, maka cf digabungkan:<br>";
  echo"CfGab1   = $h8 + ($h9*(1-$h8)) = $h3rulef  <br> ";
  echo"Cfakhir3 =  $h3rulef + ($h10*(1-$h3rulef)) = $h33rulef <br> ";

}


//K03--> h8 2 proses
 else if(($h8>0)&&($h9>0)){
   echo"Karena Rule 8 dan 9 memiliki Hipotesa sama, maka cf digabungkan:<br>";
   echo"Cfakhir3 =  $h8 + ($h9*(1-$h8)) = $h3rulef <br> ";

  }
  else if(($h8>0)&&($h10>0)){
    echo"Karena Rule 8 dan 10 memiliki Hipotesa sama, maka cf digabungkan:<br>";
    echo"Cfakhir3 = $h8 + ($h10*(1-$h8)) = $h3rulef <br>";

   }
//K03--> h9 2 proses
  else if(($h9>0)&&($h10>0)){
    echo"Karena Rule 9 dan 10 memiliki Hipotesa sama, maka cf digabungkan:<br>";
    echo"Cfakhir3 = $h9 + ($h10*(1-$h9)) = $h3rulef<br>";

  }
//K03 --> h9 smua proses
  else if($h8>0){
    echo"Cfakhir3 = $h8<br>";
  }
  else if($h9>0){
  echo"Cfakhir3 = $h9<br>";
  }
  else if($h10>0){
  echo"Cfakhir3 = $h10<br>";
  }
  else{
    echo"Cfakhir3=0<br>";
  }

echo"<br>";
//K04--> h11 3 proses
  if(($h11>0)&&($h12>0)&&($h13>0)){
    echo"Karena Rule 11,12 dan 13 memiliki Hipotesa sama, maka cf digabungkan:<br>";
    echo"CfGab1   = $h11 + ($h12*(1-$h11)) = $h4rulef  <br> ";
    echo"Cfakhir4 = $h4rulef + ($h13*(1-$h4rulef)) = $h44rulef<br> ";

    }


//K04 --> h11 2 proses

 else if(($h11>0)&&($h12>0)){
   echo"Karena Rule 11 dan 12 memiliki Hipotesa sama, maka cf digabungkan:<br>";
   echo"Cfakhir4 =  $h11 + ($h12*(1-$h11)) = $h4rulef <br> ";

  }
  else if(($h11>0)&&($h13>0)){
    echo"Karena Rule 11 dan 13 memiliki Hipotesa sama, maka cf digabungkan:<br>";
    echo"Cfakhir4 = $h11 + ($h13*(1-$h11)) = $h4rulef  <br> ";

   }

//K04 --> h12 2 proses

  else if(($h12>0)&&($h13>0)){
    echo"Karena Rule 12 dan 13 memiliki Hipotesa sama, maka cf digabungkan:<br>";
    echo"Cfakhir4 =  $h12 + ($h13*(1-$h12)) = $h4rulef <br> " ;

   }
//K04 --> h11
  else if($h11>0){
    echo"Cfakhir4 = $h11<br>";
  }
  else if($h12>0){
    echo"Cfakhir4 = $h12<br>";
  }
  else if($h13>0){
    echo"Cfakhir4 = $h13<br>";
  }
  else{
      echo"Cfakhir4=0<br>";
  }
echo"</p>";

echo "<br>";
echo"</div>";
//menampilkan fakta baru di akhir
echo"<center  style='font-family:GreyscaleBasic;font-weight:bold;'> <h3> Fakta Baru Akhir<h3> </center>";
echo"<div id='isiadmin'>";
if(($h1akhir>0)&&($h2akhir>0)&&($h3akhir>0)&&($h4akhir>0)){
echo"<p align='left'>";
echo"1. Accu Low  = $h1akhirf <br>";
echo"2. Radiator Bocor atau Rusak = $h2akhirf<br>";
echo"3. Starter Rusak = $h3akhirf<br>";
echo"4. Sarigan bahan bakar kotor atau terdapat kebocoran pada sistem bahan bakar = $h4akhirf<br>";
echo"</p>";
}
else if(($h1akhir>0)&&($h2akhir>0)&&($h3akhir>0)){
  echo"<p align='left'>";
  echo"1. Accu Low = $h1akhirf<br>";
  echo"2. Radiator Bocor atau Rusak = $h2akhirf<br>";
  echo"3. Starter Rusak = $h3akhirf<br>";
  echo"</p>";
}
else if(($h1akhir>0)&&($h2akhir>0)&&($h4akhir>0)){
  echo"<p align='left'>";
  echo"1. Accu Low = $h1akhirf<br>";
  echo"2. Radiator Bocor atau Rusak = $h2akhirf<br>";
  echo"3. Sarigan bahan bakar kotor atau terdapat kebocoran pada sistem bahan bakar = $h4akhirf<br>";
  echo"</p>";
}
else if(($h1akhir>0)&&($h3akhir>0)&&($h4akhir>0)){
  echo"<p align='left'>";
  echo"1. Accu Low =Accu Low = $h1akhirf<br>";
  echo"2. Starter Rusak = $h3akhirf<br>";
  echo"3. Sarigan bahan bakar kotor atau terdapat kebocoran pada sistem bahan bakar = $h4akhirf<br>";
  echo"</p>";
}
else if(($h2akhir>0)&&($h3akhir>0)&&($h4akhir>0)){
  echo"<p align='left'>";
  echo"1. Radiator Bocor atau Rusak = $h2akhirf<br>";
  echo"2. Starter Rusak = $h3akhirf<br>";
  echo"3. Sarigan bahan bakar kotor atau terdapat kebocoran pada sistem bahan bakar = $h4akhirf<br>";
  echo"</p>";
}

else if(($h1akhir>0)&&($h2akhir>0)){
  echo"<p align='left'>";
  echo"1. Accu Low = $h1akhirf<br>";
  echo"2. Radiator Bocor atau Rusak = $h2akhirf<br>";
  echo"</p>";
}
else if(($h1akhir>0)&&($h3akhir>0)){
  echo"<p align='left'>";
  echo"1. Accu Low = $h1akhirf<br>";
  echo"2. Starter Rusak = $h3akhirf<br>";
  echo"</p>";
}
else if(($h1akhir>0)&&($h4akhir>0)){
  echo"<p align='left'>";
  echo"1. Accu Low = $h1akhirf<br>";
  echo"2. Sarigan bahan bakar kotor atau terdapat kebocoran pada sistem bahan bakar = $h4akhirf<br>";
  echo"</p>";
}
else if(($h2akhir>0)&&($h3akhir>0)){
  echo"<p align='left'>";
  echo"1. Radiator Bocor atau Rusak = $h2akhirf<br>";
  echo"2. Starter Rusak = $h3akhirf<br>";
  echo"</p>";
}
else if(($h2akhir>0)&&($h4akhir>0)){
  echo"<p align='left'>";
  echo"1. Radiator Bocor atau Rusak = $h2akhirf<br>";
  echo"2. Sarigan bahan bakar kotor atau terdapat kebocoran pada sistem bahan bakar = $h4akhirf<br>";
  echo"</p>";
}
else if(($h3akhir>0)&&($h4akhir>0)){
  echo"<p align='left'>";
  echo"1. Starter Rusak = $h3akhirf<br>";
  echo"2. Sarigan bahan bakar kotor atau terdapat kebocoran pada sistem bahan bakar = $h4akhirf<br>";
  echo"</p>";
}
else if($h1akhir>0){
  echo"<p align='left'>";
  echo"1. Accu Low = $h1akhirf<br>";
  echo"</p>";

}
else if($h2akhir>0){
  echo"<p align='left'>";
  echo"1. Radiator Bocor atau Rusak = $h2akhirf<br>";
  echo"</p>";

}
else if($h3akhir>0){
  echo"<p align='left'>";
  echo"1. Starter Rusak = $h3akhirf<br>";
  echo"</p>";

}
else if($h4akhir>0){
  echo"<p align='left'>";
  echo"1. Sarigan bahan bakar kotor atau terdapat kebocoran pada sistem bahan bakar = $h4akhirf<br>";
  echo"</p>";

}
else{
  echo"Tidak Ada Hasil";
}

//hasil akhir
echo"<p align='left'>";

if(($htotal == $h1hasilakhir)&&($htotal>0)){
  echo"Dari Hasil Di atas Maka disimpulkan bahwa kemungkinan motor Vario 125 Anda Terindikasi kerusakan Accu Low dengan tingkat kepastian $hakhir %";
}
else if(($htotal == $h2hasilakhir)&&($htotal>0)){
  echo"Dari Hasil Di atas Maka disimpulkan bahwa kemungkinan motor Vario 125 Anda Terindikasi kerusakan Radiator Bocor atau Rusak dengan tingkat kepastian $hakhir %";
}
else if(($htotal == $h3hasilakhir)&&($htotal>0)){
  echo"Dari Hasil Di atas Maka disimpulkan bahwa kemungkinan motor Vario 125 Anda Terindikasi kerusakan Starter Rusak  dengan tingkat kepastian $hakhir %";
}
else if(($htotal == $h4hasilakhir)&&($htotal>0)){
  echo"Dari Hasil Di atas Maka disimpulkan bahwa kemungkinan motor Vario 125 Anda Terindikasi kerusakan Sarigan bahan bakar kotor atau terdapat kebocoran pada sistem bahan bakar dengan tingkat kepastian $hakhir %";
}else{
  echo"";
}
echo"</p>";
?>
</div>


</div>
</div>
<p style="color:red">Note : Untuk lebih lanjut tentang kerusakan Pada motor vario 125 anda, silahkan hubungi pakar Motor Vario 125.</p>
