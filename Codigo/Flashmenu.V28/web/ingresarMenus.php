<!DOCTYPE html>
    <html lang="es">
    <head>
        <title>Ingresar menu</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/reset.css" type="text/css" media="screen">
        <link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
        <link rel="stylesheet" href="css/layout.css" type="text/css" media="screen"> 
        <script src="js/jquery-1.7.1.min.js" type="text/javascript"></script>
        <script src="js/cufon-yui.js" type="text/javascript"></script>
        <script src="js/cufon-replace.js" type="text/javascript"></script> 
        <script src="js/Dynalight_400.font.js" type="text/javascript"></script>
        <script src="js/FF-cash.js" type="text/javascript"></script>  
        <script src="js/validaciones.js" type="text/javascript"></script>
        <script src="js/script.js" type="text/javascript"></script> 
      
        

    <?php

    $var1=$_GET['var1'];
    $perfilAdm=$_GET['perfilAdm'];

    $idRestaurant=$_GET['idRestaurant'];
    $Rest_nombre=$_GET['Rest_nombre'];
    $Rest_email=$_GET['Rest_email'];
    $admnombre=$_GET['admnombre'];
    $admemail=$_GET['admemail'];
    $admapeP=$_GET['admapeP'];
    $admapeM=$_GET['admapeM'];

    // include db connect class
    require_once __DIR__ . '/db_connect.php';
    // connecting to db
    $db = new DB_CONNECT();

    $result = mysql_query("SELECT idProducto, Producto_nombre, Producto_tipo, Producto_precio FROM Producto WHERE Restaurant_idRestaurant='$idRestaurant'") or die(mysql_error());

    if (mysql_num_rows($result) > 0) {
 
        while ($row = mysql_fetch_array($result)) { #llenado de los 3 combobox con los distintos tipos de tipos de platos

            $Platos_tipo = $row['Producto_tipo'];

                
            if(strcmp ('platos', $Platos_tipo) == 0){
                $combobit .= " <option selected value = '".$row['idProducto'].",".$row['Producto_precio'].",".$row['Producto_nombre']."'>$ ".$row['Producto_precio'].": ".$row['Producto_nombre']."</option>";
            }
         /*   else{
                $combobit = " <option selected value = '0'>No hay platos</option>";
            }*/

            if(strcmp ('bebidas', $Platos_tipo) == 0){
                $combobit2 .=" <option selected value = '".$row['idProducto'].",".$row['Producto_precio'].",".$row['Producto_nombre']."'>$ ".$row['Producto_precio'].": ".$row['Producto_nombre']."</option>";
            }


            if(strcmp ('postre', $Platos_tipo) == 0){
                $combobit3 .=" <option selected value = '".$row['idProducto'].",".$row['Producto_precio'].",".$row['Producto_nombre']."'>$ ".$row['Producto_precio'].": ".$row['Producto_nombre']."</option>";
            }

        } 
    } 
    else {

        echo "<script>noHayProductos();</script>";
    }

    ?>

    
    
        <!--ESTILO FORM-->
    </head>
    <body id="page6" onload="capturarValor()">
        <!--==============================header=================================-->
        <header>
            <div class="row-top">
                <div class="main">
                    <div class="wrapper">
                        <h1><a href="index.html">Flashmenu<span>.cl</span></a></h1>
                        <nav>
                            <ul class="menu">
                                <!-- <li><a href="index.html">Home</a></li>-->
                                <li><a href='perfilAdm.php?<?php echo "var1=".$var1."&admnombre=".$admnombre."&admemail=".$admemail."&admapeP=".$admapeP."&admapeM=".$admapeM ?>'>Perfil</a></li>
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
                        <h2>Ingresar <span>menus</span></h2>
                    </div>
                </div>
            </div>
        </header>
        <div class="menuTemplate3"></div>
        <!--==============================content================================-->
        <section id="content"><div class="ic"></div>
            
                <div class="wrapper">

 <article class="col-1">
                     <div class="maxheight indent-bot">
                        <div id='cssmenu'>
                            <ul>
                               <li class='action'><a href='perfilAdm.php?<?php echo "var1=".$var1."&admnombre=".$admnombre."&admemail=".$admemail."&admapeP=".$admapeP."&admapeM=".$admapeM ?>'><span>Perfil<?php echo " ".$Rest_nombre ?></span></a>

                               <li class='has-sub'><a href='#'><span>Carta</span></a>
                                    <ul>
                                        <li><a href='ingresarRestaurant.php?<?php echo "idRestaurant=".$idRestaurant."&Rest_nombre=".$Rest_nombre."&Rest_email=".$Rest_email."&var1=".$var1."&admnombre=".$admnombre."&admemail=".$admemail."&admapeP=".$admapeP."&admapeM=".$admapeM?>'><span>Ingresar productos</span></a></li>
                                        <li><a href='verCarta.php?<?php echo "idRestaurant=".$idRestaurant."&Rest_nombre=".$Rest_nombre."&Rest_email=".$Rest_email."&var1=".$var1."&admnombre=".$admnombre."&admemail=".$admemail."&admapeP=".$admapeP."&admapeM=".$admapeM?>'><span>Ver carta</span></a></li>
                                        <li><a href='ingresarMenus.php?<?php echo "idRestaurant=".$idRestaurant."&Rest_nombre=".$Rest_nombre."&Rest_email=".$Rest_email."&var1=".$var1."&admnombre=".$admnombre."&admemail=".$admemail."&admapeP=".$admapeP."&admapeM=".$admapeM?>'><span>Ingresar menús</span></a></li>
                                        <li><a href='verMenus.php?<?php echo "idRestaurant=".$idRestaurant."&Rest_nombre=".$Rest_nombre."&Rest_email=".$Rest_email."&var1=".$var1."&admnombre=".$admnombre."&admemail=".$admemail."&admapeP=".$admapeP."&admapeM=".$admapeM?>'><span>Ver menús</span></a></li>
                                    </ul>
                               </li>

                               <li class='has-sub'><a href='#'><span>Mesas</span></a>
                                    <ul>
                                        <li><a href='ingresarMesas.php?<?php echo "idRestaurant=".$idRestaurant."&Rest_nombre=".$Rest_nombre."&Rest_email=".$Rest_email."&var1=".$var1."&admnombre=".$admnombre."&admemail=".$admemail."&admapeP=".$admapeP."&admapeM=".$admapeM?>'><span>Ingresar mesas</span></a></li>
                                        <li><a href='verMesas.php?<?php echo "idRestaurant=".$idRestaurant."&Rest_nombre=".$Rest_nombre."&Rest_email=".$Rest_email."&var1=".$var1."&admnombre=".$admnombre."&admemail=".$admemail."&admapeP=".$admapeP."&admapeM=".$admapeM?>'><span>Ver mesas</span></a></li>
                                    </ul>
                               </li>

                               <li class='has-sub'><a href='#'><span>Reservas</span></a>
                                    <ul>
                                        <li><a href='verReservas.php?<?php echo "idRestaurant=".$idRestaurant."&Rest_nombre=".$Rest_nombre."&Rest_email=".$Rest_email."&var1=".$var1."&admnombre=".$admnombre."&admemail=".$admemail."&admapeP=".$admapeP."&admapeM=".$admapeM?>'><span>Ver reservas</span></a></li>
                                    </ul>
                               </li>
                            </ul>
                        </div>
                    </div>    
                </article>  
            
            <article class="col-2">          
                       <form class="basic-grey" name="NombreForm" enctype="multipart/form-data" action="ingresarMenus.php?<?php echo "idRestaurant=".$idRestaurant."&Rest_nombre=".$Rest_nombre."&Rest_email=".$Rest_email."&var1=".$var1."&admnombre=".$admnombre."&admemail=".$admemail."&admapeP=".$admapeP."&admapeM=".$admapeM?>">
                        <h3 class="p1">Ingresar datos</h3>
                            <center>
                                <hr/>
                                <!--Nombre plato-->
                                <label>
                                <span id="errorNombre">Nombre:</span>
                                <input id="nombreInput" type="text" name="nombre" maxlength="30" />
                                </label>
                                <br/><br/>

                                <label>
                                <span id="errorFoto">Suba una foto:</span>
                                <input  type="file" name="foto" />
                                </label>
                                <br/><br/>

                                <label>
                                <span>Platos:</span>
                                <select name="c1" id = "c1" onChange="capturarValor()">
                                    <?php echo $combobit; ?>
                                </select>
                                </label>

                                <label>
                                <span>Bebida:</span>
                                <select name="c2" id = "c2" onChange="capturarValor()">
                                    <?php echo $combobit2; ?>
                                </select>
                                </label>
  
                             
                                <label>
                                <span>Postre:</span>
                                <select name="c3" id = "c3" onChange="capturarValor()">
                                    <?php echo $combobit3; ?>
                                </select>
                                </label>

                                <!--Suma de los precios de los platos almacenados en BD-->
                                <label>
                                <span>Precio estimado:</span>
                                <div id="sumaPrecio"></div>
                                </label>
                                <br/><br/>

                                <!--precio plato-->
                                <label>
                                <span>Precio:</span>
                                <input id="precioInput"  type="number" name="precio" maxlength="16" />
                                </label>
                                <br/><br/>

                             
             <!--<input class="button-2" onclick="insertarMenu()" type="submit" name="submit" value="Ingresar" formmethod="post" />    -->                    

          <input class="button-2" type="submit" name="submit" value="Ingresar" formmethod="post" /> 
                          
                                </center>

