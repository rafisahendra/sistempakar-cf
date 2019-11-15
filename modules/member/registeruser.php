<?php
if(isset($_POST["register"])){
  include "koneksi.php";

  $bulan =$_POST['bln'];
  $tahun =$_POST['thn'];

  $jmltgl=cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);


  $alamat = nl2br($_POST["alamat"]);

  $maxdate = date($_POST['thn'].'-'.$_POST['bln'].'-'.$jmltgl);

  $tgl = $_POST['thn'].'-'.$_POST['bln'].'-'.$_POST['tgl'];

if(!empty($_POST['nama'])&&!empty($_POST['jk'])&&!empty($alamat)&&!empty($tgl)&&!empty($_POST['username'])&&!empty($_POST['password'])){

    if($tgl<=$maxdate)
    {
            $sqlm = mysql_query("insert into member (nama, jk, alamat, tgl_lahir, username, password) values ('$_POST[nama]', '$_POST[jk]', '$alamat', '$tgl', '$_POST[username]', '$_POST[password]')");

            if($sqlm){
              echo "<div align='center'class='alert alert-success'>
                          <strong>Berhasil, silahkah Login!
                            </div>";
                              echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?r=loginuser'>";
            }else{
              echo "<div align='center'class='alert alert-danger'>
                          <strong>Registrasi gagal!
                            </div>";
                              echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?r=registeruser'>";
            }
      }else{
      echo"<div align='center'class='alert alert-danger'>
                  <strong>Tanggal Input tidak valid!
                    </div>";
                    echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?r=registeruser'>";

      }

}else if(empty($_POST['nama'])||empty($_POST['jk'])||empty($alamat)||empty($tgl)||empty($_POST['username'])||empty($_POST['password'])){
  echo "<div align='center'class='alert alert-danger'>
              <strong>Silahkan Isi Semua Data!
                </div>";

}
  echo "<META HTTP-EQUIV='Refresh' Content='2; URL=?r=registeruser'>";
}
?>


<div id="viewregister">
      <fieldset>
        <form name="form1" method="post" action="" enctype="multipart/form-data">
          <h3 align="center" class="panel panel-info panel-title panel-heading ">HALMAN REGISTRASI</h3>
          <div class="form-group">
            <label>Username</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
              <input type="text" class="form-control"  name="username" >
            </div>
          </div>

          <div class="form-group">
            <label>Password</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
              <input type="password" class="form-control"  name="password" >
            </div>
          </div>
          <div class="form-group">
            <label>Nama Lengkap</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
              <input type="text" class="form-control"  name="nama" >
            </div>
          </div>
          <div class="form-group">
            <label>Alamat</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
              <textarea type="text" class="form-control"  name="alamat" ></textarea>
            </div>
          </div>
          <p ><label>Jenis Kelamin</label>
            <br>
            <input  name="jk" type="radio"  value="pria" >  Pria
            <input  name="jk" type="radio"  value="wanita" >  Wanita
          </p>
          <p><label>Tanggal Lahir</label> <br>
            <select name="tgl" size="1" class="selecttgl" >
            <?php
          		     for ($i=1;$i<=31;$i++)
          			 {
                   if ($i < 10) {
                     $j_disp = '0'.$i;
                   } else {
                     $j_disp = $i;
                   }

          			   echo "<option value='$j_disp'>$i</option>";
          			 }
          	?>
            </select>
            <select name="bln" size="1" class="selecttgl">
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
              ) ;

              foreach ($bulans as $key => $value)
            {

              echo "<option value='$key' >$value</option>";
            }
             ?>
            </select>
            <select name="thn" size="1" class="selecttgl" >
            <?php
            $now=date('Y');
          		     for ($i=1900;$i<=$now;$i++)
          			 {
          			   echo "<option value='$i'>$i</option>";
          			 }
          	 ?>
            </select>
          </p>
          <div align="">
          <p>
            <input name="register" type="submit" id="btn-infologinmember"  class="btn btn-info " value="Register ">

          </p>
          </div>
        </form>



  </fieldset>
</div>
