<!DOCTYPE html>
<html lang = 'esp'>
<head>
    <title>Login</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/reset.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/layout.css" type="text/css" media="screen"> 
    <script src="js/jquery-1.7.1.min.js" type="text/javascript"></script>
    <script src="js/cufon-yui.js" type="text/javascript"></script>
    <script src="js/cufon-replace.js" type="text/javascript"></script> 
    <script src="js/Dynalight_400.font.js" type="text/javascript"></script>
    <script src="js/FF-cash.js" type="text/javascript"></script>  
    <script src="js/validaciones.js" type="text/javascript"></script> 
    <script src="js/script.js" type="text/javascript"></script> 
    <?php

if (!isset($_POST['submit2'])) {

    require_once __DIR__ . '/db_connect.php';
    include 'UserData.php';
    
    $db = new DB_CONNECT();
     
    // sent from form
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(strcmp($_POST['tipo'], "Admin rest") ==0){
         
        $sql= ("SELECT * FROM Administrador_restaurant WHERE Adm_email = '$username' and Adm_direccion='$password'") or die(mysql_error());
         
        $result=mysql_query($sql);
         
        // counting table row
        $count = mysql_num_rows($result);
        // Si es correcto el $username y $password
        while ($row = mysql_fetch_array($result)) {
           
            $idAdministrador_restaurant = $row["idAdministrador_restaurant"];
            $Adm_nombre = $row["Adm_nombre"];
            $Adm_email = $row["Adm_email"];
            $Adm_direccion = $row["Adm_direccion"];
            $Adm_apellidoPaterno = $row["Adm_apellidoPaterno"];
            $Adm_apellidoMaterno = $row["Adm_apellidoMaterno"];
            $Adm_rut = $row["Adm_rut"];
        }

         
        if($count == 1){
         
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['start'] = time();
            $_SESSION['expire'] = $_SESSION['start'] + (5 * 60) ;        
?>
    <meta http-equiv="REFRESH" content="0;url=perfilAdm.php?var1=<?php echo "$idAdministrador_restaurant&admnombre=$Adm_nombre&admemail=$Adm_email&admapeP=$Adm_apellidoPaterno&admapeM=$Adm_apellidoMaterno"?>">  
 <?php
        
        }else {
            
            echo "<script> userPass(); </script>";
        }
    }

   
    if(strcmp($_POST['tipo'], "Admin sist") ==0){

     
    $sql2= ("SELECT * FROM Administrador_sistema WHERE Adm_user = '$username' and Adm_pass ='$password'") or die(mysql_error());
     
    $result2=mysql_query($sql2);
     
    // counting table row
    $count = mysql_num_rows($result2);
    // If result matched $username and $password
    while ($row = mysql_fetch_array($result2)) {
       
        $Adm_user = $row["Adm_user"];
        $Adm_pass = $row["Adm_pass"];
    }

    if($count == 1){
         
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['start'] = time();
        $_SESSION['expire'] = $_SESSION['start'] + (5 * 60) ;
     
?>
    <meta http-equiv="REFRESH" content="0;url=Estadistica.php">  
<?php
    }
     else {

        echo "<script> userPass(); </script>";

        }
    }
}
    
     
?>
<!--//////////////////////////////////// -->

</head>

<body id="page6">
	<!--==============================header=================================-->
    <header>
    	<div class="row-top">
        	<div class="main">
            	<div class="wrapper">
                	<h1><a href="index.html">Flashmenu<span>.cl</span></a></h1>
                    <nav>
                        <ul class="menu">
                           <!-- <li><a href="index.html">Home</a></li>-->
                            <li><a class="active" href="login.php">Ingresar</a></li>
                            <li><a href="contact.php">Contacto</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="row-bot">
        	<div class="row-bot-bg">
            	<div class="main">
                	<h2>Inicio sesion <span>Administrador</span></h2>
                </div>
            </div>
        </div>
    </header>
    
	<!--==============================content================================-->
    <section id="content"><div class="ic"></div>
       
            <div class="wrapper">
                <center>
                <form class="basic-grey" id="cont" method="post" enctype="multipart/form-data" action="login.php" style="width: 40%">                    
                    <h3 class="p1">Ingresar datos</h3>
                        
                        <hr/>
                            <label>
                            <span></span>
                            <select name="tipo">
                                <optgroup>
                                    <option value="Admin rest">Administrador Restaurant</option>
                                    <option value="Admin sist">Administrador sistema</option>
                            </select>  
                            </label>
                            <br/><br/>
  

                            <label>
                            <span>Login:</span>
                            <input name="username" type="email" id="username">
                            </label>
                            <br/><br/>
                            
                            <label>
                            <span>Contraseña:</span>
                            <input name="password" type="password" id ="password"/>
                            </label>  
                            <br/>   
                                
                            
                                <a class="button-2" href="#" onClick="document.getElementById('cont').submit()" type ="submit" name="submit2">Enviar</a>
                                <a class="button-2" href="ingresarAdmRest.php" onClick="document.getElementById('contact-form').submit()" type ="submit" >Registrar</a>

                        

                </form>
                </center>
            </div>
      

    </section>
    
	<!--==============================footer=================================-->
    <footer>
        <div class="main">
        	<div class="aligncenter">
            	<span>Flashmenu.cl &copy; 2014</span>
               

            </div>
        </div>
    </footer>
    <script type="text/javascript"> Cufon.now(); </script>
</body>
</html>
