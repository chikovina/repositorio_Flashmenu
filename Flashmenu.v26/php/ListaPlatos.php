<?php
$buscar=$_POST["buscar"];

/*
 * Following code will list all the products
 */

// array for JSON response
$response = array();


// include db connect class
require_once __DIR__ . '/db_connect.php';

// connecting to db
$db = new DB_CONNECT();

// get all products from products table
//$result = mysql_query("SELECT *FROM platos WHERE Restaurant_idRestaurant = idRestaurant") or die(mysql_error());
$result = mysql_query("SELECT * FROM platos WHERE Restaurant_idRestaurant = '$buscar'") or die(mysql_error());

// check for empty result
if (mysql_num_rows($result) > 0) {
    // looping through all results
    // products node
    $response["platos"] = array();
    
    while ($row = mysql_fetch_array($result)) {
        // temp user array
        $platos = array();
        $platos["Platos_nombre"] = $row["Platos_nombre"];
        $platos["Platos_descripcion"] = $row["Platos_descripcion"];
        $platos["Platos_precio"] = $row["Platos_precio"];
        $platos["Restaurant_idRestaurant"] = $row["Restaurant_idRestaurant"];
        //$product["created_at"] = $row["created_at"];
        //$product["updated_at"] = $row["updated_at"];



        // push single product into final response array
        array_push($response["platos"], $platos);
    }
    // success
    $response["success"] = 1;

    // echoing JSON response
    echo json_encode($response);
} else {
    // no products found
    $response["success"] = 0;
    $response["message"] = "No restaurant found";

    // echo no users JSON
    echo json_encode($response);
}
?>
