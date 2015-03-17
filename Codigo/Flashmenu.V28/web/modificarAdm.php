

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
    $var1=$_GET['var1'];
    // include db connect class
    require_once __DIR__ . '/db_connect.php';
    // connecting to db
    $db = new DB_CONNECT();

    if(isset($_POST['submit'])){ 
    
      $nombre = $_POST['nombre'];
      $apeP = $_POST['apeP'];
      $apeM = $_POST['apeM'];

      $contrasena = $_POST['contrasena'];
 
          $query = "UPDATE Administrador_restaurant SET Adm_nombre='$nombre', Adm_apellidoPaterno='$apeP', Adm_apellidoMaterno ='$apeM', Adm_direccion ='$contrasena' WHERE idAdministrador_restaurant= '$var1'";

          if (!mysql_query($query)){
         
              die('Error: ' . mysql_error()); 
          }
          else{
              
            echo "<script> actualizadoExitosamente(); </script>";


            $sql= ("SELECT * FROM Administrador_restaurant WHERE idAdministrador_restaurant='$var1'") or die(mysql_error());
           
            $result=mysql_query($sql);
            $count = mysql_num_rows($result);
           
            while ($row = mysql_fetch_array($result)) {
               
                $idAdministrador_restaurant = $row["idAdministrador_restaurant"];
                $Adm_nombre = $row["Adm_nombre"];
                $Adm_email = $row["Adm_email"];
                $Adm_direccion = $row["Adm_direccion"];
                $Adm_apellidoPaterno = $row["Adm_apellidoPaterno"];
                $Adm_apellidoMaterno = $row["Adm_apellidoMaterno"];
                $Adm_rut = $row["Adm_rut"];
            }

?>
              <meta http-equiv="REFRESH" content="0;url=perfilAdm.php?var1=<?php echo "$idAdministrador_restaurant&admnombre=$Adm_nombre&admemail=$Adm_email&admapeP=$Adm_apellidoPaterno&admapeM=$Adm_apellidoMaterno"?>">  
<?php
             

          }



             //}
            //  mysql_close($conexion);
     // }
    }
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
                  <h2>Modificar <span>Administrador restaurant</span></h2>
                </div>
            </div>
        </div>
    </header>
    
    <!--==============================content================================-->
    <section id="content"><div class="ic"></div>
        <div class="main">
            <div class="wrapper">

                   <form class="basic-grey" name="NombreForm" action="modificarAdm.php?var1=<?php echo $var1?>" onsubmit="return validarVacios();" style="width:50%">
                    <h3 class="p1">Ingresar datos</h3>
                        <center>
                            <hr/>
                            <!--Nombre administrador-->
                             <label>
                             <span>Nombre:</span>
                             <input type="text" name="nombre" maxlength="30" />
                             </label>
                             <br/><br/>

                             <!--Apellido paterno administrador--> 
                             <label>
                             <span>Apellido Paterno:</span>
                             <input type="text" name="apeP" maxlength="30" />
                             </label>
                             <br/><br/>

                            <!--Apellido materno administrador-->
                             <label>
                             <span>Apellido Materno:</span>
                             <input type="text" name="apeM" maxlength="30" />
                             </label>
                             <br/><br/>

                            <!--password ingreso administrador-->
                             <label>
                             <span>Password:</span>
                             <input type="password" name="contrasena" maxlength="16" />
                             </label>
                             <br/><br/>
      
                            <input class="button-2" type="submit" name="submit" value="Ingresar" formmethod="post" /> 
                      
                            </center>




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
