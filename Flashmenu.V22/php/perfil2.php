<?php
/*
 * Following code will list all the products
 */

// include db connect class
require_once __DIR__ . '/db_connect.php';

// connecting to db
$db = new DB_CONNECT();
$v1=$_GET['var1'];
$result = mysql_query("SELECT *FROM administrador_restaurant WHERE idAdministrador_restaurant = 1") or die(mysql_error());

if (mysql_num_rows($result) > 0) {
   
    while ($row = mysql_fetch_array($result)) {
       
        $idAdministrador_restaurant = $row["idAdministrador_restaurant"];
        $Adm_nombre = $row["Adm_nombre"];
        $Adm_email = $row["Adm_email"];
        $Adm_direccion = $row["Adm_direccion"];
        $Adm_apellidoPaterno = $row["Adm_apellidoPaterno"];
        $Adm_apellidoMaterno = $row["Adm_apellidoMaterno"];
        $Adm_rut = $row["Adm_rut"];
    }

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

 <center>
   <a href='list.php'?var='idAdministrador_restaurant'><button>Mis restaurantes</button></a>
</center>


<!-- -->


        


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

</body>
</html>
