<?php require_once('../Connections/conexion.php');
RestringirAcceso("1");?>
<?php
//MySQLi Fragmentos por http://www.dreamweaver-tutoriales.com
//Copyright Jorge Vila 2015

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "forminsertar")) {
	

$updateSQL = sprintf("UPDATE tblslider SET strTexto_1=%s,strTexto_2=%s,strTexto_3=%s,strTexto_4=%s, strImagen=%s, strLink_1=%s,strLink_2=%s,strLink_3=%s,strLink_4=%s,  intEstado=%s,  intOrden=%s WHERE idSlider=%s",
                       GetSQLValueString($_POST["strTexto_1"], "text"),
					 GetSQLValueString($_POST["strTexto_2"], "text"),
					 GetSQLValueString($_POST["strTexto_3"], "text"),
					 GetSQLValueString($_POST["strTexto_4"], "text"),
					   GetSQLValueString($_POST["strImagen"], "text"),
                       GetSQLValueString($_POST["strLink_1"], "text"),
					 GetSQLValueString($_POST["strLink_2"], "text"),
					 GetSQLValueString($_POST["strLink_3"], "text"),
					 GetSQLValueString($_POST["strLink_4"], "text"),
					   GetSQLValueString($_POST["intEstado"], "int"),
					   GetSQLValueString($_POST["intOrden"], "int"),
					   GetSQLValueString($_POST["idSlider"], "int")
					  );

//echo $updateSQL;
$Result1 = mysqli_query($con, $updateSQL) or die(mysqli_error($con));
	


  $insertGoTo = "slider-lista.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
		
}

$query_DatosProducto = sprintf("SELECT * FROM tblslider WHERE idSlider=%s", GetSQLValueString($_GET["id"], "int") );
$DatosProducto = mysqli_query($con,  $query_DatosProducto) or die(mysqli_error($con));
$row_DatosProducto = mysqli_fetch_assoc($DatosProducto);
$totalRows_DatosProducto = mysqli_num_rows($DatosProducto);


?>
             

<!DOCTYPE html>
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
<script src="../js/tinymce/tinymce.min.js"></script>

<script>
tinymce.init({
  selector: '#strTexto_1',
  height: 300,
  menubar: false,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor code'
  ],
  toolbar: 'undo redo |  bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link code '
});
tinymce.init({
  selector: '#strTexto_2',
  height: 300,
  menubar: false,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor code'
  ],
  toolbar: 'undo redo |  bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link code '
});
tinymce.init({
  selector: '#strTexto_3',
  height: 300,
  menubar: false,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor code'
  ],
  toolbar: 'undo redo |  bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link code '
});
tinymce.init({
  selector: '#strTexto_4',
  height: 300,
  menubar: false,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor code'
  ],
  toolbar: 'undo redo |  bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link code '
});
 </script>

<div id="wrapper">
  <!-- Navigation -->
  <?php include("../includes/adm-menu.php"); ?>
  <div id="page-wrapper">
     <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Gestión de Slider</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <a href="slider-lista.php" class="btn btn-outline btn-info">Volver atrás</a><br>
