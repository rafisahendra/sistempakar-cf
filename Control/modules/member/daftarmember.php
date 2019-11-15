<?php include "koneksi.php"; ?>

<?php
//QUERY EDIT MODAL D BAWAH
if(isset($_POST["edit"])){

    $bulan =$_POST['bln'];
    $tahun =$_POST['thn'];

    $jmltgl=cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);


    $alamat = nl2br($_POST["alamat"]);

    $maxdate = date($_POST['thn'].'-'.$_POST['bln'].'-'.$jmltgl);

    $tgl = $_POST['thn'].'-'.$_POST['bln'].'-'.$_POST['tgl'];


  if($tgl<=$maxdate)
  {
  $sqlm = mysql_query("update member set nama='$_POST[nama]', jk='$_POST[jk]', alamat='$alamat', tgl_lahir='$tgl', username='$_POST[username]', password='$_POST[password]'  where id_member='$_POST[id_member]'");

  if($sqlm){

    echo "<div align='center'class='alert alert-success'>
                <strong>Update data Berhasil!
                  </div>";

  }else{
    echo "<div align='center'class='alert alert-danger'>
                <strong>Update data Gagal!
                  </div>";

  }

}else{
  echo"<div align='center'class='alert alert-danger'>
              <strong><span class='glyphicon glyphicon-info-sign'></span>Tanggal Input tidak valid!
                </div>";

}
echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?r=daftarmember'>";
}

?>
<?php
//QUERY ADD DATA
if(isset($_POST["simpan"])){
  include "koneksi.php";

    $bulan =$_POST['bln'];
    $tahun =$_POST['thn'];

    $jmltgl=cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);


    $alamat = nl2br($_POST["alamat"]);

    $maxdate = date($_POST['thn'].'-'.$_POST['bln'].'-'.$jmltgl);

    $tgl = $_POST['thn'].'-'.$_POST['bln'].'-'.$_POST['tgl'];


  if($tgl<=$maxdate)
  {
  $sqlm = mysql_query("insert into member (nama, jk, alamat, tgl_lahir, username, password) values ('$_POST[nama]', '$_POST[jk]', '$alamat',  '$tgl', '$_POST[username]', '$_POST[password]')");

  if($sqlm){

    echo "<div align='center'class='alert alert-success'>
                <strong>Data Berhasil disimpan!
                  </div>";

  }else{
    echo "<div align='center'class='alert alert-danger'>
                <strong>Data Gagal disimpan!
                  </div>";

  }

}else{
  echo"<div align='center'class='alert alert-danger'>
              <strong>Tanggal Input tidak valid!
                </div>";

}
echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?r=daftarmember'>";
}
   ?>


<div >
<button data-toggle="modal" data-target="#myModal" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>Tambah User</button>
</div>

<div class="table-responsive">
<table class="table table-hover table-sm table-bordered" >
<thead class="bg-primary" >
<tr id="thpo">
  <th class="text-center" >NO</th>
  <th class="text-center">NAMA LENGKAP</th>
  <th class="text-center">JENIS KELAMIN</th>
  <th class="text-center">ALAMAT</th>
  <th class="text-center">UMUR</th>
  <th class="text-center">USERNAME</th>
  <th class="text-center">PASSWORD</th>
  <th width='20%' class="text-center">ACTION</th>
 </tr>
 </thead>
 <tbody class="">

   <?php
     $halaman = 10;
     $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
     $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
     $result = mysql_query("SELECT * FROM member ");
     $total = mysql_num_rows($result);

     $pages = ceil($total/$halaman);
     $sqlm = mysql_query("SELECT id_member, nama, jk, alamat,tgl_lahir,  username, password,YEAR(curdate()) - YEAR(tgl_lahir) AS umur from member LIMIT $mulai, $halaman")or die(mysql_error);
     $no =$mulai+1;


     while ($rm = mysql_fetch_assoc($sqlm)) {
       $tgl = substr($rm["tgl_lahir"],8,2);
       $bln = substr($rm["tgl_lahir"],5,2);
       $thn = substr($rm["tgl_lahir"],0,4);


       echo"
       <tr>
       <td >$no</td>
       <td>$rm[nama]</td>
       <td>$rm[jk]</td>
       <td>$rm[alamat]</td>
       <td>$rm[umur]</td>
       <td>$rm[username]</td>
       <td>$rm[password]</td>
     <td align='center'>
     <a href='javascript:showModalM(\"$rm[id_member]\", \"$rm[nama]\", \"$rm[jk]\", \"$rm[alamat]\", \"$tgl\",\"$bln\",\"$thn\", \"$rm[username]\", \"$rm[password]\")' class='btn btn-success' type='submit' > <span class='glyphicon glyphicon-edit'></span>Edit</a>
     <a href='?r=daftarmemberdel&idm=$rm[id_member]'class='btn btn-danger'>  <span class='glyphicon glyphicon-trash'>Hapus</a>

     </td>

       </tr>";
         $no++;
     }
     ?>


        </tbody>

      </table>
    </div>

