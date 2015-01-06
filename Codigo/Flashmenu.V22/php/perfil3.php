<?php
$var1=$_GET['var1'];
/*
 * Following code will list all the products
 */

// include db connect class
/*
require_once __DIR__ . '/db_connect.php';

// connecting to db
$db = new DB_CONNECT();

$result = mysql_query("SELECT *FROM platos WHERE Restaurant_idRestaurant = '$var1'") or die(mysql_error());

if (mysql_num_rows($result) > 0) {
   
    while ($row = mysql_fetch_array($result)) {
       
        $idPlatos = $row["idPlatos"];
        $Platos_nombre = $row["Platos_nombre"];
        $Platos_descripcion = $row["Platos_descripcion"];
        $Platos_precio = $row["Platos_precio"];
      }*/
?>


<!DOCTYPE html>
    <html lang="en">
 
<head>
    <LINK REL="SHORTCUT ICON" HREF="imagenes/favicon.png"> 
 <title>Check Login</title>
 <meta charset = "utf8" />
    </head>


         <body background="imagenes/bg.jpg">

        <br>
        <br>
        <center><span style="font-size:55px;"> <h1> <font color="red" face = "Berlin Sans FB"> FLASHMENU</font> </h1> </span></center>
        </br>
        </br>

 <center><h1><font color= "white"> Perfil restaurant</font></h1> </center>

    
    <center>
    <?php    
    echo "<a href='ing.php?var1=$var1'><button>Ingresar platos</button></a>"

    ?>
    <a href='ver.php'><button>Ver platos</button></a>
    </center>


<!--
<?php
/*
} 
else {
    // no products found
    $response["success"] = 0;
    $response["message"] = "No restaurant found";

    // echo no users JSON
    echo json_encode($response);
}

*/
?>
-->




</body>
</html>
