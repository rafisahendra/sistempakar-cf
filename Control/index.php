<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<link href="css/bootstrap.min.css" rel="stylesheet"/>
<link href="style.css" rel="stylesheet" type="text/css"/>

<title>Home Amin </title>

</head>
<?php
if(!empty($_SESSION["useradm"]) and !empty($_SESSION["passadm"])){
?>
<body>
<div class="grid">
	<div class="dh12">

					<?php include "header.php";?>
	</div>

		<div class="grid">
			<div class="dh3" >
					<?php include "menuadmin.php" ?>

				</div>
			</div>


			<div >
					<div class="dh12">
						<?php include "footer.php";?>
					</div>
			 </div>
</body>
<?php
}else{
  include "login.php";
}
?>

</html>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
