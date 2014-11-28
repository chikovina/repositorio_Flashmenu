<?php

$var1=$_GET['var1'];

if(isset($_POST['submit'])){
  // include db connect class
    require_once __DIR__ . '/db_connect.php';
    // connecting to db
    $db = new DB_CONNECT();
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
  $query = "INSERT INTO platos (Platos_nombre, Platos_descripcion, Platos_precio, Restaurant_idRestaurant) VALUES ('$nombre', '$descripcion', '$precio', '$var1')";
     if (!mysql_query($query))
         {
         die('Error: ' . mysql_error());
         echo "Error al crear el plato." . "<br />";
         }
         else{
         echo "<br />" . "<h2>" . "Plato Creado Exitosamente!" . "</h2>";
         echo "<h4>" . "Nombre plato: " . $_POST['nombre'] . "</h4>";
         }
         //}
         mysql_close($conexion);
     }
        ?>
        
<!doctype html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->     <html lang="es"> <!--<![endif]-->
<head>
<LINK REL="SHORTCUT ICON" HREF="images/favicon.png"> 
    <!-- General Metas -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  <!-- Force Latest IE rendering engine -->
    <title>Login Form</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
    
    <!-- Stylesheets -->
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/skeleton.css">
    <link rel="stylesheet" href="css/layout.css">
    
</head>
<body>

    <!--<div class="notice">
        <a href="" class="close">close</a>
        <p class="warn">Whoops! We didn't recognise your username or password. Please try again.</p>
    </div>-->

<br>
        <br>
        <center><span style="font-size:55px;"> <h1> <font color="red" face = "Berlin Sans FB"> FLASHMENU</font> </h1> </span></center>
        </br>
        </br>

    <header>
         <center><h1><font color= "white"> Ingresar platos: </font></h1> </center>
    </header>  
    <form  name="procesar-usuario" enctype="multipart/form-data" action="ing.php?var1=<?php echo $var1?>">
<center>
    <hr/>
    <!--Nombre plato-->
     <label for="nombre"><font color= "white">Nombre plato:</font></label>
     <input type="text" name="nombre" maxlength="30" />
    <br/><br/>

     <!--descripcion plato--> 
     <label for="descripcion"><font color= "white">Descripcion:</font></label>
     <input type="text" name="descripcion" maxlength="30" />
     <br/><br/>
    <!--precio plato-->
     <label for="precio"><font color= "white">Precio:</font></label>
     <input type="text" name="precio" maxlength="16" />
    <br/><br/>
<input type="submit" name="submit" value="Ingresar..." formmethod="post" />
<input type="reset" name="clear" value="Borrar"/>
    </center>
    </form>
<hr />



    
<!-- JS  -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.js"></script>
    <script>window.jQuery || document.write("<script src='js/jquery-1.5.1.min.js'>\x3C/script>")</script>
    <script src="js/app.js"></script>


</body>
</html>