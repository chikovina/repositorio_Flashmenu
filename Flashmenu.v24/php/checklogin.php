<?php
	 
	/* start the session */
	session_start();
	 
	?>
	 
	<!DOCTYPE html>
	<html lang="en">
 
		<head>
			<LINK REL="SHORTCUT ICON" HREF="images/favicon.png"> 
			 <title>Login</title>
			 <meta charset = "utf8" />
		</head>
	 
	<body background="images/bg.jpg">

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
	 
	</body>
	</html>
