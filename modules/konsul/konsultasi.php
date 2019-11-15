<?php include "koneksi.php"; ?>
<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

if(isset($_POST["periksa"])){

    $sqlm = mysql_query("select * from member where username='$_SESSION[usermbr]'");
    $rm = mysql_fetch_array($sqlm);
    $namamember=$rm['nama'];
    $idmember=$rm['id_member'];


    // penambahan no konsul
    $qno_konsul=mysql_query("select max(no_konsul) as max_no from konsultasi");
    $array_max_no= mysql_fetch_array($qno_konsul);
    $no_konsul = $array_max_no[0] + 1;

    $totalg=mysql_query("select * from gejala");
    $rtotal=mysql_num_rows($totalg);

    for($i=1; $i<=$rtotal; $i++){
      $ngejala = $_POST['gejala'.$i];
      $ncf = $_POST['cf'.$i];
      $nnama= $_POST['nama'.$i];

            if(!empty($ngejala)&&!empty($ncf)){
            $date=date('Y-m-d');


            $querykonsul=mysql_query("INSERT INTO konsultasi (id_member,no_konsul,kd_gejala,cf,tanggal) VALUES ('$idmember','$no_konsul','$ngejala','$ncf','$date')");


            }else if(empty($ngejala)||empty($ncf)){

              echo"<meta http-equiv=Refresh content=2;url=?r=konsultasi>";

            }

    }
            if($querykonsul){
              echo "<div align='center'class='alert alert-success'>
                          <strong>Berhasil konsultasi!
                            </div>";
              echo "<meta http-equiv=Refresh content=1;url=?r=rule&no_konsul=$no_konsul>";
            }else{
              echo "<div align='center'class='alert alert-danger'>
                          <strong>Silahkan isi data  konsultasi dengan benar!
                            </div>";
              echo "<meta http-equiv=Refresh content='1; url=?r=konsultasi'>";
            }

}

?>




<?php

$sqlm = mysql_query("select * from member where username='$_SESSION[usermbr]'");
$rm = mysql_fetch_array($sqlm);


?>

<a  href='?r=hasilkonsul'class='btn btn-info' > <span class='glyphicon glyphicon-list'></span> LIHAT HASIL KONSUL SEBELUMNYA</a>
<center style='font-family:GreyscaleBasic;font-weight:bold;'><h3>Silahkan pilih Gejala kerusakan yang terjadi pada Motor vario 125 anda</h3></center>
<form action="" method="post">
  <table class= 'table table-bordered' >
    <tr>
      <td class="text-center" width="25"><b>No</b></td>
      <td class="text-center"><b>Pertanyaan</b></td>
      <td class="text-center" width="300"><b>Pilih Seberapa Besar Karakter Yang anda Miliki dari 0 - 1</b></td>
    </tr>
    <?php
                $no=1;
                $hasil=mysql_query("select * from gejala order by id_gejala asc");
                $rt = mysql_num_rows($hasil);
                while($row=mysql_fetch_array($hasil))
                {
                ?>
                  <tr>
                  <td align='center'><?php echo $no?></td>

                  <td><input id="check<?php echo $row['id_gejala']?>" onclick="enabletext('<?php echo $row['id_gejala']?>')"  type="checkbox" value="<?php echo $row['kd_gejala']?>" name="gejala<?php echo $no?>"  >  Apakah terjadi masalah <?php echo $row[nama_gejala]?> ?</br></td>
                  <td>
                      <input  id="text<?php echo $row['id_gejala']?>" name="cf<?php echo $no?>" type="number" min="0.1" max="1" step="0.01" class="form-control" placeholder="Silahkan masukan angka dari 0 - 1" >
                      </td>
                     <input type="hidden" name="nama<?php echo $no?>" value="<?php echo $row['nama_gejala']?>" />


        				</tr>

                <?php
                	$no++;
        						}
        				?>

<script type="text/javascript">
function enabletext(id) {
      console.log(id);
        if ($('#check'+id).is(':checked', true)) {
          $('#text'+id).prop('disabled', false);
        } else {
          $('#text'+id).val('');
          $('#text'+id).prop('disabled', true);
        }
}



</script>



   </table>
          <div align="center">
            <input type="submit" class="btn btn-info" name="periksa" id="periksa" value="Periksa Konsultasi" />
            <input name="reset" type="reset" class="btn " style="background-color: red; color:white;" value="Reset " />
          </div>
        </form>
