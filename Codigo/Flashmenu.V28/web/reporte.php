  <?php

// include db connect class
require_once __DIR__ . '/db_connect.php';

// connecting to db
$db = new DB_CONNECT();

    function todo($x, $y){
    $arreglo = array();
    $arregloNombreCliente = array();
    $arregloNombreRest = array();
    $i = 0;
    $z=0;

    if (mysql_num_rows($x) > 0) {

        while ($row = mysql_fetch_array($x)) {

            $arreglo[$i] = $row[2];  
            $arregloNombreCliente[$i] = $row[0]; 
            $arregloNombreRest[$i] = $row[3];

            $i++;
        }
    } 
    if (mysql_num_rows($y) > 0) {

        echo "<table id='t01'> \n"; 

        echo "<tr id='tt01'><td id='c01'>Cliente</td><td id='c04'>Restaurant</td><td id='c02'>Recomendación</td><td id='c03'>Compra</td><td id='c05'>Fecha</td></tr> \n"; 
       
            while ($row2 = mysql_fetch_array($y)) {


            echo "<tr><td>"; echo $arregloNombreCliente[$z]; echo "</td><td>"; echo $arregloNombreRest[$z]; echo "</td><td>"; echo $arreglo[$z]; echo"</td><td>$row2[1]</td><td>$row2[2]</td></tr> \n"; 

            $z++;   
    } 

        echo "</table> \n"; 
    }
} 

?>




<!DOCTYPE html>
<html lang="es">
<head>
    <title>Reporte</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="css/reset.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/layout.css" type="text/css" media="screen"> 
    <link rel="stylesheet" href="css/prettyPhoto.css" type="text/css" media="screen">
    <script src="js/jquery-1.7.1.min.js" type="text/javascript"></script>
    <script src="js/cufon-yui.js" type="text/javascript"></script>
    <script src="js/cufon-replace.js" type="text/javascript"></script> 
    <script src="js/Dynalight_400.font.js" type="text/javascript"></script>
    <script src="js/FF-cash.js" type="text/javascript"></script>  
    <script src="js/jquery.prettyPhoto.js" type="text/javascript"></script> 
    <script src="js/hover-image.js" type="text/javascript"></script>
    <script src="js/jquery.easing.1.3.js" type="text/javascript"></script>  
    <script src="js/jquery.bxSlider.js" type="text/javascript"></script> 
    <script type="text/javascript">
        $(document).ready(function() {
            $('#slider-2').bxSlider({
                pager: true,
                controls: false,
                moveSlideQty: 1,
                displaySlideQty: 4
            });
            $("a[data-gal^='prettyPhoto']").prettyPhoto({theme:'facebook'});
        }); 
    </script>



</head>

<body id="page3">
    <!--==============================header=================================-->
    <header>
        <div class="row-top">
            <div class="main">
                <div class="wrapper">
                    <h1><a href="index.html">Flashmenu<span>.cl</span></a></h1>
                    <nav>
                        <ul class="menu">
                            <!-- <li><a href="index.html">Home</a></li>-->
                            <li><a href="perfilAdm.php?var1=<?php echo "$var1"?>">Perfil</a></li>
                            <li><a href="index.html">Cerrar sesion </a></li>
                            <li><a href="contact.php">Contacto</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="row-bot">
            <div class="row-bot-bg">
                <div class="main">
                    <h2>Reporte de recomendador <span><?php echo "$admnombre" ?></span></h2>
                </div>
            </div>
        </div>
    </header>

<!--==============================content================================-->
    <section id="content"><div class="ic"></div>
        <div class="main">
            <div class="container">
                <h3 class="prev-indent-bot"></h3>

