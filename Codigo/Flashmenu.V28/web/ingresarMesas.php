<!DOCTYPE html>
<html lang="es">
<head>
    <title>Ingresar mesas</title>
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
    $idRestaurant=$_GET['idRestaurant'];
    $Rest_nombre=$_GET['Rest_nombre'];
    $Rest_email=$_GET['Rest_email'];
    $admnombre=$_GET['admnombre'];
    $admemail=$_GET['admemail'];
    $admapeP=$_GET['admapeP'];
    $admapeM==$_GET['admapeM'];

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
                            <li><a href='perfilAdm.php?<?php echo "var1=".$var1."&admnombre=".$admnombre."&admemail=".$admemail."&admapeP=".$admapeP."&admapeM=".$admapeM ?>'>Perfil</a></li>
                            <li><a href="index.html">Cerrar sesion </a></li>
                            <li><a href="contact.php">Contacto</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="row-bot">
        	<div class="row-bot-bg">
            	<div class="main">
                	<h2>Ingresar <span>mesas</span></h2>
                </div>
            </div>
        </div>
    </header>
     <div class="menuTemplate3"></div>
	<!--==============================content================================-->
    <section id="content"><div class="ic"></div>
            <div class="wrapper">

 <article class="col-1">
                     <div class="maxheight indent-bot">
                        <div id='cssmenu'>
                            <ul>
                               <li class='action'><a href='perfilAdm.php?<?php echo "var1=".$var1."&admnombre=".$admnombre."&admemail=".$admemail."&admapeP=".$admapeP."&admapeM=".$admapeM ?>'><span>Perfil<?php echo " ".$Rest_nombre ?></span></a>

                               <li class='has-sub'><a href='#'><span>Carta</span></a>
                                    <ul>
                                        <li><a href='ingresarRestaurant.php?<?php echo "idRestaurant=".$idRestaurant."&Rest_nombre=".$Rest_nombre."&Rest_email=".$Rest_email."&var1=".$var1."&admnombre=".$admnombre."&admemail=".$admemail."&admapeP=".$admapeP."&admapeM=".$admapeM?>'><span>Ingresar productos</span></a></li>
                                        <li><a href='verCarta.php?<?php echo "idRestaurant=".$idRestaurant."&Rest_nombre=".$Rest_nombre."&Rest_email=".$Rest_email."&var1=".$var1."&admnombre=".$admnombre."&admemail=".$admemail."&admapeP=".$admapeP."&admapeM=".$admapeM?>'><span>Ver carta</span></a></li>
                                        <li><a href='ingresarMenus.php?<?php echo "idRestaurant=".$idRestaurant."&Rest_nombre=".$Rest_nombre."&Rest_email=".$Rest_email."&var1=".$var1."&admnombre=".$admnombre."&admemail=".$admemail."&admapeP=".$admapeP."&admapeM=".$admapeM?>'><span>Ingresar menús</span></a></li>
                                        <li><a href='verMenus.php?<?php echo "idRestaurant=".$idRestaurant."&Rest_nombre=".$Rest_nombre."&Rest_email=".$Rest_email."&var1=".$var1."&admnombre=".$admnombre."&admemail=".$admemail."&admapeP=".$admapeP."&admapeM=".$admapeM?>'><span>Ver menús</span></a></li>
                                    </ul>
                               </li>

                               <li class='has-sub'><a href='#'><span>Mesas</span></a>
                                    <ul>
                                        <li><a href='ingresarMesas.php?<?php echo "idRestaurant=".$idRestaurant."&Rest_nombre=".$Rest_nombre."&Rest_email=".$Rest_email."&var1=".$var1."&admnombre=".$admnombre."&admemail=".$admemail."&admapeP=".$admapeP."&admapeM=".$admapeM?>'><span>Ingresar mesas</span></a></li>
                                        <li><a href='verMesas.php?<?php echo "idRestaurant=".$idRestaurant."&Rest_nombre=".$Rest_nombre."&Rest_email=".$Rest_email."&var1=".$var1."&admnombre=".$admnombre."&admemail=".$admemail."&admapeP=".$admapeP."&admapeM=".$admapeM?>'><span>Ver mesas</span></a></li>
                                    </ul>
                               </li>

                               <li class='has-sub'><a href='#'><span>Reservas</span></a>
                                    <ul>
                                        <li><a href='verReservas.php?<?php echo "idRestaurant=".$idRestaurant."&Rest_nombre=".$Rest_nombre."&Rest_email=".$Rest_email."&var1=".$var1."&admnombre=".$admnombre."&admemail=".$admemail."&admapeP=".$admapeP."&admapeM=".$admapeM?>'><span>Ver reservas</span></a></li>
                                    </ul>
                               </li>
                            </ul>
                        </div>
                    </div>    
                </article>  

            <article class="col-2"> 
                 
                   <form name ="NombreForm" class="basic-grey" action="ingresarMesas.php?<?php echo "idRestaurant=".$idRestaurant."&Rest_nombre=".$Rest_nombre."&Rest_email=".$Rest_email."&var1=".$var1."&admnombre=".$admnombre."&admemail=".$admemail."&admapeP=".$admapeP."&admapeM=".$admapeM?>">
                      <h3 class="p1">Ingresar datos</h3>
                        <center>
                            <hr/>
                            <!--nro mesa-->
                             <label>
                             <span id="errorNroMesa">Nro mesa:</span>
                             <input id="nroInput" type="number" name="nro" maxlength="11" />
                             </label>
                             <br/><br/>
                             
                             <!--descripcion mesa--> 
                             <label>
                             <span>Descripcion:</span>
                             <input id="descripcionInput" type="text" name="descripcion" maxlength="30" />
                             </label>
                             <br/><br/>
                            
                            <!--cantidad personas mesa-->
                             <label>
                             <span>Cantidad personas:</span>
                             <input id="cantPersonasInput" type="number" name="cantPersonas" maxlength="11" />
                             </label>
                             <br/><br/>
                                        

                                 

      <input class="button-2" onClick="document.getElementById('contact-form').submit()" type="submit" name="submit" value="Ingresar" formmethod="post" />
                      
                            </center>


