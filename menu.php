<?php
if(!empty($_SESSION["usermbr"]) and !empty($_SESSION["passmbr"])){
 include "koneksi.php";
  $sqlm = mysql_query("select * from member where username='$_SESSION[usermbr]'");
  $rm = mysql_fetch_array($sqlm);

  include "menumember.php";

}else{
include "menuutama.php";
}