<!-- Para imprimir reporte -->


                    <input class="button-2" type="button" name="imprimir" value="Imprimir reporte"  onClick="window.print();"/>
                    <a href='Estadistica.php' class="button-2" onClick="document.getElementById('contact-form').submit()" >Ver estadisticas</a>

                    </br>
                    </br>
                        <div>
                            <form class="basic-grey" action="reporte.php" method="post">
                                  <?php
                           $result = mysql_query("SELECT DISTINCT Cliente_nombre, Recomendaciones_menu, Producto_nombre, Rest_nombre, idCliente, Menu_nombre
                                                    FROM Recomendaciones a, Productos_comprados b, Cliente c, Producto d, Restaurant e, Menu f
                                                    WHERE a.Cliente_idCliente = c.idCliente 
                                                    AND d.idProducto = a.Recomendaciones_menu
                                                    AND d.Restaurant_idRestaurant = e.idRestaurant
                                                    GROUP BY a.Recomendaciones_menu") or die(mysql_error());

                $result2 = mysql_query("SELECT DISTINCT Cliente_nombre, Productos_comprados_detalle, Productos_comprados_fecha
                                            FROM Productos_comprados a, Cliente b") or die(mysql_error());
            if(isset($_POST['submit'])){

                  //  echo "<form method='post' action='reporte.php'>";
                if (mysql_num_rows($result) > 0) {

                                        if(strcmp($_POST['seleccion'], "Todo") == 0){             
                           
                           todo($result, $result2);
                          }
               
                    if(strcmp($_POST['seleccion'], "Cliente") == 0){             
                           while ($row = mysql_fetch_array($result)) {  

                             $combobit .= " <option value = '".$row['Cliente_nombre']."'>".$row['Cliente_nombre']."</option>";
                         }
                            $input = "<input type ='submit' value='Buscar' name = 'submit2' formmethod='post'/> "; 
                          }
                  
                        
                    
                 else if(strcmp($_POST['seleccion'], "Rest_nombre")== 0){
                         
  while ($row = mysql_fetch_array($result)) {  
                             $combobit .= " <option value = '".$row['Rest_nombre']."'>".$row['Rest_nombre']."</option>";
                         }
                       $input= "<input type ='submit' value='Buscar' name = 'submit3' formmethod='post'/> "; 
                        
                    }
                  
                  else if(strcmp($_POST['seleccion'], "Producto_nombre")== 0){
                           while ($row = mysql_fetch_array($result)) {  

                             $combobit .= " <option value = '".$row['Producto_nombre']."'>".$row['Producto_nombre']."</option>";
                         }
                       $input ="<input type ='submit' value='Buscar' name = 'submit4' formmethod='post'/> "; 
                        
                    }
                  

                     else if(strcmp($_POST['seleccion'], "Menu_nombre")== 0){
                       
  while ($row = mysql_fetch_array($result)) {  
                             $combobit .= " <option value = '".$row['Menu_nombre']."'>".$row['Menu_nombre']."</option>";
                         }
                       $input ="<input type ='submit' value='Buscar' name = 'submit5' formmethod='post'/> "; 
                       
                    }
                   
                    
                        else{
                            if(strcmp($_POST['seleccion'], "Reserva_fecha")== 0){
                       
  while ($row = mysql_fetch_array($result)) {  
                             $combobit .= " <option value = '".$row['Reserva_fecha']."'>".$row['Reserva_fecha']."</option>";
                         }
                      $input= "<input type ='submit' value='Buscar' name = 'submit6' formmethod='post'/> "; 
                  }
                       
                        }
                    }
                       

}



    if(isset($_POST['submit2'])){

           
                        $n = $_POST['Filtrado2'];
                       // if(strcmp($_POST['Cliente_nombre'], "Cliente_nombre")== 0){
                        $arregloNombreCliente = array();
                        $arregloNombreRest = array(); 
                        $arreglo = array();
                        $i = 0;
                        $z=0;


                       
                        $resultz = mysql_query("SELECT DISTINCT Cliente_nombre, Recomendaciones_menu, Producto_nombre, Rest_nombre
                                                FROM Recomendaciones a, Productos_comprados b, Cliente c, Producto d, Restaurant e, Menu f
                                                WHERE a.Cliente_idCliente = c.idCliente 
                                                AND d.idProducto = a.Recomendaciones_menu
                                                AND d.Restaurant_idRestaurant = e.idRestaurant
                                                AND c.Cliente_nombre = '$n'") or die(mysql_error());

                        

                        if (mysql_num_rows($resultz) > 0) {

                            while ($row3 = mysql_fetch_array($resultz)) {

                                $arreglo[$i] = $row3[2];  
                                $arregloNombreCliente[$i] = $row3[0]; 
                                $arregloNombreRest[$i] = $row3[3];
                                $i++;
                            }

                          $result2z = mysql_query("SELECT DISTINCT Cliente_nombre, Productos_comprados_detalle, Productos_comprados_fecha FROM Productos_comprados a, Cliente b
WHERE b.Cliente_nombre = '$n'
GROUP BY Productos_comprados_detalle") or die(mysql_error());

                        if (mysql_num_rows($result2z) > 0) {

                            echo "<table id='t01'> \n"; 
                            echo "<tr id='tt01'><td id='c01'>Cliente</td><td id='c04'>Restaurant</td><td id='c02'>Recomendación</td><td id='c03'>Compra</td><td id='c05'>Fecha</td></tr> \n"; 
                           
                                while ($row2 = mysql_fetch_array($result2z)) {

                                echo "<tr><td>"; echo $arregloNombreCliente[$z]; echo "</td><td>"; echo $arregloNombreRest[$z]; echo "</td><td>"; echo $arreglo[$z]; echo"</td><td>$row2[1]</td><td>$row2[2]</td></tr> \n"; 
                                $z++;   
                               } 
                            echo "</table> \n"; 
                      //  }
                }
                         } 

         
           }

           if(isset($_POST['submit3'])){
                        $n = $_POST['Filtrado2'];
                       // if(strcmp($_POST['Cliente_nombre'], "Cliente_nombre")== 0){
                        $arregloNombreCliente = array();
                        $arregloNombreRest = array(); 
                        $arreglo = array();
                        $i = 0;
                        $z=0;


                       
                        $resultz = mysql_query("SELECT DISTINCT Cliente_nombre, Recomendaciones_menu, Producto_nombre, Rest_nombre
                                                FROM Recomendaciones a, Productos_comprados b, Cliente c, Producto d, Restaurant e, Menu f
                                                WHERE a.Cliente_idCliente = c.idCliente 
                                                AND d.idProducto = a.Recomendaciones_menu
                                                AND d.Restaurant_idRestaurant = e.idRestaurant
                                                AND e.Rest_nombre = '$n'") or die(mysql_error());

                        

                        if (mysql_num_rows($resultz) > 0) {

                            while ($row3 = mysql_fetch_array($resultz)) {

                                $arreglo[$i] = $row3[2];  
                                $arregloNombreCliente[$i] = $row3[0]; 
                                $arregloNombreRest[$i] = $row3[3];
                                $i++;
                            }

                          $result2z = mysql_query("SELECT DISTINCT Cliente_nombre, Productos_comprados_detalle, Rest_nombre, Productos_comprados_fecha 
                                                    FROM Productos_comprados a, Cliente b, Producto c, Restaurant d
                                                    WHERE c.Producto_nombre = a.Productos_comprados_detalle
                                                    AND c.Restaurant_idRestaurant = d.idRestaurant
                                                    AND d.Rest_nombre  = '$n'") or die(mysql_error());

                        if (mysql_num_rows($result2z) > 0) {

                            echo "<table id='t01'> \n"; 
                            echo "<tr id='tt01'><td id='c01'>Cliente</td><td id='c04'>Restaurant</td><td id='c02'>Recomendación</td><td id='c03'>Compra</td><td id='c05'>Fecha</td></tr> \n"; 
                           
                                while ($row2 = mysql_fetch_array($result2z)) {

                                echo "<tr><td>"; echo $arregloNombreCliente[$z]; echo "</td><td>"; echo $arregloNombreRest[$z]; echo "</td><td>"; echo $arreglo[$z]; echo"</td><td>$row2[1]</td><td>$row2[2]</td></tr> \n"; 
                                $z++;   
                               } 
                            echo "</table> \n"; 
                      //  }
                }
                         } 

         
           }

           if(isset($_POST['submit4'])){
                        $n = $_POST['Filtrado2'];
                       // if(strcmp($_POST['Cliente_nombre'], "Cliente_nombre")== 0){
                        $arregloNombreCliente = array();
                        $arregloNombreRest = array(); 
                        $arreglo = array();
                        $i = 0;
                        $z=0;


                       
                        $resultz = mysql_query("SELECT DISTINCT Cliente_nombre, Recomendaciones_menu, Producto_nombre, Rest_nombre
                                                FROM Recomendaciones a, Productos_comprados b, Cliente c, Producto d, Restaurant e, Menu f
                                                WHERE a.Cliente_idCliente = c.idCliente 
                                                AND d.idProducto = a.Recomendaciones_menu
                                                AND d.Restaurant_idRestaurant = e.idRestaurant
                                                AND d.Producto_nombre = '$n'") or die(mysql_error());

                        

                        if (mysql_num_rows($resultz) > 0) {

                            while ($row3 = mysql_fetch_array($resultz)) {

                                $arreglo[$i] = $row3[2];  
                                $arregloNombreCliente[$i] = $row3[0]; 
                                $arregloNombreRest[$i] = $row3[3];
                                $i++;
                            }

                          $result2z = mysql_query("SELECT DISTINCT Cliente_nombre, Productos_comprados_detalle, Productos_comprados_fecha FROM Productos_comprados a, Cliente b
                                                WHERE a.Productos_comprados_detalle = '$n'") or die(mysql_error());

                        if (mysql_num_rows($result2z) > 0) {

                            echo "<table id='t01'> \n"; 
                            echo "<tr id='tt01'><td id='c01'>Cliente</td><td id='c04'>Restaurant</td><td id='c02'>Recomendación</td><td id='c03'>Compra</td><td id='c05'>Fecha</td></tr> \n"; 
                           
                                while ($row2 = mysql_fetch_array($result2z)) {

                                echo "<tr><td>"; echo $arregloNombreCliente[$z]; echo "</td><td>"; echo $arregloNombreRest[$z]; echo "</td><td>"; echo $arreglo[$z]; echo"</td><td>$row2[1]</td><td>$row2[2]</td></tr> \n"; 
                                $z++;   
                               } 
                            echo "</table> \n"; 
                      //  }
                }
                         } 

         
           }

                      if(isset($_POST['submit5'])){
                        $n = $_POST['Filtrado2'];
                       // if(strcmp($_POST['Cliente_nombre'], "Cliente_nombre")== 0){
                        $arregloNombreCliente = array();
                        $arregloNombreRest = array(); 
                        $arreglo = array();
                        $i = 0;
                        $z=0;


                       
                        $resultz = mysql_query("SELECT DISTINCT Cliente_nombre, Recomendaciones_menu, Producto_nombre, Rest_nombre, Menu_nombre
FROM Recomendaciones a, Productos_comprados b, Cliente c, Producto d, Restaurant e, Menu f, Producto_has_Menu g
WHERE 
g.Producto_idProducto = a.Recomendaciones_menu
AND g.Menu_idMenu = f.idMenu
AND g.Producto_idProducto = d.idProducto
AND f.Menu_nombre = '$n'") or die(mysql_error());

                        

                        if (mysql_num_rows($resultz) > 0) {

                            while ($row3 = mysql_fetch_array($resultz)) {

                                $arreglo[$i] = $row3[2];  
                                $arregloNombreCliente[$i] = $row3[0]; 
                                $arregloNombreRest[$i] = $row3[3];
                                $i++;
                            }

                          $result2z = mysql_query("SELECT DISTINCT Cliente_nombre, Productos_comprados_detalle, Productos_comprados_fecha, Menu_nombre 
FROM Productos_comprados a, Cliente b, Menu c, Producto d, Producto_has_Menu e
WHERE c.Menu_nombre = '$n'") or die(mysql_error());

                        if (mysql_num_rows($result2z) > 0) {

                            echo "<table id='t01'> \n"; 
                            echo "<tr id='tt01'><td id='c01'>Cliente</td><td id='c04'>Restaurant</td><td id='c02'>Recomendación</td><td id='c03'>Compra</td><td id='c05'>Fecha</td></tr> \n"; 
                           
                                while ($row2 = mysql_fetch_array($result2z)) {

                                echo "<tr><td>"; echo $arregloNombreCliente[$z]; echo "</td><td>"; echo $arregloNombreRest[$z]; echo "</td><td>"; echo $arreglo[$z]; echo"</td><td>$row2[1]</td><td>$row2[2]</td></tr> \n"; 
                                $z++;   
                               } 
                            echo "</table> \n"; 
                      //  }
                }
                         } 

         
           }

                      if(isset($_POST['submit6'])){
                        $n = $_POST['Filtrado2'];
                       // if(strcmp($_POST['Cliente_nombre'], "Cliente_nombre")== 0){
                        $arregloNombreCliente = array();
                        $arregloNombreRest = array(); 
                        $arreglo = array();
                        $i = 0;
                        $z=0;


                       
                        $resultz = mysql_query("SELECT DISTINCT Cliente_nombre, Recomendaciones_menu, Producto_nombre, Rest_nombre
                                                FROM Recomendaciones a, Productos_comprados b, Cliente c, Producto d, Restaurant e, Menu f
                                                WHERE a.Cliente_idCliente = c.idCliente 
                                                AND d.idProducto = a.Recomendaciones_menu
                                                AND d.Restaurant_idRestaurant = e.idRestaurant
                                                AND b.Productos_comprados_fecha = '$n'") or die(mysql_error());

                        

                        if (mysql_num_rows($resultz) > 0) {

                            while ($row3 = mysql_fetch_array($resultz)) {

                                $arreglo[$i] = $row3[2];  
                                $arregloNombreCliente[$i] = $row3[0]; 
                                $arregloNombreRest[$i] = $row3[3];
                                $i++;
                            }

                          $result2z = mysql_query("SELECT DISTINCT Cliente_nombre, Productos_comprados_detalle, Productos_comprados_fecha FROM Productos_comprados a, Cliente b
                                                WHERE a.Productos_comprados_fecha = '$n'") or die(mysql_error());

                        if (mysql_num_rows($result2z) > 0) {

                            echo "<table id='t01'> \n"; 
                            echo "<tr id='tt01'><td id='c01'>Cliente</td><td id='c04'>Restaurant</td><td id='c02'>Recomendación</td><td id='c03'>Compra</td><td id='c05'>Fecha</td></tr> \n"; 
                           
                                while ($row2 = mysql_fetch_array($result2z)) {

                                echo "<tr><td>"; echo $arregloNombreCliente[$z]; echo "</td><td>"; echo $arregloNombreRest[$z]; echo "</td><td>"; echo $arreglo[$z]; echo"</td><td>$row2[1]</td><td>$row2[2]</td></tr> \n"; 
                                $z++;   
                               } 
                            echo "</table> \n"; 
                      //  }
                }
                         } 

         
           }
         

?>
                            <label>Elegir filtrado:</label>
                                <select name="seleccion" id="seleccion">
                                    <optgroup>
                                         <option value="Todo" >Todo</option>
                                        <option value="Cliente" >Nombre cliente</option>
                                        <option value="Rest_nombre">Nombre Restaurant</option>
                                        <option value="Producto_nombre">Recomendacion</option>
                                        <option value="Menu_nombre">Compras realizadas</option>
                                        <option value="Reserva_fecha">Fecha</option>
                                      
                                    </optgroup>
                              
                               </select> 

                               <input type ="submit" value='Buscar' name = "submit" formmethod="post"/>  
                           </form>




                           <form class="basic-grey" action="reporte.php" method="post">
                            <label>Elegir filtrado:</label>
                                
                               <select name="Filtrado2" id="Filtrado2">
                                    <?php echo $combobit; ?>
                               </select>
                                    <?php echo $input; ?>
                               
                           </form>

                         



                         </div> 
                    <hr>
                </div>
        </div>
    </section>


    
    <!--==============================footer=================================-->
    <footer>
        <div class="main">
            <div class="aligncenter">
                <span>Flashmenu.cl &copy; 2014</span>
            </div>
        </div>
    </footer>
    <script type="text/javascript"> Cufon.now(); </script>
</body>
</html>

