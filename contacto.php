<?php require_once('Connections/conexion.php'); 
$enviado=0;
if (isset($_POST["formenviado"])){
	$contenido='Nombre: '.$_POST["name"].'<br>
	Correo: '.$_POST["email"].'<br>
	Asunto: '.$_POST["subject"].'<br>
	Mensaje: '.$_POST["message"].'<br>';
	$asunto="Contacto desde Tienda Dreamweaver";
	EnvioCorreoHTML(_email, $contenido, $asunto, $concopia=0);
	$enviado=1;
}?>

<!DOCTYPE html>
<html lang="es"><!-- InstanceBegin template="/Templates/Principal.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
<!-- InstanceBeginEditable name="doctitle" -->
    <title>Home | E-Shopper</title>
    <meta name="description" content="">
    <meta name="author" content="">
<!-- InstanceEndEditable -->
    <?php include("includes/cabecera.php"); ?>
<!-- InstanceBeginEditable name="head" -->
    <!-- InstanceEndEditable -->
</head><!--/head-->

<body>
<!-- InstanceBeginEditable name="Contenido" -->

<?php include("includes/header.php"); ?>
<?php //include("includes/slider.php"); ?>
<div id="contact-page" class="container">
    	<div class="bg">
	    	<div class="row">    		
	    		<div class="col-sm-12">    			   			
					<h2 class="title text-center"><?php echo _T10006;?> </h2>    			    				    				
					
				</div>			 		
			</div>    	
    		<div class="row">  	
	    		<div class="col-sm-8">
	    			<div class="contact-form">
	    				<h2 class="title text-center"><?php echo _T10007;?> </h2>
	    				<div class="status alert alert-success" style="display: none"></div>
	    				<?php if ($enviado=="1"){
	echo _T10005;
						}?>
				    	<form id="main-contact-form" class="contact-form row" name="contact-form" method="post" action="contacto.php">
				            <div class="form-group col-md-6">
				                <input type="text" name="name" class="form-control" required="required" placeholder="<?php echo _T10008;?>">
				            </div>
				            <div class="form-group col-md-6">
				                <input type="email" name="email" class="form-control" required="required" placeholder="<?php echo _T10009;?>">
				            </div>
				            <div class="form-group col-md-12">
				                <input type="text" name="subject" class="form-control" required="required" placeholder="<?php echo _T10010;?>">
				            </div>
				            <div class="form-group col-md-12">
				                <textarea name="message" id="message" required class="form-control" rows="8" placeholder="<?php echo _T10011;?>"></textarea>
				            </div>                        
				            <div class="form-group col-md-12">
				                <input type="submit" name="submit" class="btn btn-primary pull-right" value="<?php echo _T10015;?>">
				                <input type="hidden" name="formenviado"  value="formenviado">
				            </div>
				        </form>
	    			</div>
	    		</div>
	    		<div class="col-sm-4">
	    			<div class="contact-info">
	    				<h2 class="title text-center"><?php echo _T10012;?></h2>
	    				<address>
	    					<?php echo _T10013;?>
	    				</address>
	    				<div class="social-networks">
	    					<h2 class="title text-center"><?php echo _T10014;?></h2>
							<ul>
								<li>
									<a href="http://www.facebook.com/ayzweb" target="_blank"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="https://twitter.com/JorgeVilaDW" target="_blank"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="https://plus.google.com/+Dreamweaver-tutoriales" target="_blank"><i class="fa fa-google-plus"></i></a>
								</li>
								<li>
									<a href="http://www.youtube.com/user/jorvidu" target="_blank"><i class="fa fa-youtube"></i></a>
								</li>
							</ul>
	    				</div>
	    			</div>
    			</div>    			
	    	</div>  
    	</div>	
    </div>
<?php include("includes/pie.php"); ?>
<?php include("includes/piejs.php"); ?>

<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>
<?php
//AÑADIR AL FINAL DE LA PÁGINA
mysqli_free_result($DatosConsulta);
?>