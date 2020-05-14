<?php require_once('Connections/conexion.php'); 

function generar_nueva_cadena_password($email)
{
	global $con;
	
	$cadenalimpia = substr((rand()*time()),0,5);
	$cadenarecuperacion = md5($cadenalimpia);
	

	$query_ConsultaFuncion = sprintf("UPDATE tblusuario SET strRecuperar='', strPassword = %s WHERE strEmail=%s",
                       GetSQLValueString($cadenarecuperacion, "text"),
                       GetSQLValueString($email, "text"));

	$Result1 = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error());  
	
	$asunto = 'Recuperar Acceso';
	$contenido=_T103.' '.$cadenalimpia.'<br><br>
  '._T104.' <a href="'._strURL.'">'._strURL.'</a><br>
<br>
'._T105.'
</td></tr></table>';
	
 
  EnvioCorreoHTML($email, $contenido, $asunto);
	
}

$varEmail_DatosUsuario = "0";
if (isset($_GET["email"])) {
  $varEmail_DatosUsuario = $_GET["email"];
}

$varEmail_id = "0";
if (isset($_GET["id"])) {
  $varEmail_id = $_GET["id"];
}

$query_DatosConsulta = sprintf("SELECT * FROM tblusuario WHERE strEmail = '%s' AND strRecuperar = '%s'", $varEmail_DatosUsuario, $varEmail_id);
$DatosConsulta = mysqli_query($con,  $query_DatosConsulta) or die(mysqli_error());
$row_DatosConsulta = mysqli_fetch_assoc($DatosConsulta);
$totalRows_DatosConsulta = mysqli_num_rows($DatosConsulta);
?>?>

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
<section>
  <div class="container">
  	
  	<div class="row">
				<div class="col-lg-6">
                    <div class="panel panel-green">
                        <div class="panel-heading"><?php echo _T93;?></div>
                        <div class="panel-body">
                         <?php if ($totalRows_DatosConsulta == 1){
        echo _T99;
        generar_nueva_cadena_password($varEmail_DatosUsuario);
        ?>
    <?php }
    else
    {?>
    <?php echo _T100;?> <a href="recuperar_pwd.php"><?php echo _T101;?></a>
    <?php }?></div>
                       
                    </div>
                    <!-- /.col-lg-4 -->
                
            </div>     
				
			</div>
  </div>
</section>
<?php include("includes/pie.php"); ?>
<?php include("includes/piejs.php"); ?>

<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>
<?php
//AÑADIR AL FINAL DE LA PÁGINA
mysqli_free_result($DatosConsulta);
?>