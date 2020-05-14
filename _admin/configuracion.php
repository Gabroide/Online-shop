<?php require_once('../Connections/conexion.php'); 
RestringirAcceso("1");?>

<?php
//MySQLi Fragmentos por http://www.dreamweaver-tutoriales.com
//Copyright Jorge Vila 2015

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

$mensajeexito=0;

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "forminsertar")) {

	
		$mostrarslider=0;
	if ((isset($_POST["intMostrarSlider"])) && ($_POST["intMostrarSlider"]=="1"))
		$mostrarslider=1;
		$mostrarwestern=0;
	if ((isset($_POST["intWestern"])) && ($_POST["intWestern"]=="1"))
		$mostrarwestern=1;
		$mostrarmoney=0;
	if ((isset($_POST["intMoneyGram"])) && ($_POST["intMoneyGram"]=="1"))
		$mostrarmoney=1;
	
	$mostrarzonaimpuesto=0;
	if ((isset($_POST["intMostrarZonaImpuesto"])) && ($_POST["intMostrarZonaImpuesto"]=="1"))
	$mostrarzonaimpuesto =1;
	
	$destinocompra=0;
	if ((isset($_POST["intDestinoCompra"])) && ($_POST["intDestinoCompra"]=="1"))
	$destinocompra=1;


	
	$mostrarzona=0;
	if ((isset($_POST["intMostrarZona"])) && ($_POST["intMostrarZona"]=="1"))
		$mostrarzona=1;

	$marcas=0;
	if ((isset($_POST["intMarcas"])) && ($_POST["intMarcas"]=="1"))
		$marcas=1;
	$impuesto=0;
	if ((isset($_POST["intImpuesto"])) && ($_POST["intImpuesto"]=="1"))
		$impuesto=1;
	$pago1=0;
	if ((isset($_POST["intTransferencia"])) && ($_POST["intTransferencia"]=="1"))
		$pago1=1;
	$pago2=0;
	if ((isset($_POST["intPaypal"])) && ($_POST["intPaypal"]=="1"))
		$pago2=1;
	$pago3=0;
	if ((isset($_POST["intCaixa"])) && ($_POST["intCaixa"]=="1"))
		$pago3=1;
	$pago4=0;
	if ((isset($_POST["intSantander"])) && ($_POST["intSantander"]=="1"))
		$pago4=1;
	
  $updateSQL = sprintf("UPDATE tblconfiguracion SET strTelefono=%s, strEmail=%s, strLogo=%s, intMarcas=%s, intImpuesto=%s,  	strPAYPAL_url=%s, 	strPAYPAL_email=%s, 	strCAIXA_url=%s, 	strCAIXA_fuc=%s,  strCAIXA_terminal=%s, 	strCAIXA_version=%s, 	strCAIXA_clave=%s,  strSANTANDER_url=%s, 	strSANTANDER_merchantid=%s,  strSANTANDER_secret=%s, 	strSANTANDER_account=%s, 	intTransferencia=%s, 	intPaypal=%s,  intCaixa=%s, 	intSantander=%s,  	strURL=%s, dblDescuento=%s, strEmailEnvios=%s, strPassEMailEnvios=%s, strServidorCorreo=%s, intMostrarZona=%s, intMostrarZonaImpuesto =%s, intMostrarSlider =%s, intWestern =%s, intMoneyGram =%s, intDestinoCompra=%s  WHERE idConfiguracion=%s",
                       GetSQLValueString($_POST["strTelefono"], "text"),
					   GetSQLValueString($_POST["strEmail"], "text"),
					   GetSQLValueString($_POST["strLogo"], "text"),		  
					   GetSQLValueString($marcas, "int"),					
					   GetSQLValueString($impuesto, "int"),					
					  GetSQLValueString($_POST["strPAYPAL_url"], "text"),
					  GetSQLValueString($_POST["strPAYPAL_email"], "text"),
					  GetSQLValueString($_POST["strCAIXA_url"], "text"),
					  GetSQLValueString($_POST["strCAIXA_fuc"], "text"),
					  GetSQLValueString($_POST["strCAIXA_terminal"], "text"),
					  GetSQLValueString($_POST["strCAIXA_version"], "text"),
					  GetSQLValueString($_POST["strCAIXA_clave"], "text"),
					  GetSQLValueString($_POST["strSANTANDER_url"], "text"),
					  GetSQLValueString($_POST["strSANTANDER_merchantid"], "text"),
					  GetSQLValueString($_POST["strSANTANDER_secret"], "text"),
					  GetSQLValueString($_POST["strSANTANDER_account"], "text"),
					  GetSQLValueString($pago1, "int"),
					 GetSQLValueString($pago2, "int"),
					  GetSQLValueString($pago3, "int"),
					  GetSQLValueString($pago4, "int"),
					   GetSQLValueString($_POST["strURL"], "text"),
					    GetSQLValueString(ProcesarComaPrecio($_POST["dblDescuento"]), "double"),
					   GetSQLValueString($_POST["strEmailEnvios"], "text"),
					   GetSQLValueString($_POST["strPassEMailEnvios"], "text"),
					   GetSQLValueString($_POST["strServidorCorreo"], "text"),
					   GetSQLValueString($mostrarzona, "int"),
					   GetSQLValueString($mostrarzonaimpuesto, "int"),
					   GetSQLValueString($mostrarslider, "int"),
					   GetSQLValueString($mostrarwestern, "int"),
					   GetSQLValueString($mostrarmoney, "int"),
					   GetSQLValueString($destinocompra, "int"), 
					  GetSQLValueString($_POST["idConfiguracion"], "int") );
//echo $updateSQL;
$Result1 = mysqli_query($con, $updateSQL) or die(mysqli_error($con));
	
$mensajeexito=1;


}

