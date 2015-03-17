<?php

$var1=$_GET['var1'];

$perfilAdm=$_GET['perfilAdm'];

if(isset($_POST['submit'])){
  // include db connect class
    require_once __DIR__ . '/db_connect.php';
    // connecting to db
    $db = new DB_CONNECT();
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $tipo = $_POST['tipo'];
  $query = "INSERT INTO Producto (Producto_nombre, Producto_descripcion, Producto_precio, Producto_tipo, Restaurant_idRestaurant) VALUES ('$nombre', '$descripcion', '$precio', '$tipo', '$var1')";
     if (!mysql_query($query))
         {
     
         die('Error: ' . mysql_error());
      //   echo "Error al crear el plato." . "<br />";
         }
        else{
      //   echo "<br />" . "<h2>" . "Producto Creado Exitosamente!" . "</h2>";
       //  echo "<h4>" . "Nombre Producto: " . $_POST['nombre'] . "</h4>";
         }
         //}
         mysql_close($conexion);
     }
        ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>Ingresar producto</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/reset.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/layout.css" type="text/css" media="screen"> 
    <script src="js/jquery-1.7.1.min.js" type="text/javascript"></script>
    <script src="js/cufon-yui.js" type="text/javascript"></script>
    <script src="js/cufon-replace.js" type="text/javascript"></script> 
    <script src="js/Dynalight_400.font.js" type="text/javascript"></script>
    <script src="js/FF-cash.js" type="text/javascript"></script>  
	<!--[if lt IE 8]>
    <div style=' clear: both; text-align:center; position: relative;'>
        <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
        	<img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
        </a>
    </div>
	<![endif]-->
    <!--[if lt IE 9]>
   		<script type="text/javascript" src="js/html5.js"></script>
	<![endif]-->

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
                            <li><a href="perfilAdm.php?var1=<?php echo "$perfilAdm"?>">Perfil</a></li>
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
                	<h2>Ingresar <span>productos a la carta</span></h2>
                </div>
            </div>
        </div>
    </header>
    
	<!--==============================content================================-->
    <section id="content"><div class="ic"></div>
        <div class="main">
            <div class="wrapper">
            	 
                   <form class="basic-grey" action="ingresarRestaurant.php?var1=<?php echo $var1?><?php echo "&perfilAdm=$perfilAdm"?>">
                    <h3 class="p1">Ingresar datos</h3>
                        <center>
                            <hr/>
                            <!--Nombre plato-->
                             <label>
                             <span>Nombre plato:</span>
                             <input type="text" name="nombre" maxlength="30" />
                             </label>
                            <br/><br/>

                             <!--descripcion plato--> 
                             <label>
                             <span>Descripcion:</span>
                             <input type="text" name="descripcion" maxlength="30" />
                             </label>
                             <br/><br/>

                            <!--precio plato-->
                             <label>
                             <span>Precio:</span>
                             <input type="number" name="precio" maxlength="16" />
                             </label>
                             <br/><br/>

                             <label>
                            <span>Tipo:</span>
                             <select name="tipo">
                              <option value="platos">Platos</option>
                              <option value="bebidas">Bebidas</option>
                              <option value="postres">Postres</option>
                            </select>
                          </label>
                              <br/><br/>
                                 

      <input class="button-2" onclick="alert('Plato creado exitosamente!')" type="submit" name="submit" value="Ingresar" formmethod="post" />
                      
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
