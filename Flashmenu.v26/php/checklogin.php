<?php
	 
	/* start the session */
	session_start();
	 
	?>
	 
	<!doctype html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> 	<html lang="es"> <!--<![endif]-->
<head>
<LINK REL="SHORTCUT ICON" HREF="images/favicon.png"> 
	<!-- General Metas -->
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">	<!-- Force Latest IE rendering engine -->
	<title>Login Form</title>
	<meta name="description" content="">
	<meta name="author" content="">
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
	
	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/base.css">
	<link rel="stylesheet" href="css/skeleton.css">
	<link rel="stylesheet" href="css/layout.css">
	
</head>
<body>

	<!--<div class="notice">
		<a href="" class="close">close</a>
		<p class="warn">Whoops! We didn't recognise your username or password. Please try again.</p>
	</div>-->

<br>
		<br>
		<center><span style="font-size:55px;"> <h1> <font color="red" face = "Berlin Sans FB"> FLASHMENU</font> </h1> </span></center>
		</br>
		</br>

	 
	<?php
	 
	 // include db connect class
	
require_once __DIR__ . '/db_connect.php';

// connecting to db
$db = new DB_CONNECT();
	 
	// sent from form
	$username = $_POST['username'];
	$password = $_POST['password'];
	 
	$sql= "SELECT * FROM administrador_restaurant WHERE Adm_email = '$username' and Adm_email='$password'";
	 
	$result=mysql_query($sql);
	 
	// counting table row
	$count = mysql_num_rows($result);
	// If result matched $username and $password

	 
	if($count == 1){
	 
	 $_SESSION['loggedin'] = true;
	 $_SESSION['username'] = $username;
	 $_SESSION['start'] = time();
	 $_SESSION['expire'] = $_SESSION['start'] + (5 * 60) ;
	 
	//echo "<br> Bienvenido! " . $_SESSION['username'];
	?>

<!-- -->

		<meta http-equiv="REFRESH" content="0;url=http://www.flashmenu.cl/php/perfil2.php?var1=Adm_nombre">
	<!--	<center><a href="perfil2.php?var1=Adm_nombre"><button>Perfil</button></a></center>-->

	 <?php
	}
	 else {
	 echo "<br/>Username o Password estan incorrectos.<br>";
	 
	 echo "<a href='login.html'>Volver a Intentarlo</a>";
	}
	 
	?>
	 
	<!-- JS  -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.js"></script>
	<script>window.jQuery || document.write("<script src='js/jquery-1.5.1.min.js'>\x3C/script>")</script>
	<script src="js/app.js"></script>
	
<!-- End Document -->
</body>
</html>
