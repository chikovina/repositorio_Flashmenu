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


   <a href='list.php'?var='idAdministrador_restaurant'><button id = 'a'>Mis restaurantes</button></a>

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


<!-- JS  -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.js"></script>
    <script>window.jQuery || document.write("<script src='js/jquery-1.5.1.min.js'>\x3C/script>")</script>
    <script src="js/app.js"></script>


</body>
</html>
