<?php

/*
 * Following code will list all the products
 */
//$v1=$_GET['var'];
// include db connect class
require_once __DIR__ . '/db_connect.php';

// connecting to db
$db = new DB_CONNECT();
?>

<!DOCTYPE html>
    <html lang="en">
 
<head>
    <LINK REL="SHORTCUT ICON" HREF="images/favicon.png"> 
 <title>Lista restaurantes</title>
 <meta charset = "utf8" />
    </head>
     
    <body background="images/bg.jpg">

        <br>
        <br>
        <center><span style="font-size:55px;"> <h1> <font color="red" face = "Berlin Sans FB"> FLASHMENU</font> </h1> </span></center>
        </br>
        </br>

 <center><h1><font color= "white"> Lista de mis restaurantes</font></h1> 

<?php
$result = mysql_query("SELECT *FROM restaurant WHERE Administrador_restaurant_idAdministrador_restaurant = 2") or die(mysql_error());

if (mysql_num_rows($result) > 0) {

    echo "<table border = '2' color = white bgcolor = '#C5C5C5'> \n"; 
echo "<tr><td>Nombre</td><td>Direccion</td></tr> \n"; 
   
    while ($row = mysql_fetch_array($result)) {
       
        $idRestaurant = $row["Administrador_restaurant_idAdministrador_restaurant"];
        $Rest_nombre = $row["Rest_nombre"];
        $Rest_tipo = $row["Rest_tipo"];
        $Rest_descripcion = $row["Rest_descripcion"];
        $Rest_email = $row["Rest_email"];
        $Rest_direccion = $row["Rest_direccion"];


 echo "<tr><td><a href='perfil3.php?var1=$row[0]'>$Rest_nombre</a></td><td>$row[6]</td></tr> \n"; 
    }



echo "</table> \n"; 

            

    ?>

   </center>

<?php
} 
else {
    // no products found
    $response["success"] = 0;
    $response["message"] = "No restaurant found";

    // echo no users JSON
    echo json_encode($response);
}
?>
