
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Ingresar restaurant</title>
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

    <script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="js/mapa.js" type="text/javascript"></script>   
    
<?php

    $var1=$_GET['var1'];
    $admnombre=$_GET['admnombre'];
    $admemail=$_GET['admemail'];
    $admapeP=$_GET['admapeP'];
    $admapeM=$_GET['admapeM'];


    //include db connect class
    require_once __DIR__ . '/db_connect.php';
    
    // connecting to db
    $db = new DB_CONNECT(); 

    $dir_destino = 'imagenes/';
?>



</head>
<body id="page6">
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
                	<h2>Ingresar <span>restaurant</span></h2>
                </div>
            </div>
        </div>
    </header>
    
	<!--==============================content================================-->
    <section id="content"><div class="ic"></div>
        <div class="main">
            <div class="wrapper">
            	                                                                                                                       
                   <form class="basic-grey" name="NombreForm" method="post" enctype="multipart/form-data" action="ingresarRest.php?var1=<?php echo $var1."&admnombre=".$admnombre."&admemail=".$admemail."&admapeP=".$admapeP."&admapeM=".$admapeM?>">
                    <h3 class="p1">Ingresar datos</h3>
                        <center>
                            <hr/>
                            <!--Nombre del restaurant-->
                             <label>
                             <span id="errorNombre">Nombre:</span>                             
                             <input id="nombreInput" type="text" id="nombre" name="nombre" maxlength="30" />              
                             </label>
                             <br/><br/>

                             <!--Tipo de restaurant--> 
                             <label>
                             <span>Tipo:</span>
                             <input id="tipoInput" type="text" name="tipo" maxlength="30" />
                             </label>
                             <br/><br/>

                            <!--Descripcion de restaurant-->
                             <label>
                             <span>Descripcion:</span>
                             <input id="descripcionInput" type="text" name="descripcion" maxlength="100" />
                             </label>
                             <br/><br/>

                              <!--Mail de contacto de restaurant-->
                             <label>
                             <span id="errorEmail">Email restaurant:</span>
                             <input id="emailInput" type="email" name="email" maxlength="40" />
                             </label>
                             <br/><br/>

                           
                             <label>
                             <span id="errorFoto">Suba una foto:</span>
                             <input id="fileInput" type="file" name="foto" />
                             </label>
                             <br/><br/>






                            <label>
                              <!--Direccion de restaurant-->
                    <div> 
                      <div style="margin-bottom: 10px;"> 
                            <span id="errorDireccion">Direccion:</span>
                            <input type="text" name="address" id="address" style="width:300px;" onchange="marcarDireccion()"> 
                            <p class="button-2"> Ver direccion</p>
                            </div> 
                            </label>

                            <div style="height: 400px; width: 500px;" id="map"></div> 


                    <span id="err" style="color:red"></span> 
                    <input type="text" name="lat" id="lat" style="width:150px;">
                    <input type="text" name="long" id="long" style="width:150px;"> 

                    </div>  
                                 

                    <input class="button-2" type="submit" name="submit" value="Ingresar" formmethod="post" />
                      
                    </center>


<?php


    if(isset($_POST['submit'])){

        $nombre = $_POST['nombre'];
        $tipo = $_POST['tipo'];
        $descripcion = $_POST['descripcion'];
        $email = $_POST['email'];
        $direccion = $_POST['address'];
        $lat = $_POST['lat'];
        $long = $_POST['long'];

        
        $imagen_subida = $dir_destino.$_FILES['foto']['name'];

        if($nombre == "" or $tipo == "" or $descripcion == "" or $email == "" or $direccion == ""){

        echo "<script> validarVacios(); </script>";

        if($nombre == ""){
          echo "<script> validarVaciosNombre(); </script>";
        }
        if($tipo == ""){
          echo "<script> validarVaciosTipo(); </script>";
        }
        if($descripcion == ""){
          echo "<script> validarVaciosDescripcion(); </script>";
        }
        if($email == ""){
          echo "<script> validarVaciosEmail(); </script>";
        }
        if($direccion == ""){
          echo "<script> validarVaciosAddress(); </script>";
        }

      }
      else{



        $consultaNombre="SELECT Rest_nombre FROM Restaurant where Rest_nombre= '".$_POST['nombre']."'";
        $consultaEmail="SELECT Rest_email FROM Restaurant where Rest_email = '".$_POST['email']."'";
        $consultaLatLng="SELECT Rest_lat, Rest_long FROM Restaurant where Rest_lat = '".$_POST['lat']."'"." AND Rest_long = '".$_POST['long']."'" ;
        

        $resultadoNombre=mysql_query($consultaNombre) or die (mysql_error());
        $resultadoEmail=mysql_query($consultaEmail) or die (mysql_error());
        $resultadoLatLng=mysql_query($consultaLatLng) or die (mysql_error());



            if((mysql_num_rows($resultadoNombre)>0) or (mysql_num_rows($resultadoEmail)>0) or (mysql_num_rows($resultadoLatLng)>0)){
                echo "<script> datosExistente(); </script>";
            }

            if (mysql_num_rows($resultadoNombre)>0){
               echo "<script> nombreExistente(); </script>";
            } 
            if(mysql_num_rows($resultadoEmail)>0){
                echo "<script> emailExistente(); </script>";
            }

            if(mysql_num_rows($resultadoLatLng)>0){
                echo "<script> direccionExistente(); </script>";
            }
            if((mysql_num_rows($resultadoNombre)<=0) and (mysql_num_rows($resultadoEmail)<=0) and (mysql_num_rows($resultadoLatLng)<=0)){


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

                                $query = "INSERT INTO Restaurant (Rest_nombre, Rest_tipo, Rest_descripcion, Rest_email, Rest_direccion, Rest_lat, Rest_long, Rest_foto, Administrador_restaurant_idAdministrador_restaurant) VALUES ('$nombre', '$tipo', '$descripcion', '$email', '$direccion', '$lat', '$long', '$imagen_subida', '$var1')";
                                     if (!mysql_query($query)){
                                     
                                         die('Error: ' . mysql_error());
                                            echo "<script> errorIngresar(); </script>";
                                         }
                                         else{
                                             echo "<script> creadoExitosamente(); </script>";
                                         }

                                } else {
                                    echo "Posible ataque de carga de archivos!\n";
                                }

                            }else{
                                echo "Posible ataque del archivo subido: ";
                               
                            }
                        }
                        else{
                                echo '<script>archivoInvalido()</script>';
                        }
                    }                
        }
      }
     }
?>


                </form>
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
