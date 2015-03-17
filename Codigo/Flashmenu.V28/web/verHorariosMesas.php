<!DOCTYPE html>
<html lang="es">
<head>
    <title>Horarios mesas</title>
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
<body id="page5">
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
                    <h2>Horarios <span>mesas</span></h2>
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
   
<?php 
   
    ////////reserva
    $result = mysql_query("SELECT DISTINCT idHorarios_mesa, Horarios_mesa_fecha,
Horarios_mesa_hora FROM Horarios_mesa a, Mesa c
WHERE a.Mesa_Nro_mesa =$idMesa
AND c.Restaurant_idRestaurant =$idRestaurant") or die(mysql_error());

    if (mysql_num_rows($result) > 0) {

    echo "<table> \n"; 
    echo "<tr><td>Fecha mesa</td><td>Horarios mesa</td><td></td></tr> \n"; 
       
        while ($row = mysql_fetch_array($result)) {
           
            $idHorarios_mesa = $row["idHorarios_mesa"];
            $Horarios_mesa_fecha = $row["Horarios_mesa_fecha"];
            $Horarios_mesa_hora = $row["Horarios_mesa_hora"];
            $Mesa_Nro_mesa = $row["Mesa_Nro_mesa"];
        


     echo "<tr><td>$row[1]</td><td>$row[2]</td><td><a href='' class='button-2' onchange='eliminar($row[0])'>Eliminar</a></td></tr> \n"; 

     
        }



    echo "</table> \n"; 
    /////////reseeva

    } 
    else {
        $tenerProducto = false;
            echo "<script>sinHorariosMesas(".$tenerProducto.");</script>";
    }
?>

    </div>
            </article>

        </div>
    </section>

<!-- JS  -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.js"></script>
    <script>window.jQuery || document.write("<script src='js/jquery-1.5.1.min.js'>\x3C/script>")</script>
    <script src="js/app.js"></script>


    
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