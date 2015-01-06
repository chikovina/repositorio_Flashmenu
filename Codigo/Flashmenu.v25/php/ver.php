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

 <center><h1><font color= "white"> Carta</font></h1> 

<?php
$var1=$_GET['var1'];
$result = mysql_query("SELECT *FROM platos WHERE Restaurant_idRestaurant = '$var1'") or die(mysql_error());

if (mysql_num_rows($result) > 0) {

    echo "<table border = '2' color = white bgcolor = '#C5C5C5'> \n"; 
echo "<tr><td>Nombre</td><td>Descripcion</td><td>Precio</td></tr> \n"; 
   
    while ($row = mysql_fetch_array($result)) {
       
        $idPlatos = $row["idPlatos"];
        $Platos_nombre = $row["Platos_nombre"];
        $Platos_descripcion = $row["Platos_descripcion"];
        $Platos_precio = $row["Platos_precio"];
        $Restaurant_idRestaurant = $row["Restaurant_idRestaurant"];


 echo "<tr><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td></tr> \n"; 
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



<!-- JS  -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.js"></script>
    <script>window.jQuery || document.write("<script src='js/jquery-1.5.1.min.js'>\x3C/script>")</script>
    <script src="js/app.js"></script>


</body>
</html>
