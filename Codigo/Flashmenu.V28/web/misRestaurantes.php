 <!DOCTYPE html>
<html lang="es">
<head>
    <title>Mis restaurantes</title>
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

    <?php


    $var1=$_GET['var1'];
    $admnombre=$_GET['admnombre'];
    $admemail=$_GET['admemail'];
    $admapeP=$_GET['admapeP'];
    $admapeM=$_GET['admapeM'];

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
                	<h2>Mis <span>Restaurantes</span></h2>
                </div>
            </div>
        </div>
    </header>
    
	<!--==============================content================================-->
    <section id="content"><div class="ic"></div>
        <div class="main">
            <div class="container">
            	<h3>Restaurantes asociados</h3>
              
<?php

    $result = mysql_query("SELECT * FROM Restaurant WHERE Administrador_restaurant_idAdministrador_restaurant = $var1") or die(mysql_error());

        if (mysql_num_rows($result) > 0) {

            echo "<table> \n"; 
            echo "<tr><td>Nombre</td><td>Direccion</td></tr> \n"; 
           
                while ($row = mysql_fetch_array($result)) {
                   
                    $idRestaurant = $row["Administrador_restaurant_idAdministrador_restaurant"];
                    $Rest_nombre = $row["Rest_nombre"];
                    $Rest_tipo = $row["Rest_tipo"];
                    $Rest_descripcion = $row["Rest_descripcion"];
                    $Rest_email = $row["Rest_email"];
                    $Rest_direccion = $row["Rest_direccion"];


                    echo "<tr><td><a href='perfilRestaurantes.php?idRestaurant=$row[0]&Rest_nombre=$row[1]&Rest_email=$row[4]&var1=$var1&admnombre=$admnombre&admemail=$admemail&admapeP=$admapeP&admapeM=$admapeM'>$Rest_nombre</a></td><td>$row[5]</td></tr> \n"; 
                }

            echo "</table> \n"; 
        } 
        else {

            $tenerRestaurant = false;
            echo "<script>restaurantesAsociados(".$tenerRestaurant.")</script>";
            //echo "<meta http-equiv='REFRESH' content='0;url=perfilAdm.php?var1=".$var1."&admnombre=".$admnombre."&admemail=".$admemail."&admapeP=".$admapeP."&admapeM=".$admapeM.">";  
?>
    <meta http-equiv='REFRESH' content="0;url=perfilAdm.php?<?php echo "var1=$var1&admnombre=$admnombre&admemail=$admemail&admapeP=$admapeP&admapeM=$admapeM"?>">

<?php        

         }
?>


<!-- JS  -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.js"></script>
    <script>window.jQuery || document.write("<script src='js/jquery-1.5.1.min.js'>\x3C/script>")</script>
    <script src="js/app.js"></script>


</body>
</html>


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
