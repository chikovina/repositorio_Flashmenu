<?php

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
$result = mysql_query("SELECT *FROM bebidas WHERE Restaurant_idRestaurant = 5") or die(mysql_error());

// check for empty result
if (mysql_num_rows($result) > 0) {
    // looping through all results
    // products node
    $response["bebidas"] = array();
    
    while ($row = mysql_fetch_array($result)) {
        // temp user array
        $bebida = array();
        $bebida["Bebidas_nombre"] = $row["Bebidas_nombre"];
        $bebida["Bebidas_descripcion"] = $row["Bebidas_descripcion"];
        $bebida["Bebidas_precio"] = $row["Bebidas_precio"];
        //$product["created_at"] = $row["created_at"];
        //$product["updated_at"] = $row["updated_at"];



        // push single product into final response array
        array_push($response["bebidas"], $bebida);
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