<?php
if(isset($_POST['submit'])){
  
    $nro = $_POST['nro'];
    $descripcion = $_POST['descripcion'];
    $cantPersonas = $_POST['cantPersonas'];

    if($nro == "" or $descripcion == "" or $cantPersonas == ""){

        echo "<script> validarVacios(); </script>";

        if($nro == ""){
          echo "<script> validarVaciosNro(); </script>";
        }
        if($descripcion == ""){
          echo "<script> validarVaciosDescripcion(); </script>";
        }
        if($cantPersonas == ""){
          echo "<script> validarVaciosCantPersonas(); </script>";
        }

      }
      else{

    $consulta="SELECT Mesa_nro FROM Mesa WHERE Mesa_nro = '$nro' AND Restaurant_idRestaurant = '$idRestaurant'";
        
        $resultado=mysql_query($consulta) or die (mysql_error());
        
        if (mysql_num_rows($resultado)>0){

           echo "<script>nroMesaExiste(); datosExistente();</script>";
        
        } else {
            
          $query = "INSERT INTO Mesa (Mesa_nro, Mesa_descripcion, Mesa_cantPersonas, Restaurant_idRestaurant) VALUES ('$nro', '$descripcion', '$cantPersonas', '$idRestaurant')";
            
            if (!mysql_query($query)){

                 die('Error: ' . mysql_error());
                 echo "<script> errorIngresar(); </script>";

            }else{
                 echo "<script> creadoExitosamente(); </script>";
            }
        }
        // mysql_close($conexion);
     }

 }
?>

                    </form>
                </article>
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