<!-- PAGING -->
  <nav align="center" aria-label="Page navigation">
    <ul class="pagination">


        <?php for ($i=1; $i<=$pages; $i++){

        echo" <li><a class='apagination' href='?r=daftarmember&halaman=$i' > $i </a></li>";

        }?>


    </ul>
  </nav>


<div id="myModal" class="modal fade">
	<div class="modal-dialog modal-lg ">
		<div class="modal-content ">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah User Baru</h4>
			</div>
			<div class="modal-body">
				<form action="" method="post">
					<div class="form-group">
						<label>Username</label>
			  <input name="username" type="text" class="form-control">
					</div>
					<div class="form-group">
						<label>Password</label>
					   <input name="password" type="text"  class="form-control">
					</div>
          <div class="form-group">
						<label>Nama Lengkap</label>
					   <input name="nama" type="text"  class="form-control">
					</div>
					<div class="form-group">
            <p >Jenis Kelamin
              <br>
              <input  name="jk" type="radio"   value="pria" >  Pria
              <input name="jk" type="radio" value="wanita" >  Wanita
            </p>
					</div>
          <div class="form-group">
						<label>Alamat</label>
          <textarea name="alamat"  class="form-control"></textarea>
        </p>
      </div>
      <div class="form-group">
        <label>Tanggal Lahir</label><br>
        <div class="form-group">

  <select name="tgl" size="1" class="selecttgl"  >
  <?php
         for ($i=1;$i<=31;$i++)
       {

         echo "<option value='$i'>$i</option>";
       }
  ?>
  </select>
  <select name="bln" size="1" class="selecttgl" >
  <?php
  //  $bulan=array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
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
echo "<option value='$key' $sel>$value</option>";
}


  ?>
  </select>
  <select name="thn" size="1" class="selecttgl"  >
  <?php
  $now=date('Y');
         for ($i=1900;$i<=$now;$i++)
       {
         echo "<option value='$i'>$i</option>";
       }
   ?>
  </select>

  </div>



				</div>
				<div class="modal-footer">
				  <input name="simpan" type="submit" class="btn btn-primary" value="Simpan">
					<button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>

				</div>

			</form>

        </div>
	</div>
</div>
 </div>

 <!-- tanggal edit cobacoba-->

<!--$("#radio_1").prop("checked", true);-->

 <script type="text/javascript">
   function showModalM(id_member, nama, jk, alamat, tgl, bln,thn, username, password ) {
     $('#id_member').val(id_member);
     $('#nama').val(nama);
     if (jk == 'pria') $('#jk[value="pria"]').prop('checked', true);
     if (jk == 'wanita') $('#jk[value="wanita"]').prop('checked', true);
     $('#alamat').val(alamat);
     $('#tgl').val(tgl);
     $('#bln').val(bln);
     $('#thn').val(thn);
     $('#username').val(username);
     $('#password').val(password);
     $('#myModalM').modal('show');



   }

 </script>

<!-- MODAL EDIT MEMBER -->
<!--MODAL EDIT DATA-->
<div id="myModalM" class="modal fade">
	<div class="modal-dialog modal-lg ">
		<div class="modal-content ">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Edit Member</h4>
			</div>

			<div class="modal-body">
				<form action="" method="post">
          <input id="id_member" name="id_member" type="hidden" class="form-control" >

            <div class="form-group">
              <label>Nama</label>
              <input  id="nama"  name="nama" type="text"class="form-control">
            </div>

            <div class="form-group">
              <label>Jenis Kelamin</label><br>

              <input name="jk" type="radio"  value="pria"    id="jk" >
              Pria
              <input name="jk" type="radio"  value="wanita"  id="jk" >
              Wanita
            </div>

            <div class="form-group">
              <label>ALAMAT</label>
              <textarea  id="alamat" name="alamat" type="text" class="form-control"></textarea>
            </div>

            <div class="form-group">
              <label>Tanggal Lahir</label><br>
                <select name="tgl" size="1" class="selecttgl" id="tgl" >
                  <?php
                     for ($j=1;$j<=31;$j++)
                   {

                      //$j_disp = $j < 10 ? '0'.$j : $j;

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

              <select name="bln" size="1" class="selecttgl" id="bln">
                    <?php
            	       //	$bulan=array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
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

              <select name="thn" size="1" class="selecttgl" id="thn" >
                <?php
                $now=date('Y');
            		     for ($j=1900;$j<=$now;$j++)
            			 {
                     if($thn == $j)
                     { $sel = " selected ";
                     }
                     else{
                        $sel = "";
                       }
            			   echo "<option value='$j' $sel>$j</option>";
            			 }
            	 ?>
              </select>

      </div>

      <div class="form-group">
        <label>USERNAME</label>
         <input  id="username"  name="username" type="text"class="form-control">
      </div>
      <div class="form-group">
        <label>PASSWORD</label>
         <input id="password"  name="password" type="text" class="form-control">
      </div>
    </div>
				<div class="modal-footer">
				  <input name="edit" type="submit" class="btn btn-primary" id="edit" value="Edit">
					<button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>

				</div>
			</form>



    </div>
  </div>
  </div>