<?php

    if(isset($_POST['submit'])){

        $p = explode(",",$_POST['c1']);
        $b = explode(",",$_POST['c2']);
        $po = explode(",",$_POST['c3']);
        $descripcionMenu = $p[2].", ".$b[2]." y ".$po[2];
        

        $nombre = $_POST['nombre'];
        //$descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];

        $dir_destino = 'imagenes/';
        $imagen_subida = $dir_destino.$_FILES['foto']['name'];

        if($nombre == "" or $precio == ""){

        echo "<script> validarVacios(); </script>";

        if($nombre == ""){
          echo "<script> validarVaciosNombre(); </script>";
        }
        if($precio == ""){
          echo "<script> validarVaciosPrecio(); </script>";
        }


      }
      else{


        $consulta="SELECT Menu_nombre FROM Menu a, Restaurant c WHERE '$p[0]' = c.idRestaurant AND  a.Menu_nombre= '$nombre'"; // and menuid = $idmenu
        $resultado=mysql_query($consulta) or die (mysql_error());


        if (mysql_num_rows($resultado)>0){

            echo "<script> nombreExistente(); </script>";

        } else {

            if(!is_writable($dir_destino)){
                echo "no tiene permisos";
            
            }else{

                $tipo_imagen = $_FILES['foto']['type'];
                $tamano = $_FILES['foto']['size'];

                $ext_permitidas = array('jpg','jpeg','gif','png');
                $partes_nombre = explode('.', $_FILES['foto']['name']);
                $extension = end( $partes_nombre );
                $ext_correcta = in_array($extension, $ext_permitidas);

                $tipo_correcto = preg_match('/^image\/(pjpeg|jpeg|gif|png)$/', $tipo_imagen);

                $limite = 500 * 1024;

                if( $ext_correcta && $tipo_correcto && $tamano <= $limite ){
                    if(is_uploaded_file($_FILES['foto']['tmp_name'])){
                        
                        if (move_uploaded_file($_FILES['foto']['tmp_name'], $imagen_subida)) {

                            $query = "INSERT INTO Menu (Menu_nombre, Menu_descripcion, Menu_precio, Menu_foto) VALUES ('$nombre', '$descripcionMenu', '$precio', '$imagen_subida')"; #Se insertan datos en la tabla Menu

                            if (!mysql_query($query)){
                                die('Error: ' . mysql_error());
                                echo "<script> errorIngresar(); </script>";
                             }
                             else{
                                $id=mysql_insert_id(); #Toma el id creado automaticamente en la BD

                                if ($query) {
                                    $query2 = mysql_query("INSERT INTO Producto_has_Menu (Producto_idProducto, Menu_idMenu) VALUES ('$p[0]', '$id')")or die(mysql_error()); #Se captura el Id del menu cargado y se inserta en la tabla Producto_has_Menu el Id de plato
                                    $query3 = mysql_query("INSERT INTO Producto_has_Menu (Producto_idProducto, Menu_idMenu) VALUES ('$b[0]', '$id')")or die(mysql_error()); #Se captura el Id del menu cargado y se inserta en la tabla Producto_has_Menu el Id de bebida
                                    $query4 = mysql_query("INSERT INTO Producto_has_Menu (Producto_idProducto, Menu_idMenu) VALUES ('$po[0]', '$id')")or die(mysql_error()); #Se captura el Id del menu cargado y se inserta en la tabla Producto_has_Menu el Id de postre
                                }

                                echo "<script> creadoExitosamente(); </script>";
                             }
                        
                        }else {
                             echo "Posible ataque de carga de archivos!\n";
                          }
                
                    }else{
                        echo "Posible ataque del archivo subido: ";
                    }
                                            
                }else{
                        echo '<script>archivoInvalido();</script>';
                }
            }
            


        }
      //  mysql_close($conexion);
      }
  }
    ?>




                        </form>
                </article>
                  
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