?>
<?php

$query_DatosConsulta = sprintf("SELECT * FROM tblconfiguracion WHERE idConfiguracion=1");

$DatosConsulta = mysqli_query($con,  $query_DatosConsulta) or die(mysqli_error($con));
$row_DatosConsulta = mysqli_fetch_assoc($DatosConsulta);
$totalRows_DatosConsulta = mysqli_num_rows($DatosConsulta);
?><!DOCTYPE html>
<html lang="en"><!-- InstanceBegin template="/Templates/Administracion.dwt.php" codeOutsideHTMLIsLocked="false" -->

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- InstanceBeginEditable name="doctitle" -->
    <title>Administración Tienda 2017</title>
    <!-- InstanceEndEditable -->
    <!-- Bootstrap Core CSS -->
    <?php include("../includes/adm-header.php"); ?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
</head>

<body>
<!-- InstanceBeginEditable name="ContenidoAdmin" -->
<script src="scriptupload.js"></script>
<script src="../js/scriptadmin.js"></script>
<div id="wrapper">
  <!-- Navigation -->
  <?php include("../includes/adm-menu.php"); ?>
  <div id="page-wrapper">
     <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Configuración</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <?php /*?><a href="usuario-lista.php" class="btn btn-outline btn-info">Volver atrás</a><br><?php */?>
