<html>
  <center  style="font-family:GreyscaleBasic;font-weight:bold;"> <h1> Kerusakan pada Motor Vario 125 <h1> </center>

    <p align="justify">Terdapat Beberapa  jenis kerusakan pada Motor Vario 125, di antaranya adalah Accu Low, Motor Stater Rusak,  	Radiator Bocor atau Rusak, Saringan bahan bakar kotor atau terdapat kebocoran pada sistembahan bakar.
    </p>
    <p align="justify">Dibawah ini merupakan sedikit penjelasan tentang kerusakan Motor Vario 125 beserta gejalanya:</p>

    <p align="left" width="100%"> <a class="btn btn-info" data-toggle="collapse" href="#p1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">1.ACCU LOW</a></p>
    <div class="collapse multi-collapse" id="p1">
      <div class="card card-body">
        <?php
        include "koneksi.php";
        $sqlp=mysql_query("select * from kerusakan where kd_kerusakan='K01'");
        $rp=mysql_fetch_array($sqlp);
        ?>
        <p align='justify'><?php echo" $rp[keterangan]";  ?></p>
        <p align ='justify'>Penanggulangan yang dapat dilakukan jika terkena kerusakan ini adalah : <?php echo"$rp[penanggulangan]"; ?>  </p>
        <p align='justify'>Berikut adalah daftar gejala kerusakan ini:<br>
          <table class="table table-hover table-sm table-bordered">
            <thead>
              <tr id="thpo">
              <th> No </th>
              <th>Kode Gejala</th>
              <th>Nama gejala </th>
            </tr>
          </thead>
          <tbody>
          <?php
          include "koneksi.php";
          $sqlg=mysql_query("select * from gejala where kd_kerusakan='K01'");
          $no=1;
          while($rg=mysql_fetch_array($sqlg)){
            echo "<tr>
              <td >$no</td>
              <td >$rg[kd_gejala]</td>
              <td>$rg[nama_gejala]</td>


            </tr>";

            $no++;
          }
          ?>
          </tbody>
        </table>
          </p>


            </p>
        </div>
      </div>

      <p align="left" > <a class="btn btn-info" data-toggle="collapse" href="#p2" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">2.RADIATOR BOCOR ATAU RUSAK</a></p>
      <div class="collapse multi-collapse" id="p2">
        <div class="card card-body">
          <?php
          include "koneksi.php";
          $sqlp=mysql_query("select * from kerusakan where kd_kerusakan='K02'");
          $rp=mysql_fetch_array($sqlp);
          ?>
          <p align='justify'><?php echo" $rp[keterangan]";  ?></p>
          <p align ='justify'>Penanggulangan yang dapat dilakukan jika terkena kerusakan ini adalah : <?php echo"$rp[penanggulangan]"; ?>  </p>
          <p align='justify'>Berikut adalah daftar gejala kerusakan ini:<br>
            <table class="table table-hover table-sm table-bordered">
              <thead>
                <tr id="thpo">
                <th> No </th>
                <th>Kode Gejala</th>
                <th>Nama gejala </th>
              </tr>
            </thead>
            <tbody>
            <?php
            include "koneksi.php";
            $sqlg=mysql_query("select * from gejala where kd_kerusakan='K02'");
            $no=1;
            while($rg=mysql_fetch_array($sqlg)){
              echo "<tr>
                <td >$no</td>
                <td >$rg[kd_gejala]</td>
                <td>$rg[nama_gejala]</td>


              </tr>";

              $no++;
            }
            ?>
            </tbody>
          </table>
            </p>

          </div>
        </div>
        <p align="left"> <a class="btn btn-info" data-toggle="collapse" href="#p3" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">3.STARTER RUSAK</a></p>
        <div class="collapse multi-collapse" id="p3">
          <div class="card card-body">
            <?php
            include "koneksi.php";
            $sqlp=mysql_query("select * from kerusakan where kd_kerusakan='K03'");
            $rp=mysql_fetch_array($sqlp);
            ?>
            <p align='justify' ><?php echo" $rp[keterangan]";  ?></p>
            <p align ='justify'>Penanggulangan yang dapat dilakukan jika terkena kerusakan ini adalah : <?php echo"$rp[penanggulangan]"; ?>  </p>
            <p align='justify'>Berikut adalah daftar gejala kerusakan ini:<br>
              <table class="table table-hover table-sm table-bordered">
                <thead>
                  <tr id="thpo">
                  <th> No </th>
                  <th>Kode Gejala</th>
                  <th>Nama gejala </th>
                </tr>
              </thead>
              <tbody>
              <?php
              include "koneksi.php";
              $sqlg=mysql_query("select * from gejala where kd_kerusakan='K03'");
              $no=1;
              while($rg=mysql_fetch_array($sqlg)){
                echo "<tr>
                  <td >$no</td>
                  <td >$rg[kd_gejala]</td>
                  <td>$rg[nama_gejala]</td>


                </tr>";

                $no++;
              }
              ?>
              </tbody>
            </table>
              </p>


            </div>
          </div>
          <p align="left"> <a class="btn btn-info" data-toggle="collapse" href="#p4" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">4.SARINGAN BAHAN BAKAR KOTOR ATAU TERDAPAT KEBOCORAN PADA SISTEM BAHAN BAKAR </a></p>
          <div class="collapse multi-collapse" id="p4">
            <div class="card card-body">
              <?php
              include "koneksi.php";
              $sqlp=mysql_query("select * from kerusakan where kd_kerusakan='K04'");
              $rp=mysql_fetch_array($sqlp);
              ?>
              <p align='justify'><?php echo" $rp[keterangan]";  ?></p>
              <p align ='justify'>Penanggulangan yang dapat dilakukan jika terkena kerusakan ini adalah : <?php echo"$rp[penanggulangan]"; ?>  </p>
              <p align='justify'>Berikut adalah daftar gejala kerusakan ini:<br>
                <table class="table table-hover table-sm table-bordered">
                  <thead>
                    <tr id="thpo">
                    <th> No </th>
                    <th>Kode Gejala</th>
                    <th>Nama gejala </th>
                  </tr>
                </thead>
                <tbody>
                <?php
                include "koneksi.php";
                $sqlg=mysql_query("select * from gejala where kd_kerusakan='K04'");
                $no=1;
                while($rg=mysql_fetch_array($sqlg)){
                  echo "<tr>
                    <td >$no</td>
                    <td >$rg[kd_gejala]</td>
                    <td>$rg[nama_gejala]</td>


                  </tr>";

                  $no++;
                }
                ?>
                </tbody>
              </table>
                </p>


              </div>
            </div>



    </html>
