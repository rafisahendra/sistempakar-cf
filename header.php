
<div class="row">
<nav class="navbar navbar-light" style="background-color:#2A2B2F;">
 <div class="collapse navbar-collapse">
  <ul class="nav navbar-nav navbar-left" id="textheader"><br>
    <font  face="Berlin Sans FB" size="6"  color="white"><i class=""></i> SISTEM PAKAR </font>
  </ul>

  <?php
include "koneksi.php";

if(!empty($_SESSION["usermbr"]) and !empty($_SESSION["passmbr"])){

 $sqlm = mysql_query("select * from member where username='$_SESSION[usermbr]'");
 $rm = mysql_fetch_array($sqlm);

 $sqlc=mysql_query("select * from balas_pesan where id_member='$rm[id_member]' and status='notyet'");
 $rc = mysql_num_rows($sqlc);


    echo " <div class='row'>
    <div class='collapse navbar-collapse'>
          <ul class='nav navbar-nav navbar-right'>
            <li class='dropdown' >
              <a id='a-memberkananatas' href='#'  class='dropdown-toggle' data-toggle='dropdown'><i class='glyphicon glyphicon-user' ></i>  $rm[nama] <strong class='caret'></strong></a>
                <ul id='ul-memberkananatas' class='dropdown-menu' >
                  <li><a id='akananatas'  href='?r=editprofil'><i class='glyphicon glyphicon-saved'></i> Edit Profil</a></li>
                  <li><a id='akananatas' href='?r=hasilkonsul'><i class='glyphicon glyphicon-saved'></i> Hasil Konsul</a></li>
                  <li><a id='akananatas' href='?r=kotakmasuk'><i class='glyphicon glyphicon-saved'></i> Inbox   <span class='badge'>$rc</span> </a></li>
                  <li><a id='akananatas' href='?r=logout'><i class='glyphicon glyphicon-log-out'></i> Logout</a></li>
                </ul>
            </li>
          </ul>
        </div>
        </div>";
      }
        else {
          echo "";
        }
        ?>
	  </li>
    </ul>
 </div>
</nav>
</div>