<br>

 <?php if ($mensajeexito==1){?>
<div class="row">
                <div class="col-lg-12">
                <div class="alert alert-success">La configuración se ha guardado correctamente.</div>
	</div>
</div>     
<?php }?>
<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Editar Configuración
                        </div>
                        <div class="panel-body">
                           <form action="configuracion.php" method="post" id="forminsertar" name="forminsertar" role="form" >
                            <div class="row">
                                <div class="col-lg-6">
                                  
                                        <div class="form-group">
                                            <label>URL Página</label>
                                            <input class="form-control" placeholder="e-mail" name="strURL" id="strURL" value="<?php echo $row_DatosConsulta["strURL"];?>">
                                        </div>
                                        <div class="form-group">
                                            <label>E-mail</label>
                                            <input class="form-control" placeholder="e-mail" name="strEmail" id="strEmail" value="<?php echo $row_DatosConsulta["strEmail"];?>">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Teléfono</label>
                                            <input class="form-control" placeholder="Teléfono que saldrá en la parte superior" name="strTelefono" id="strTelefono" value="<?php echo $row_DatosConsulta["strTelefono"];?>">
                                        </div>
                                        <div class="form-group">
                                            <label>E-mail de envío de notificaciones</label>
                                            <input class="form-control" placeholder="Teléfono que saldrá en la parte superior" name="strEmailEnvios" id="strEmailEnvios" value="<?php echo $row_DatosConsulta["strEmailEnvios"];?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Pass de e-mail de notificaciones</label>
                                            <input class="form-control" placeholder="Teléfono que saldrá en la parte superior" name="strPassEMailEnvios" id="strPassEMailEnvios" value="<?php echo $row_DatosConsulta["strPassEMailEnvios"];?>">
                                        </div>
                                         <div class="form-group">
                                            <label>Servidor de Correo</label>
                                            <input class="form-control" placeholder="Teléfono que saldrá en la parte superior" name="strServidorCorreo" id="strServidorCorreo" value="<?php echo $row_DatosConsulta["strServidorCorreo"];?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Mostrar Marcas</label>
 <div class="checkbox">
<label>
<input type="checkbox" value="1" name="intMarcas" id="intMarcas" <?php if ($row_DatosConsulta["intMarcas"]==1){ ?>checked="checked" <?php }?>>
Marcar para mostrar el apartado de marcas en el menú de la izquierda
</label>
</div>
                                        </div>
                                        <div class="form-group">
                                            <label>Precios con Impuesto</label>
 <div class="checkbox">
<label>
<input type="checkbox" value="1" name="intImpuesto" id="intImpuesto" <?php if ($row_DatosConsulta["intImpuesto"]==1){ ?>checked="checked" <?php }?>>
Marcar para mostrar los precios con impuesto ya sumado
</label>
</div>
                                        </div>
  <div class="form-group">
       <label>Mostrar Zonas en carrito</label>
 <div class="checkbox">
<label>
<input type="checkbox" value="1" name="intMostrarZona" id="intMostrarZona" <?php if ($row_DatosConsulta["intMostrarZona"]==1){ ?>checked="checked" <?php }?>>
Marcar para mostrar las zonas en el carrito
</label>
</div>
 </div>
<div class="form-group">
       <label>Mostrar Zonas de Impuestos en carrito</label>
 <div class="checkbox">
<label>
<input type="checkbox" value="1" name="intMostrarZonaImpuesto" id="intMostrarZonaImpuesto" <?php if ($row_DatosConsulta["intMostrarZonaImpuesto"]==1){ ?>checked="checked" <?php }?>>
Marcar para mostrar las zonas de impuestos en el carrito
</label>
</div>
 </div>

<div class="form-group">
       <label>Después de comprar enviar al carrito al usuario</label>
 <div class="checkbox">
<label>
<input type="checkbox" value="1" name="intDestinoCompra" id="intDestinoCompra" <?php if ($row_DatosConsulta["intDestinoCompra"]==1){ ?>checked="checked" <?php }?>>
Enviar al carrito después de la compra
</label>
</div>
 </div>

                                       
<div class="form-group">
       <label>Mostrar Slider en página principal</label>
 <div class="checkbox">
<label>
<input type="checkbox" value="1" name="intMostrarSlider" id="intMostrarSlider" <?php if ($row_DatosConsulta["intMostrarSlider"]==1){ ?>checked="checked" <?php }?>>
Mostrar Slider en página principal
</label>
</div>
 </div>

                                       
                                          
 <div class="form-group">
	<label>Descuento General</label>
	<input class="form-control"  name="dblDescuento" id="dblDescuento" value="<?php echo $row_DatosConsulta["dblDescuento"];?>">
</div>
       


