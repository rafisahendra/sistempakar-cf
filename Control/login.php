<link href="css/bootstrap.min.css" rel="stylesheet"/>
<link href="gaya.css" rel="stylesheet" type="text/css"/>

<body id="bodyloginadmin">
      <div id="containerlogintop"></div>
      <br>
      <br>
      <div id="login">
      <fieldset>
      <form name="form1" method="post" action="" enctype="multipart/form-data">

      <div class="container">
       <div class="row clearfix">
        <br>
            <center style="font-family:GreyscaleBasic;font-weight:bold;">
      		<font size="7" color="#cccccc"><b><i class=""></i><br>LOGIN ADMINISTRATOR</b></font><br>
      	
            </center>
      	<div class="col-md-offset-4 col-md-4">
      	 <div class="panel panel-info" style="opacity:0.9">
      	     <div class="panel-heading">
      	         <div class="panel-title" align="center">
      	                           <i class="glyphicon glyphicon-user"></i>
      	                                <font  color="black"><b> LOGIN</b></font>
      						
      	         </div>
               </div>
      	            <div class="panel-body">
      					<div style="padding:25px">
      						<div class="row clearfix">
      							<div class="form-group">
      								<div class="input-group">
      									<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
      									<input type="text" class="form-control" id="username" name="username" placeholder="username">
      								</div>
      							</div>
      							<div class="form-group">
      								<div class="input-group">
      									<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
      									<input type="password" class="form-control" id="password" name="password" placeholder="password">
      								</div>
      							</div>

      						</div>
      					</div>
      				</div>
                              <div class="panel-footer">
      					       <button type="submit" name="login" value="login" class="btn btn-info btn-block btn-lg"><i class="glyphicon glyphicon-log-in"></i> LOGIN </button>
      						</div>
            </div>
      		</form>

      						<?php
      						if(isset($_POST["login"])){
      						include "koneksi.php";
      						$sqlu = mysql_query("select * from administrator where username='$_POST[username]' and password='$_POST[password]' ");
      						$ru = mysql_fetch_array($sqlu);
      						$row = mysql_num_rows($sqlu);
      						if($row > 0){

      						$_SESSION["useradm"]=$ru["username"];
      						$_SESSION["passadm"]=$ru["password"];
      						echo "<div align='center'class='alert alert-info'>
      								<strong>LOGIN SUCCES!
      									</div>";
      						}else{
      						echo "<div align='center'class='alert alert-danger'>
      								<strong>LOGIN GAGAL!
      									</div>";
      						}
      						echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?r=home'>";
      						}
      						?>



      </fieldset>
      </div>
      <br>
      <br>
      <div id="containerloginbot"></div>
</body>
