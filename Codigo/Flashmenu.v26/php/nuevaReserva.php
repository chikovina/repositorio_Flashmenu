<?php

/*
 * Following code will create a new product row
 * All product details are read from HTTP Post Request
 */

// array for JSON response
$response = array();

// check for required fields
if (isset($_POST['Reserva_fecha']) && isset($_POST['Reserva_hora']) && isset($_POST['Cliente_idCliente'])) {
    
    //$idAdm = $_POST['idAdministrador_restaurant'];
    $Reserva_fecha = $_POST['Reserva_fecha'];
    $Reserva_hora = $_POST['Reserva_hora'];
    $Cliente_idCliente = $_POST['Cliente_idCliente'];


    // include db connect class
    require_once __DIR__ . '/db_connect.php';

    // connecting to db
    $db = new DB_CONNECT();

    // mysql inserting a new row
   // $result = mysql_query("INSERT INTO administrador_restaurant(idAdministrador_restaurant, Adm_rut, Adm_nombre, Adm_apellidoPaterno, Adm_apellidoMaterno, Adm_direccion, Adm_email) VALUES('$idAdm', '$rutAdm' ,'$nombreAdm', '$apellidoPaternoAdm', '$apellidoMaternoAdm', '$direccionAdm', '$emailAdm')");
 $result = mysql_query("INSERT INTO reserva(Reserva_fecha, Reserva_hora, Cliente_idCliente) VALUES('$Reserva_fecha' ,'$Reserva_hora', '$Cliente_idCliente')");

    // check if row inserted or not
    if ($result) {
        // successfully inserted into database
        $response["success"] = 1;
        $response["message"] = "Reserva successfully created.";

        // echoing JSON response
        echo json_encode($response);
    } else {
        // failed to insert row
        $response["success"] = 0;
        $response["message"] = "Oops! An error occurred.";
        
        // echoing JSON response
        echo json_encode($response);
    }
} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";

    // echoing JSON response
    echo json_encode($response);
}
?>