<?php 
//BLOQUE INSERCION IMAGEN
//***********************
//***********************
//***********************									  //***********************
//PARÁMETROS DE IMAGEN
$nombrecampoimagen="strLogo";
$nombrecampoimagenmostrar="strLogopic";
$nombrecarpetadestino="../images/"; //carpeta destino con barra al final
$nombrecampofichero="file1";
$nombrecampostatus="status1";
$nombrebarraprogreso="progressBar1";
$maximotamanofichero="500000"; //en Bytes, "0" para ilimitado. 1000000 Bytes = 1000Kb = 1Mb
$tiposficheropermitidos="jpg,png"; //  Por ejemplo "jpg,doc,png", separados por comas y poner "0" para permitir todos los tipos
$limiteancho="139"; // En píxels, "0" significa cualquier tamaño permitido
$limitealto="39"; // En píxels, "0" significa cualquier tamaño permitido
									  
$cadenadeparametros="'".$nombrecampoimagen."','".$nombrecampoimagenmostrar."','".$nombrecarpetadestino."','".$nombrecampofichero."','".$nombrecampostatus."','".$nombrebarraprogreso."','".$maximotamanofichero."','".$tiposficheropermitidos."','".$limiteancho."','".$limitealto."'";

//$cadenadeparametros="";

									  
									  ?>
<div class="form-group">
	<label>Imagen de logo</label>
	<input class="form-control"  name="<?php echo $nombrecampoimagen;?>" id="<?php echo $nombrecampoimagen;?>" value="<?php echo $row_DatosConsulta["strLogo"];?>">
</div> 
<div class="form-group">
	<div class="row">
		<div class="col-lg-6">
			<input type="file" name="<?php echo $nombrecampofichero;?>" id="<?php echo $nombrecampofichero;?>"><br>
		</div>
		<div class="col-lg-6">
			<input class="form-control" type="button" value="Subir Fichero" onclick="uploadFile(<?php echo $cadenadeparametros;?>)">
		</div>
	</div>
	<progress id="<?php echo $nombrebarraprogreso;?>" value="0" max="100" style="width:100%;"></progress>
	<h5 id="<?php echo $nombrecampostatus;?>"></h5>
	<?php if ($row_DatosConsulta["strLogo"]!=""){?>
	<img src="<?php echo $nombrecarpetadestino.$row_DatosConsulta["strLogo"];?>" alt="" id="<?php echo $nombrecampoimagenmostrar;?>">
	<?php }
	else
	{?>
	<img src="../images/usuarios/sinfoto.jpg" alt="" width="200"  id="<?php echo $nombrecampoimagenmostrar;?>">
	<?php }?>
</div>   
<?php /*?>
//***********************
//***********************
//***********************									  //***********************
// FIN BLOQUE INSERCION IMAGEN
<?php */?>     
                                                                
                                        <button type="submit" class="btn btn-success">Actualizar</button>
                                      <input name="idConfiguracion" type="hidden" id="idConfiguracion" value="<?php echo $row_DatosConsulta["idConfiguracion"];?>">
                                      <input name="MM_insert" type="hidden" id="MM_insert" value="forminsertar">
                                       
                                    
                              </div>
                                <!-- /.col-lg-6 (nested) -->
                                
                                 <div class="col-lg-6">
 <div class="checkbox">
<label>
<input type="checkbox" value="1" name="intTransferencia" id="intTransferencia" <?php if ($row_DatosConsulta["intTransferencia"]==1){ ?>checked="checked" <?php }?>>
Marcar para activar el pago por Transferencia
</label>
</div>
 <div class="checkbox">
<label>
<input type="checkbox" value="1" name="intPaypal" id="intPaypal" <?php if ($row_DatosConsulta["intPaypal"]==1){ ?>checked="checked" <?php }?>>
Marcar para activar el pago por Paypal
</label>
</div>
 <div class="checkbox">
<label>
<input type="checkbox" value="1" name="intCaixa" id="intCaixa" <?php if ($row_DatosConsulta["intCaixa"]==1){ ?>checked="checked" <?php }?>>
Marcar para activar el pago por Caixa
</label>
</div>
 <div class="checkbox">
<label>
<input type="checkbox" value="1" name="intSantander" id="intSantander" <?php if ($row_DatosConsulta["intSantander"]==1){ ?>checked="checked" <?php }?>>
Marcar para activar el pago por Santander
</label>
</div>
                                
