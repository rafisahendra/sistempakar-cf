
<?php
include "koneksi.php";
if(isset($_POST["edit"])){

    $bulan =$_POST['bln'];
    $tahun =$_POST['thn'];

    $jmltgl=cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);


    $alamat = nl2br($_POST["alamat"]);

    $maxdate = date($_POST['thn'].'-'.$_POST['bln'].'-'.$jmltgl);

    $tgl = $_POST['thn'].'-'.$_POST['bln'].'-'.$_POST['tgl'];

  if(!empty($_POST['nama'])&&!empty($_POST['jk'])&&!empty($alamat)&&!empty($tgl)&&!empty($_POST['username'])&&!empty($_POST['password'])){

        if($tgl<=$maxdate)
        {

                $sqlm = mysql_query("update member set nama='$_POST[nama]', jk='$_POST[jk]', alamat='$alamat', tgl_lahir='$tgl', username='$_POST[username]', password='$_POST[password]'  where id_member='$_POST[id_member]'");
                if($sqlm){

                echo "<div align='center'class='alert alert-success'>
                            <strong>Update data Berhasil!
                              </div>";
                                echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?r=homemember'>";


              }else{
                echo "<div align='center'class='alert alert-danger'>
                            <strong>Update data Gagal!
                              </div>";
                                echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?r=editprofil'>";

              }

        }else{
        echo"<div align='center'class='alert alert-danger'>
                    <strong><span class='glyphicon glyphicon-info-sign'></span>Tanggal Input tidak valid!
                      </div>";
                      echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?r=editprofil'>";

        }
}else if(empty($_POST['nama'])||empty($_POST['jk'])||empty($alamat)||empty($tgl)||empty($_POST['username'])||empty($_POST['password'])){
  echo "<div align='center'class='alert alert-danger'>
              <strong>Silahkan Isi Semua Data!
                </div>";

}

  }

?>

<?php
$sqlm = mysql_query("select * from member where username='$_SESSION[usermbr]'");
$rm = mysql_fetch_array($sqlm);
$tgl = substr($rm["tgl_lahir"],8,2);
$bln = substr($rm["tgl_lahir"],5,2);
$thn = substr($rm["tgl_lahir"],0,4);

?>

  <form name="form1" method="post" action="" enctype="multipart/form-data">
  <center><h4 class="modal-title">Edit Data : <?php  echo $_SESSION['usermbr'] ?></h4></center>
  <input type="hidden" name="id_member" value="<?php echo "$rm[id_member]";?>">
<div class="form-group">
  <label>Username</label>
  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
    <input type="text" class="form-control"  name="username" value="<?php echo"$rm[username]";?>">
  </div>
</div>

<div class="form-group">
  <label>Password</label>
  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
    <input type="text" class="form-control"  name="password" value="<?php echo"$rm[password]";?>" >
  </div>
</div>
<div class="form-group">
  <label>Nama Lengkap</label>
  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
    <input type="text" class="form-control"  name="nama" value="<?php echo"$rm[nama]";?>">
  </div>
</div>
<div class="form-group">
  <label>Alamat</label>
  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
    <textarea type="text" class="form-control"  name="alamat" ><?php echo"$rm[alamat]"; ?></textarea>
  </div>
</div>

      <?php
      if($rm["jk"] == "pria"){
      	$p = "checked";    $w = "";
      }
      else if($rm["jk"] == "wanita"){
      	$p = "";    $w = "checked";
      }
      else{
      	$p = "";    $w = "";
      }
      ?>
      <p>JENIS KELAMIN <br>
        <input name="jk" type="radio" value="pria" <?php echo"$p"; ?>>
        Pria
        <input name="jk" type="radio" value="wanita" <?php echo"$w"; ?>>
        Wanita
      </p>
      <p>
        <label>Tanggal Lahir</label><br>
        <select name="tgl" size="1" class="selecttgl"  >
        <?php

        for ($j=1;$j<=31;$j++)
      {
         if ($j < 10) {
           $j_disp = '0'.$j;
         } else {
           $j_disp = $j;
         }


         if($tgl == $j_disp)
         { $sel = " selected";
         }
         else{
            $sel = "";
                             }

        echo "<option value='$j_disp' $sel>$j</option>";
      }
        ?>
        </select>
        <select name="bln" size="1" class="selecttgl" >
        <?php
        $bulans = array(
          '01' => 'Januari',
          '02' => 'Februari',
          '03' => 'Maret',
          '04' => 'April',
          '05' => 'Mei',
          '06' => 'Juni',
          '07' => 'Juli',
          '08' => 'Agustus',
          '09' => 'September',
          '10' => 'Oktober',
          '11' => 'November',
          '12' => 'Desember'
        );

        foreach ($bulans as $key => $value)
      {
        if($bln == $key)
        { $sel = " selected";
        }
        else{
           $sel = "";
          }
        echo "<option value='$key' $sel>$value</option>";
      }
       ?>

        </select>
        <select name="thn" size="1" class="selecttgl" >
        <?php
        $now=date('Y');
      		     for ($i=1900;$i<=$now;$i++)
      			 {
               if($thn == $i)
               { $sel = " selected ";
               }
               else{
                  $sel = "";
                 }
      			   echo "<option value='$i'$sel>$i</option>";
      			 }
      	 ?>
        </select>
      </p>
      <p>
      <input name="edit" type="submit"  class="btn btn-success " value="Ubah Data ">
      <a href='?r=member&idm=$rm[id_member]'class='btn btn-danger ' >Batal</a>
      </p>
    </p>
  </form>
<br>