<br>

            
<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Añadir Slider
                        </div>
                        <div class="panel-body">
                            <form action="slider-edit.php" method="post" id="forminsertar" name="forminsertar" role="form"><div class="row">
                                <div class="col-lg-6">
                                  
 
                                        <div class="form-group">
                                            <label>Link Destino (Idioma 1)</label>
                                            <input class="form-control" placeholder="Escribir Link" name="strLink_1" id="strLink_1" value="<?php echo $row_DatosProducto["strLink_1"];?>" >
                                        </div>
                                         <div class="form-group">
                                            <label>Link Destino (Idioma 2)</label>
                                            <input class="form-control" placeholder="Escribir Link" name="strLink_2" id="strLink_2" value="<?php echo $row_DatosProducto["strLink_2"];?>" >
                                        </div>
                                         <div class="form-group">
                                            <label>Link Destino (Idioma 3)</label>
                                            <input class="form-control" placeholder="Escribir Link" name="strLink_3" id="strLink_3" value="<?php echo $row_DatosProducto["strLink_3"];?>" >
                                        </div>
                                         <div class="form-group">
                                            <label>Link Destino (Idioma 4)</label>
                                            <input class="form-control" placeholder="Escribir Link" name="strLink_4" id="strLink_4" value="<?php echo $row_DatosProducto["strLink_4"];?>" >
                                        </div>
                                          <div class="form-group">
                                            <label>Descripción (Idioma 1)</label>
                                            <textarea name="strTexto_1" id="strTexto_1"><?php echo $row_DatosProducto["strTexto_1"];?></textarea>
                                           
                                        </div>
                                         <div class="form-group">
                                            <label>Descripción (Idioma 2)</label>
                                            <textarea name="strTexto_2" id="strTexto_2"><?php echo $row_DatosProducto["strTexto_2"];?></textarea>
                                           
                                        </div>
                                         <div class="form-group">
                                            <label>Descripción (Idioma 3)</label>
                                            <textarea name="strTexto_3" id="strTexto_3"><?php echo $row_DatosProducto["strTexto_3"];?></textarea>
                                           
                                        </div>
                                         <div class="form-group">
                                            <label>Descripción (Idioma 4)</label>
                                            <textarea name="strTexto_4" id="strTexto_4"><?php echo $row_DatosProducto["strTexto_4"];?></textarea>
                                           
                                        </div>
                                        
                                         
     

                                         
                                          <div class="form-group">
                                            <label>Orden</label>
                                            <input class="form-control" placeholder="Escribir Orden" name="intOrden" id="intOrden" value="<?php echo $row_DatosProducto["intOrden"];?>" >
                                        </div>

                                
<?php 
//BLOQUE INSERCION IMAGEN
//***********************
//***********************
//***********************									  //***********************
//PARÁMETROS DE IMAGEN
$nombrecampoimagen="strImagen";
$nombrecampoimagenmostrar="strImagenpic";
$nombrecarpetadestino="../images/slider/"; //carpeta destino con barra al final
$nombrecampofichero="file1";
$nombrecampostatus="status1";
$nombrebarraprogreso="progressBar1";
$maximotamanofichero="500000"; //en Bytes, "0" para ilimitado. 1000000 Bytes = 1000Kb = 1Mb
$tiposficheropermitidos="jpg, png"; //  Por ejemplo "jpg,doc,png", separados por comas y poner "0" para permitir todos los tipos
$limiteancho="484"; // En píxels, "0" significa cualquier tamaño permitido
$limitealto="441"; // En píxels, "0" significa cualquier tamaño permitido
									  
$cadenadeparametros="'".$nombrecampoimagen."','".$nombrecampoimagenmostrar."','".$nombrecarpetadestino."','".$nombrecampofichero."','".$nombrecampostatus."','".$nombrebarraprogreso."','".$maximotamanofichero."','".$tiposficheropermitidos."','".$limiteancho."','".$limitealto."'";

//$cadenadeparametros="";

									  
									  ?>
<div class="form-group">
	<label>Imagen</label>
	<input class="form-control"  name="<?php echo $nombrecampoimagen;?>" id="<?php echo $nombrecampoimagen;?>" value="<?php echo $row_DatosProducto["strImagen"];?>">
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
	<?php if ($row_DatosProducto["strImagen"]!=""){?>
	<img src="<?php echo $nombrecarpetadestino.$row_DatosProducto["strImagen"];?>" alt="" id="<?php echo $nombrecampoimagenmostrar;?>" width="200">
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
      

<div class="form-group">
			<label>Estado</label>
			<select name="intEstado" class="form-control" id="intEstado">
				<option value="0" <?php if ($row_DatosProducto["intEstado"]=="0") echo "selected"; ?>>Inactivo</option>
				<option value="1" <?php if ($row_DatosProducto["intEstado"]=="1") echo "selected"; ?>>Activo</option>
				
			</select>
		</div>




                                        <button type="submit" class="btn btn-success">Actualizar</button>
                                      <input name="MM_insert" type="hidden" id="MM_insert" value="forminsertar">
                                      <input name="idSlider" type="hidden" id="idSlider" value="<?php echo $row_DatosProducto["idSlider"];?>">
                                       
                                    
                              </div>
                                <!-- /.col-lg-6 (nested) -->
                       
     
						
                                <!-- /.col-lg-6 (nested) -->
                            </div></form>
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