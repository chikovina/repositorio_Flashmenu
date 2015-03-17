<!DOCTYPE html>
<html lang="es">
<head>
    <title>Ingresar horarios</title>
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

    // hora psaada//


    $idMesa=$_GET['idMesa'];
    $idRestaurant=$_GET['idRestaurant'];
    $Rest_nombre=$_GET['Rest_nombre'];
    $Rest_email=$_GET['Rest_email'];
    $var1=$_GET['var1'];
    $admnombre=$_GET['admnombre'];
    $admemail=$_GET['admemail'];
    $admapeP=$_GET['admapeP'];
    $admapeM=$_GET['admapeM'];

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
                            <li><a href="perfilAdm.php?<?php echo "var1=".$var1."&admnombre=".$admnombre."&admemail=".$admemail."&admapeP=".$admapeP."&admapeM=".$admapeM ?>">Perfil</a></li>
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
                	<h2>Ingresar <span>horarios</span></h2>
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
                    <div class="maxheight indent-bot" style="width: 600px;">
                   <form style="width: 40%"  class="basic-grey" name="NombreForm" action="ingresarHorarioMesas.php?<?php echo "idMesa=$idMesa&idRestaurant=$idRestaurant&Rest_nombre=$Rest_nombre&Rest_email=$Rest_email&var1=$var1&admnombre=$admnombre&admemail=$admemail&admapeP=$admapeP&admapeM=$admapeM"?>">
                    <h3 class="p1">Ingresar datos</h3>
                        <center>
                            <hr/>
                            <!--fecha mesa-->


                             <label>
                             <span id="errorFecha">Fecha:</span>
                             <div id="diasMes"></div> <script> inicio(); </script>
                             
                             
                             </label>
                             <br/><br/>

                             <!--Hora mesa--> 
                             <label>
                             <span id="errorTime">Hora:</span>
                             <input id="fechaInput" type="time" name="hora" />
                             </label>
                             <br/><br/>
                            

                                 

      <input class="button-2"  type="submit" name="submit" onclick="a()" value="Ingresar" formmethod="post" />
                      
                            </center>

<?php
if(isset($_POST['submit']) == true){



    $validarDia = $_POST['dia'];
    $fecha = date('Y')."-".date('m')."-".$_POST['dia'];
    $hora = $_POST['hora'];

    $validarHora = explode(":" ,$hora);
    //$validarHorasuma = (int)($validarHora[0]+$validarHora[1]);
    //$sumaHoraActual = date('G')+date('i');
    if($validarDia == "" or $hora == ""){

        echo "<script> validarVacios(); </script>";

        if($validarDia == ""){
          echo "<script> validarVaciosFecha(); </script>";
        }
        if($hora == ""){
          echo "<script> validarVaciosHora(); </script>";
        }
    }
    else{

    $V = false;

    if( $validarDia < date('d')){
        echo "<script> fechaActual(); </script>";
        $V = true;
    }

    if($validarHora[0] < date('G')){
        echo "<script> horarioActual(); </script>";
        $V = true;
    }


    //echo "<script>verificarHoraFecha('".$hora."', '".$validarDia."'); </script>";

    if($V == false){

        $consulta="SELECT * FROM Horarios_mesa where Horarios_mesa_hora= '$hora' AND Horarios_mesa_fecha = '$fecha' AND Mesa_Nro_mesa='$idMesa'";
        $resultado=mysql_query($consulta) or die (mysql_error());
        
            if (mysql_num_rows($resultado)>0){
                
                echo "<script> horarioExiste(); </script>";
            //echo "<script>horarioActual(); </script>";
            } 
            else{
             
                $query = "INSERT INTO Horarios_mesa (Horarios_mesa_fecha, Horarios_mesa_hora, Mesa_Nro_mesa) VALUES ('$fecha', '$hora', '$idMesa')";
                
                if (!mysql_query($query)){

                     die('Error: ' . mysql_error());
                   //  echo "Error al ingresar la fecha." . "<br />";
                }
                else{

                    echo "<script> creadoExitosamente(); </script>";

                }
            }

    }
         //}
        // mysql_close($conexion);
     }
 }
?>



                    </form>
                     </div>
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