<div class="checkbox">
<label>
<input type="checkbox" value="1" name="intWestern" id="intWestern" <?php if ($row_DatosConsulta["intWestern"]==1){ ?>checked="checked" <?php }?>>
Marcar para activar el pago por Western Union
</label>
</div>
<div class="checkbox">
<label>
<input type="checkbox" value="1" name="intMoneyGram" id="intMoneyGram" <?php if ($row_DatosConsulta["intMoneyGram"]==1){ ?>checked="checked" <?php }?>>
Marcar para activar el pago por Money Gram
</label>
</div>
                                 
  <div class="form-group">
			<label>Paypal URL</label>
			<input class="form-control" placeholder="Dirección de Paypal" name="strPAYPAL_url" id="strPAYPAL_url" value="<?php echo $row_DatosConsulta["strPAYPAL_url"];?>">
		</div>
  <div class="form-group">
			<label>Paypal e-mail</label>
			<input class="form-control" placeholder="Dirección de Paypal" name="strPAYPAL_email" id="strPAYPAL_email" value="<?php echo $row_DatosConsulta["strPAYPAL_email"];?>">
		</div>
  <div class="form-group">
			<label>Caixa URL</label>
			<input class="form-control" placeholder="Dirección de Paypal" name="strCAIXA_url" id="strCAIXA_url" value="<?php echo $row_DatosConsulta["strCAIXA_url"];?>">
		</div>
  <div class="form-group">
			<label>Caixa fuc</label>
			<input class="form-control" placeholder="Dirección de Paypal" name="strCAIXA_fuc" id="strCAIXA_fuc" value="<?php echo $row_DatosConsulta["strCAIXA_fuc"];?>">
		</div>

  <div class="form-group">
			<label>Caixa Terminal</label>
			<input class="form-control" placeholder="Dirección de Paypal" name="strCAIXA_terminal" id="strCAIXA_terminal" value="<?php echo $row_DatosConsulta["strCAIXA_terminal"];?>">
		</div>
  <div class="form-group">
			<label>Caixa Versión</label>
			<input class="form-control" placeholder="Dirección de Paypal" name="strCAIXA_version" id="strCAIXA_version" value="<?php echo $row_DatosConsulta["strCAIXA_version"];?>">
		</div>
  <div class="form-group">
			<label>Caixa Clave</label>
			<input class="form-control" placeholder="Dirección de Paypal" name="strCAIXA_clave" id="strCAIXA_clave" value="<?php echo $row_DatosConsulta["strCAIXA_clave"];?>">
		</div>
  <div class="form-group">
			<label>Santander URL</label>
			<input class="form-control" placeholder="Dirección de Paypal" name="strSANTANDER_url" id="strSANTANDER_url" value="<?php echo $row_DatosConsulta["strSANTANDER_url"];?>">
		</div> 
  <div class="form-group">
			<label>Santander MerchantId</label>
			<input class="form-control" placeholder="Dirección de Paypal" name="strSANTANDER_merchantid" id="strSANTANDER_merchantid" value="<?php echo $row_DatosConsulta["strSANTANDER_merchantid"];?>">
		</div> 
  <div class="form-group">
			<label>Santander Secret</label>
			<input class="form-control" placeholder="Dirección de Paypal" name="strSANTANDER_secret" id="strSANTANDER_secret" value="<?php echo $row_DatosConsulta["strSANTANDER_secret"];?>">
		</div> 
  <div class="form-group">
			<label>Santander Account</label>
			<input class="form-control" placeholder="Dirección de Paypal" name="strSANTANDER_account" id="strSANTANDER_account" value="<?php echo $row_DatosConsulta["strSANTANDER_account"];?>">
		</div>                                       
                                       
                                                                             

                                      
                                      
                                        
                                        
								</div>
                            </div>
							</form>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
                
                <!-- /.col-lg-6 -->
            </div>
  </div>
  <!-- /#page-wrapper -->
</div>
<!-- InstanceEndEditable --><!-- /#wrapper -->

     <?php include("../includes/adm-foot.php"); ?>
   

</body>

<!-- InstanceEnd --></html>