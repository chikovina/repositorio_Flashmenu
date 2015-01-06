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
        
<!DOCTYPE html>
<html lang="en">
<head>
<LINK REL="SHORTCUT ICON" HREF="imagenes/favicon.png"> 
    <title>Registrar Usuario</title>
    <meta charset = "utf-8">
</head>
    <body background="imagenes/bg.jpg">
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
    </body>
</html>