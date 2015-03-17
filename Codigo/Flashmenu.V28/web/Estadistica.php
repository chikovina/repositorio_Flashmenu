<!DOCTYPE html>
<html lang="es">
<head>
    <title>Reporte</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/reset.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/layout.css" type="text/css" media="screen"> 
    <link rel="stylesheet" href="css/prettyPhoto.css" type="text/css" media="screen">
    <script src="js/jquery-1.7.1.min.js" type="text/javascript"></script>
    <script src="js/cufon-yui.js" type="text/javascript"></script>
    <script src="js/cufon-replace.js" type="text/javascript"></script> 
    <script src="js/Dynalight_400.font.js" type="text/javascript"></script>
    <script src="js/FF-cash.js" type="text/javascript"></script>  
    <script src="js/jquery.prettyPhoto.js" type="text/javascript"></script> 
    <script src="js/hover-image.js" type="text/javascript"></script>
    <script src="js/jquery.easing.1.3.js" type="text/javascript"></script>  
    <script src="js/jquery.bxSlider.js" type="text/javascript"></script> 
    <script src="js/script.js" type="text/javascript"></script>  
    <script src="js/validaciones.js" type="text/javascript"></script> 

<?php
// include db connect class
require_once __DIR__ . '/db_connect.php';
// connecting to db
$db = new DB_CONNECT();

////////Muestra recomendación

?>
</head>


<body id="page3">
<!--==============================header=================================-->
    <header>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
    	<div class="row-top">
        	<div class="main">
            	<div class="wrapper">
                	<h1><a href="index.html">Flashmenu<span>.cl</span></a></h1>
                    <nav>
                        <ul class="menu">
                            <!-- <li><a href="index.html">Home</a></li>-->
                            <li><a href="perfilAdm.php?var1=<?php echo "$var1"?>">Perfil</a></li>
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
                	<h2>Estadisticas de recomendacion <span></span></h2>
                </div>
            </div>
        </div>
    </header>
    
<!--==============================content================================-->
    <section id="content"><div class="ic"></div>
        <div class="main">
            <div class="container">
            	<h3 class="prev-indent-bot"></h3>
               

</br>
   
<a href='reporte.php' class="button-2" onClick="document.getElementById('contact-form').submit()" >Ver Reporte</a>
</br>

<h3 align="left"><font color= "#000000" > Top 3 mas comprados</font></h3>
<?php
$result = mysql_query("SELECT DISTINCT Cliente_nombre, Recomendaciones_menu, Producto_nombre, Rest_nombre, idCliente, Menu_nombre, Recomendaciones_fecha
FROM Recomendaciones a, Productos_comprados b, Cliente c, Producto d, Restaurant e, Menu f, Producto_has_Cliente g
WHERE d.idProducto = a.Recomendaciones_menu
AND d.Restaurant_idRestaurant = e.idRestaurant
AND d.Producto_tipo =  'platos'
AND g.Producto_idProducto = d.idProducto
GROUP BY g.cantidad
ORDER BY g.cantidad DESC 
LIMIT 0 , 3") or die(mysql_error());

if (mysql_num_rows($result) > 0) {

    echo "<table> \n"; 
    echo "<tr><td>Recomendación</td><td>Restaurant</td><td>Fecha</td></tr> \n"; 
   
        while ($row = mysql_fetch_array($result)) {
       
            $Producto_nombre = $row["Producto_nombre"];
            $Rest_nombre = $row["Rest_nombre"];
            $Reserva_fecha = $row["Reserva_fecha"];

        echo "<tr><td>$row[2]</td><td>$row[3]</td><td>$row[6]</td></tr> \n"; 
 
        }

    echo "</table> \n"; 
    /////////reserva
} 
else {
    echo "No hay menús";
}

?>

</br>

<h3><font color= "#000000" > Top 3 menos comprados</font></h3>
<?php
$result = mysql_query("SELECT DISTINCT Cliente_nombre, Recomendaciones_menu, Producto_nombre, Rest_nombre, idCliente, Menu_nombre, Recomendaciones_fecha
FROM Recomendaciones a, Productos_comprados b, Cliente c, Producto d, Restaurant e, Menu f, Producto_has_Cliente g
WHERE d.idProducto = a.Recomendaciones_menu
AND d.Restaurant_idRestaurant = e.idRestaurant
AND d.Producto_tipo =  'platos'
AND g.Producto_idProducto = d.idProducto
GROUP BY g.cantidad
ORDER BY g.cantidad ASC 
LIMIT 0 , 3") or die(mysql_error());

if (mysql_num_rows($result) > 0) {

    echo "<table> \n"; 
    echo "<tr><td>Recomendación</td><td>Restaurant</td><td>Fecha</td></tr> \n"; 
   
        while ($row = mysql_fetch_array($result)) {
       
            $Producto_nombre = $row["Producto_nombre"];
            $Rest_nombre = $row["Rest_nombre"];
            $Reserva_fecha = $row["Reserva_fecha"];

        echo "<tr><td>$row[2]</td><td>$row[3]</td><td>$row[6]</td></tr> \n"; 
 
        }

    echo "</table> \n"; 
    /////////reserva
} 
else {
    echo "No hay menús";
}

?>

</br>
   
<!-- -->

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
