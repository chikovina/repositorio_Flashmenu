<!DOCTYPE html>
<html lang="es">
<head>
    <title>Registro</title>
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
    // include db connect class
    require_once __DIR__ . '/db_connect.php';
    // connecting to db
    $db = new DB_CONNECT();
?> 

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
                  <h2>Registrar <span>Administrador restaurant</span></h2>
                </div>
            </div>
        </div>
    </header>
    
	<!--==============================content================================-->
    <section id="content"><div class="ic"></div>
        <div class="main">
            <div class="wrapper">
            	 
                   <form class="basic-grey" name="NombreForm" action="ingresarAdmRest.php" style="width:50%">
                    <h3 class="p1">Ingresar datos</h3>
                        <center>
                            <hr/>
                            <!--Nombre administrador-->
                             <label>
                             <span>Nombre:</span>
                             <input id="nombreInput" type="text" name="nombre" maxlength="30" />
                             </label>
                             <br/><br/>

                             <!--Apellido paterno administrador--> 
                             <label>
                             <span>Apellido Paterno:</span>
                             <input id="apePInput" type="text" name="apeP" maxlength="30" />
                             </label>
                             <br/><br/>

                            <!--Apellido materno administrador-->
                             <label>
                             <span>Apellido Materno:</span>
                             <input id="apeMInput" type="text" name="apeM" maxlength="30" />
                             </label>
                             <br/><br/>

                                 <!--Rut administrador-->
                             <label>
                             <span id="errorRut">Rut:</span>
                             <input id="rutInput" type="number" name="rut" maxlength="9" />
                             </label>
                             <br/><br/>

                             <!--Email administrador--> 
                             <label>
                             <span id="errorAdmEmail">Email:</span>
                             <input id="emailInput" type="email" name="email" maxlength="30" />
                             </label>
                             <br/><br/>

                            <!--password ingreso administrador-->
                             <label>
                             <span>Password:</span>
                             <input id="passInput" type="password" name="contrasena" maxlength="16" />
                             </label>
                             <br/><br/>
      
                            <input class="button-2" type="submit" name="submit" value="Ingresar" formmethod="post" /> 
                      
                            </center>


<?php

    if(isset($_POST['submit'])){ 
    
      $nombre = $_POST['nombre'];
      $apeP = $_POST['apeP'];
      $apeM = $_POST['apeM'];
      $rut = $_POST['rut'];
      $email = $_POST['email'];
      $contrasena = $_POST['contrasena'];

      if($nombre == "" or $apeP == "" or $rut == "" or $email == "" or $contrasena == ""){

        echo "<script> validarVacios(); </script>";

        if($nombre == ""){
          echo "<script> validarVaciosNombre(); </script>";
        }
        if($apeP == ""){
          echo "<script> validarVaciosapeP(); </script>";
        }
        if($rut == ""){
          echo "<script> validarVaciosRut(); </script>";
        }
        if($email == ""){
          echo "<script> validarVaciosEmail(); </script>";
        }
        if($contrasena == ""){
          echo "<script> validarVaciosContrasena(); </script>";
        }

      }
      else{


        $nuevo_usuario=mysql_query("SELECT Adm_rut FROM Administrador_restaurant WHERE Adm_rut='$rut'"); 
        $nuevo_email=mysql_query("SELECT Adm_email FROM Administrador_restaurant WHERE Adm_email='$email'"); 


        if((mysql_num_rows($nuevo_usuario)>0) or (mysql_num_rows($nuevo_email)>0)){
                echo "<script> datosExistente(); </script>";
        }

        if (mysql_num_rows($nuevo_usuario)>0){
                 echo "<script> rutExistente(); </script>";
        } 
        if(mysql_num_rows($nuevo_email)>0){
                 echo "<script> emailAdmExistente(); </script>";
        }

        if((mysql_num_rows($nuevo_usuario)<=0) and (mysql_num_rows($nuevo_email)<=0)){
   
            $query = "INSERT INTO Administrador_restaurant (Adm_nombre, Adm_apellidoPaterno, Adm_apellidoMaterno, Adm_rut, Adm_email, Adm_direccion) VALUES ('$nombre', '$apeP', '$apeM', '$rut', '$email', '$contrasena')";

            if (!mysql_query($query)){
           
                die('Error: ' . mysql_error()); 
            }
            else{
                
                echo "<script> creadoExitosamente(); </script>";
               
  ?>
                <meta http-equiv="REFRESH" content="0;url=/web/login.php">
  <?php
            }
               //}
              //  mysql_close($conexion);
        }
      }
    }
?>


                    </form>
            </div>
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
