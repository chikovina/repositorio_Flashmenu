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
$result = mysql_query("SELECT * FROM restaurant WHERE Administrador_restaurant_idAdministrador_restaurant = '$buscar'") or die(mysql_error());

// check for empty result
if (mysql_num_rows($result) > 0) {
    // looping through all results
    // products node
    $response["restaurant"] = array();
    
    while ($row = mysql_fetch_array($result)) {
        // temp user array
        $restaurantes = array();
        $restaurantes["nombre"] = $row["Rest_nombre"];
        $restaurantes["tipo"] = $row["Rest_tipo"];
        $restaurantes["descripcion"] = $row["Rest_descripcion"];
        $restaurantes["caracteristicas"] = $row["Rest_caracteristicas"];

        //$product["created_at"] = $row["created_at"];
        //$product["updated_at"] = $row["updated_at"];



        // push single product into final response array
        array_push($response["restaurant"], $restaurantes);
    }
    // success
    $response["success"] = 1;

    // echoing JSON response
    echo json_encode($response);
} else {
    // no products found
    $response["success"] = 0;
    $response["message"] = "No restaurantes found";

    // echo no users JSON
    echo json_encode($response);
}
?>