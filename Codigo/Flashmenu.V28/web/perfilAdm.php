<!DOCTYPE html>
<html lang="es">
<head>
    <title>Perfil Adm</title>
    <meta charset="utf-8">
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
    <script src="js/validaciones.js" type="text/javascript"></script> 
    <script src="js/script.js" type="text/javascript"></script> 
</head>

<?php 

        $var1=$_GET['var1']; 
        $admnombre=$_GET['admnombre']; 
        $admemail=$_GET['admemail']; 
        $admapeP=$_GET['admapeP']; 
        $admapeM=$_GET['admapeM']; 
?>

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
                	<h2>Bienvenido <span><?php echo $admnombre." ".$admapeP?></span></h2>
                </div>
            </div>
        </div>
    </header>
    <div class="menuTemplate3"></div>


	<!--==============================content================================-->
    <section id="content"><div class="ic"></div>

            <div class="wrapper">
                <article class="col-1">
                    <div class="maxheight indent-bot" style="width: 318px;">
                        <div id='cssmenu'>
                            <ul>
                                <li class='action'><a href='misRestaurantes.php?var1=<?php echo "$var1&admnombre=$admnombre&admemail=$admemail&admapeP=$admapeP&admapeM=$admapeM"?>'><span>Mis restaurantes</span></a>
                                <li class='action'><a href='ingresarRest.php?var1=<?php echo "$var1&admnombre=$admnombre&admemail=$admemail&admapeP=$admapeP&admapeM=$admapeM"?>'><span>Agregar restaurant</span></a>
                                <li class='action'><a href='modificarAdm.php?var1=<?php echo "$var1"?>'><span>Modificar datos</span></a>
                            </ul>
                        </div>
                    </div>    
                </article>
            
                <article class="col-2"> 

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
