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

$esprincipal=0;
	if ((isset($_POST["intPrincipal"])) && ($_POST["intPrincipal"]=="1"))
		$esprincipal=1;
	
	if ((comprobarseounico($_POST["idProducto"], $_POST["strSEO_1"], 1)) && (comprobarseounico($_POST["idProducto"], $_POST["strSEO_2"], 2)) && (comprobarseounico($_POST["idProducto"], $_POST["strSEO_3"], 3)) && (comprobarseounico($_POST["idProducto"], $_POST["strSEO_4"], 4)))
	{
	
  $updateSQL = sprintf("UPDATE tblproducto SET strNombre_1=%s, strNombre_2=%s, strNombre_3=%s, strNombre_4=%s, strSEO_1=%s,strSEO_2=%s,strSEO_3=%s,strSEO_4=%s, refCategoria1=%s,  refCategoria2=%s,  refCategoria3=%s, refCategoria4=%s, refCategoria5=%s,  strImagen1=%s, strImagen2=%s, strImagen3=%s, strImagen4=%s, strImagen5=%s, strDescripcion_1=%s, strDescripcion_2=%s, strDescripcion_3=%s, strDescripcion_4=%s, strDescripLarga_1=%s, strDescripLarga_2=%s, strDescripLarga_3=%s, strDescripLarga_4=%s, strCaracteristicas_1=%s, strCaracteristicas_2=%s, strCaracteristicas_3=%s, strCaracteristicas_4=%s, dblPrecio=%s, dblPrecioAnterior=%s, intEstado=%s, refMarca=%s, intPrincipal=%s, intStock=%s, refImpuesto=%s,refGrupo=%s, dblPeso=%s, strTitleSEO_1=%s, strTitleSEO_2=%s, strTitleSEO_3=%s, strTitleSEO_4=%s, strDesSEO_1=%s, strDesSEO_2=%s, strDesSEO_3=%s, strDesSEO_4=%s  WHERE idProducto=%s",
                       GetSQLValueString($_POST["strNombre_1"], "text"),
					   GetSQLValueString($_POST["strNombre_2"], "text"),
					   GetSQLValueString($_POST["strNombre_3"], "text"),
					   GetSQLValueString($_POST["strNombre_4"], "text"),
					   GetSQLValueString($_POST["strSEO_1"], "text"),
					   GetSQLValueString($_POST["strSEO_2"], "text"),
					   GetSQLValueString($_POST["strSEO_3"], "text"),
					   GetSQLValueString($_POST["strSEO_4"], "text"),
                       GetSQLValueString($_POST["refCategoria1"], "int"),
					   GetSQLValueString($_POST["refCategoria2"], "int"),
					   GetSQLValueString($_POST["refCategoria3"], "int"),
					   GetSQLValueString($_POST["refCategoria4"], "int"),
					   GetSQLValueString($_POST["refCategoria5"], "int"),
                       GetSQLValueString($_POST["strImagen1"], "text"),
					   GetSQLValueString($_POST["strImagen2"], "text"),
					   GetSQLValueString($_POST["strImagen3"], "text"),
					   GetSQLValueString($_POST["strImagen4"], "text"),
					   GetSQLValueString($_POST["strImagen5"], "text"),
                       GetSQLValueString($_POST["strDescripcion_1"], "text"),
					   GetSQLValueString($_POST["strDescripcion_2"], "text"),
					   GetSQLValueString($_POST["strDescripcion_3"], "text"),
					   GetSQLValueString($_POST["strDescripcion_4"], "text"),
					   GetSQLValueString($_POST["strDescripLarga_1"], "text"),
					   GetSQLValueString($_POST["strDescripLarga_2"], "text"),
					   GetSQLValueString($_POST["strDescripLarga_3"], "text"),
					   GetSQLValueString($_POST["strDescripLarga_4"], "text"),
					   GetSQLValueString($_POST["strCaracteristicas_1"], "text"),
					   GetSQLValueString($_POST["strCaracteristicas_2"], "text"),
					   GetSQLValueString($_POST["strCaracteristicas_3"], "text"),
					   GetSQLValueString($_POST["strCaracteristicas_4"], "text"),
                       GetSQLValueString(ProcesarComaPrecio($_POST["dblPrecio"]), "double"),
					   GetSQLValueString(ProcesarComaPrecio($_POST["dblPrecioAnterior"]), "double"),
					   GetSQLValueString($_POST["intEstado"], "int"),
					   GetSQLValueString($_POST["refMarca"], "int"),
					   GetSQLValueString($esprincipal, "int"),
					   GetSQLValueString($_POST["intStock"], "int"),
					    GetSQLValueString($_POST["refImpuesto"], "int"),					
					   GetSQLValueString($_POST["refGrupo"], "int"),					GetSQLValueString(ProcesarComaPrecio($_POST["dblPeso"]), "int"),
					   GetSQLValueString($_POST["strTitleSEO_1"], "text"),
					   GetSQLValueString($_POST["strTitleSEO_2"], "text"),
					   GetSQLValueString($_POST["strTitleSEO_3"], "text"),
					   GetSQLValueString($_POST["strTitleSEO_4"], "text"),
					   GetSQLValueString($_POST["strDesSEO_1"], "text"),
					   GetSQLValueString($_POST["strDesSEO_2"], "text"),
					   GetSQLValueString($_POST["strDesSEO_3"], "text"),
					   GetSQLValueString($_POST["strDesSEO_4"], "text"),
					   GetSQLValueString($_POST["idProducto"], "int")					   
					  );

//echo $updateSQL;
$Result1 = mysqli_query($con, $updateSQL) or die(mysqli_error($con));
	


  $insertGoTo = "producto-lista.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
		
		}
else
	{
		//EL SEO ESTÁREPETIDO
		 $insertGoTo = "error.php?error=6";
  		 header(sprintf("Location: %s", $insertGoTo));
	}
}

$query_DatosProducto = sprintf("SELECT * FROM tblproducto WHERE idProducto=%s", GetSQLValueString($_GET["id"], "int") );
$DatosProducto = mysqli_query($con,  $query_DatosProducto) or die(mysqli_error($con));
$row_DatosProducto = mysqli_fetch_assoc($DatosProducto);
$totalRows_DatosProducto = mysqli_num_rows($DatosProducto);


$query_DatosMarcas = sprintf("SELECT * FROM tblmarca WHERE intEstado=1 ORDER BY strMarca");

$DatosMarcas = mysqli_query($con,  $query_DatosMarcas) or die(mysqli_error($con));
$row_DatosMarcas = mysqli_fetch_assoc($DatosMarcas);
$totalRows_DatosMarcas = mysqli_num_rows($DatosMarcas);

$query_DatosImpuestos = sprintf("SELECT * FROM tblimpuesto ORDER BY strNombre");
$DatosImpuestos = mysqli_query($con,  $query_DatosImpuestos) or die(mysqli_error($con));
$row_DatosImpuestos = mysqli_fetch_assoc($DatosImpuestos);
$totalRows_DatosImpuestos = mysqli_num_rows($DatosImpuestos);

$query_PrecioGrupo = sprintf("SELECT * FROM tblpreciogrupo WHERE refPadre= 0 ORDER BY strNombre");
$PrecioGrupo = mysqli_query($con,  $query_PrecioGrupo) or die(mysqli_error($con));
$row_PrecioGrupo = mysqli_fetch_assoc($PrecioGrupo);
$totalRows_PrecioGrupo = mysqli_num_rows($PrecioGrupo);


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
    <title>Administración Tienda | Editar <?php echo $row_DatosProducto["strNombre_1"];?></title>
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
  selector: '.strDescripcion',
  height: 300,
  menubar: false,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor'
  ],
  toolbar: 'undo redo |  bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link '
});
	</script>

<div id="wrapper">
  <!-- Navigation -->
  <?php include("../includes/adm-menu.php"); ?>
  <div id="page-wrapper">
     <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Gestión de Productos</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <a href="producto-lista.php" class="btn btn-outline btn-info">Volver atrás</a><br>
<br>

            
<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Añadir Producto
                        </div>
                        <div class="panel-body">
                            <form action="producto-edit.php" method="post" id="forminsertar" name="forminsertar" role="form"><div class="row">
                                <div class="col-lg-6">
                                  
 
                                         <div class="form-group">
                                            <label for="strNombre_1">Nombre (Idioma 1)</label>
                                            <input class="form-control" placeholder="Escribir Nombre del producto" name="strNombre_1" id="strNombre_1" value="<?php echo $row_DatosProducto["strNombre_1"];?>" onChange="javascript:document.forminsertar.strSEO_1.value=CodificarSEO(document.forminsertar.strNombre_1.value);" required>
                                        </div>
                                         <div class="form-group">
                                            <label for="strSEO_1">SEO  (Idioma 1)</label>
                                            <input class="form-control" placeholder="Escribir SEO del producto" name="strSEO_1" id="strSEO_1" value="<?php echo $row_DatosProducto["strSEO_1"];?>" required>
                                        </div>
                                         <div class="form-group">
                                            <label for="strNomnre_2">Nombre  (Idioma 2)</label>
                                            <input class="form-control" placeholder="Escribir Nombre del producto" name="strNombre_2" id="strNombre_2" value="<?php echo $row_DatosProducto["strNombre_2"];?>" onChange="javascript:document.forminsertar.strSEO_2.value=CodificarSEO(document.forminsertar.strNombre_2.value);">
                                        </div>
                                         <div class="form-group">
                                            <label for="strSEO_2">SEO  (Idioma 2)</label>
                                            <input class="form-control" placeholder="Escribir SEO del producto" name="strSEO_2" id="strSEO_2" value="<?php echo $row_DatosProducto["strSEO_2"];?>">
                                        </div>
                                         <div class="form-group">
                                            <label for="strNombre_3">Nombre (Idioma 3)</label>
                                            <input class="form-control" placeholder="Escribir Nombre del producto" name="strNombre_3" id="strNombre_3" value="<?php echo $row_DatosProducto["strNombre_3"];?>" onChange="javascript:document.forminsertar.strSEO_3.value=CodificarSEO(document.forminsertar.strNombre_3.value);">
                                        </div>
                                         <div class="form-group">
                                            <label for="strSEO_3">SEO (Idioma 3)</label>
                                            <input class="form-control" placeholder="Escribir SEO del producto" name="strSEO_3" id="strSEO_3" value="<?php echo $row_DatosProducto["strSEO_3"];?>">
                                        </div>
                                         <div class="form-group">
                                            <label for="strNombre_4">Nombre (Idioma 4)</label>
                                            <input class="form-control" placeholder="Escribir Nombre del producto" name="strNombre_4" id="strNombre_4" value="<?php echo $row_DatosProducto["strNombre_4"];?>" onChange="javascript:document.forminsertar.strSEO_4.value=CodificarSEO(document.forminsertar.strNombre_4.value);">
                                        </div>
                                         <div class="form-group">
                                            <label for="strSEO_4">SEO  (Idioma 4)</label>
                                            <input class="form-control" placeholder="Escribir SEO del producto" name="strSEO_4" id="strSEO_4" value="<?php echo $row_DatosProducto["strSEO_4"];?>">
                                        </div>
                                          <div class="form-group">
                                            <label for="strDescripcion_1">Descripción Corta (Idioma 1)</label>
                                            <textarea name="strDescripcion_1" id="strDescripcion_1" class="strDescripcion"><?php echo $row_DatosProducto["strDescripcion_1"];?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="strDescripLarga_1">Descripción Larga (Idioma 1)</label>
                                            <textarea name="strDescripLarga_1" id="strDescripLarga_1" class="strDescripcion"><?php echo $row_DatosProducto["strDescripLarga_1"];?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="strCaracteristicas_1">Características (Idioma 1)</label>
                                            <textarea name="strCaractristicas_1" id="strCaracteristicas_1" class="strDescripcion"><?php echo $row_DatosProducto["strCaracteristicas_1"];?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="strDescripcion_2">Descripción Corta (Idioma 2)</label>
                                            <textarea name="strDescripcion_2" id="strDescripcion_2" class="strDescripcion"><?php echo $row_DatosProducto["strDescripcion_2"];?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="strDescripLarga_2">Descripción Larga (Idioma 2)</label>
                                            <textarea name="strDescripLarga_2" id="strDescripLarga_2" class="strDescripcion"><?php echo $row_DatosProducto["strDescripLarga_2"];?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="strCaracteristicas_2">Características (Idioma 2)</label>
                                            <textarea name="strCaracteristicas_2" id="strCaracteristicas_2" class="strDescripcion"><?php echo $row_DatosProducto["strCaracteristicas_2"];?></textarea>
                                        </div>                                      
                                        <div class="form-group">
                                            <label for="strDescripcion_3">Descripción Corta (Idioma 3)</label>
                                            <textarea name="strDescripcion_3" id="strDescripcion_3" class="strDescripcion"><?php echo $row_DatosProducto["strDescripcion_3"];?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="strDescripLarga_3">Descripción Larga (Idioma 3)</label>
                                            <textarea name="strDescripLarga_3" id="strDescripLarga_3" class="strDescripcion"><?php echo $row_DatosProducto["strDescripLarga_3"];?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="strCaracteristicas_3">Características (Idioma 3)</label>
                                            <textarea name="strCaracteristicas_3" id="strCaracteristicas_3" class="strDescripcion"><?php echo $row_DatosProducto["strCaracteristicas_3"];?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="strDescripcion_4">Descripción Corta (Idioma 4)</label>
                                            <textarea name="strDescripcion_4" id="strDescripcion_4" class="strDescripcion"><?php echo $row_DatosProducto["strDescripcion_4"];?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="strDescripLarga_4">Descripción Larga (Idioma 4)</label>
                                            <textarea name="strDescripLarga_4" id="strDescripLarga_4" class="strDescripcion"><?php echo $row_DatosProducto["strDescripLarga_4"];?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="strCaracteristicas_4">Características (Idioma 4)</label>
                                            <textarea name="strCaracteristicas_4" id="strCaracteristicas_4" class="strDescripcion"><?php echo $row_DatosProducto["strCaracteristicas_4"];?></textarea>
                                        </div>
                                         <div class="form-group">
                                            <label>Precio Antiguo</label>
                                            <input class="form-control" placeholder="Escribir Precio" name="dblPrecioAnterior" id="dblPrecioAnterior" value="<?php echo $row_DatosProducto["dblPrecioAnterior"];?>">
                                        </div>
                                          <div class="form-group">
                                            <label>Precio</label>
                                            <input class="form-control" placeholder="Escribir Precio" name="dblPrecio" id="dblPrecio" value="<?php echo $row_DatosProducto["dblPrecio"];?>">
                                        </div>
                                         
                                        
                                          <div class="form-group">
			<label>Impuesto</label>
			<select name="refImpuesto" class="form-control" id="refImpuesto">
				<?php do { ?>
				<option value="<?php echo $row_DatosImpuestos["idImpuesto"]?>" <?php if ($row_DatosProducto["refImpuesto"]==$row_DatosImpuestos["idImpuesto"]) echo "selected"; ?>><?php echo $row_DatosImpuestos["strNombre"]?></option>
				<?php
              		 } while ($row_DatosImpuestos = mysqli_fetch_assoc($DatosImpuestos)); 
	?>
			</select>
		</div>
		
		   <div class="form-group">
			<label>Precio Grupo</label>
			<select name="refGrupo" class="form-control" id="refGrupo">
				<option value="0">Sin descuento por Grupo</option>
				<?php do { ?>
				<option value="<?php echo $row_PrecioGrupo["idGrupo"]?>" <?php if ($row_DatosProducto["refGrupo"]==$row_PrecioGrupo["idGrupo"]) echo "selected"; ?>><?php echo $row_PrecioGrupo["strNombre"]?></option>
				<?php
              		 } while ($row_PrecioGrupo = mysqli_fetch_assoc($PrecioGrupo)); 
	?>
			</select>
		</div>
 <div class="form-group">
		<label>Peso</label>
		<input class="form-control" name="dblPeso" id="dblPeso" value="<?php echo $row_DatosProducto["dblPeso"];?>">
	</div>
                                        
                                         <div class="form-group">
                                            <label>Stock</label>
                                            <input class="form-control" placeholder="Escribir Stock" name="intStock" id="intStock" value="<?php echo $row_DatosProducto["intStock"];?>">
                                        </div>
<div class="form-group">
    <label>En página principal</label>
 <div class="checkbox">
<label>
<input type="checkbox" value="1" name="intPrincipal" id="intPrincipal" <?php if ($row_DatosProducto["intPrincipal"]==1){ ?>checked="checked" <?php }?>>
Marcar para mostrar el producto en la página principal de la tienda
</label>
</div>
                                        </div>                              
 <div class="form-group">
			<label>Marca</label>
			<select name="refMarca" class="form-control" id="refMarca">
				<option value="0" <?php if ($row_DatosProducto["refMarca"]==0) echo "selected"; ?>>Sin Marca</option>
				<?php do { ?>
				<option value="<?php echo $row_DatosMarcas["idMarca"]?>" <?php if ($row_DatosProducto["refMarca"]==$row_DatosMarcas["idMarca"]) echo "selected"; ?>><?php echo $row_DatosMarcas["strMarca"]?></option>
				<?php
              		 } while ($row_DatosMarcas = mysqli_fetch_assoc($DatosMarcas)); 
	?>
				
			</select>
		</div>
       <div class="form-group">
			<label>Estado</label>
			<select name="intEstado" class="form-control" id="intEstado">
				<option value="0" <?php if ($row_DatosProducto["intEstado"]=="0") echo "selected"; ?>>Inactivo</option>
				<option value="1" <?php if ($row_DatosProducto["intEstado"]=="1") echo "selected"; ?>>Activo</option>
				
			</select>
		</div>

 <div class="form-group">
		<label>Title SEO (Idioma 1)</label>
		<input class="form-control" placeholder="Escribir Titulo SEO" name="strTitleSEO_1" id="strTitleSEO_1" value="<?php echo $row_DatosProducto["strTitleSEO_1"];?>"  maxlength="100">
	</div>
 <div class="form-group">
		<label>Description SEO (Idioma 1)</label>
		<input class="form-control" placeholder="Escribir Descripción SEO" name="strDesSEO_1" id="strDesSEO_1" value="<?php echo $row_DatosProducto["strDesSEO_1"];?>"  maxlength="200">
	</div>
 <div class="form-group">
		<label>Title SEO (Idioma 2)</label>
		<input class="form-control" placeholder="Escribir Titulo SEO" name="strTitleSEO_2" id="strTitleSEO_2" value="<?php echo $row_DatosProducto["strTitleSEO_2"];?>"  maxlength="100">
	</div>
 <div class="form-group">
		<label>Description SEO (Idioma 2)</label>
		<input class="form-control" placeholder="Escribir Descripción SEO" name="strDesSEO_2" id="strDesSEO_2" value="<?php echo $row_DatosProducto["strDesSEO_2"];?>"  maxlength="200">
	</div>
 <div class="form-group">
		<label>Title SEO (Idioma 3)</label>
		<input class="form-control" placeholder="Escribir Titulo SEO" name="strTitleSEO_3" id="strTitleSEO_3" value="<?php echo $row_DatosProducto["strTitleSEO_3"];?>"  maxlength="100">
	</div>
 <div class="form-group">
		<label>Description SEO (Idioma 3)</label>
		<input class="form-control" placeholder="Escribir Descripción SEO" name="strDesSEO_3" id="strDesSEO_3" value="<?php echo $row_DatosProducto["strDesSEO_3"];?>"  maxlength="200">
	</div>
 <div class="form-group">
		<label>Title SEO (Idioma 4)</label>
		<input class="form-control" placeholder="Escribir Titulo SEO" name="strTitleSEO_4" id="strTitleSEO_4" value="<?php echo $row_DatosProducto["strTitleSEO_4"];?>"  maxlength="100">
	</div>
 <div class="form-group">
		<label>Description SEO (Idioma 4)</label>
		<input class="form-control" placeholder="Escribir Descripción SEO" name="strDesSEO_4" id="strDesSEO_4" value="<?php echo $row_DatosProducto["strDesSEO_4"];?>"  maxlength="200">
	</div>

                                        <button type="submit" class="btn btn-success">Actualizar</button>
                                        <input name="idProducto" type="hidden" id="idProducto" value="<?php echo $row_DatosProducto["idProducto"];?>">
                                      <input name="MM_insert" type="hidden" id="MM_insert" value="forminsertar">
                                       
                                    
                              </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
        <div class="form-group">
			<label>Categoría 1</label>
			<select name="refCategoria1" class="form-control" id="refCategoria1">
				<?php categoriadesplegablenivelProductosEdit(0, $row_DatosProducto["refCategoria1"]);?>
			</select>
		</div>
 <div class="form-group">
			<label>Categoría 2</label>
			<select name="refCategoria2" class="form-control" id="refCategoria2">
				<option value="0" <?php if (0==$row_DatosProducto["refCategoria2"]) echo "selected"; ?>>Sin Categoría</option>
				<?php categoriadesplegablenivelProductosEdit(0, $row_DatosProducto["refCategoria2"]);?>
			</select>
		</div>
 <div class="form-group">
			<label>Categoría 3</label>
			<select name="refCategoria3" class="form-control" id="refCategoria3">
			<option value="0" <?php if (0==$row_DatosProducto["refCategoria3"]) echo "selected"; ?>>Sin Categoría</option>
				<?php categoriadesplegablenivelProductosEdit(0, $row_DatosProducto["refCategoria3"]);?>
			</select>
		</div>
 <div class="form-group">
			<label>Categoría 4</label>
			<select name="refCategoria4" class="form-control" id="refCategoria4">
			<option value="0" <?php if (0==$row_DatosProducto["refCategoria4"]) echo "selected"; ?>>Sin Categoría</option>
				<?php categoriadesplegablenivelProductosEdit(0, $row_DatosProducto["refCategoria4"]);?>
			</select>
		</div>
 <div class="form-group">
			<label>Categoría 5</label>
			<select name="refCategoria5" class="form-control" id="refCategoria5">
			<option value="0" <?php if (0==$row_DatosProducto["refCategoria5"]) echo "selected"; ?>>Sin Categoría</option>
				<?php categoriadesplegablenivelProductosEdit(0, $row_DatosProducto["refCategoria5"]);?>
			</select>
		</div>
                                
<?php 
//BLOQUE INSERCION IMAGEN
//***********************
//***********************
//***********************									  //***********************
//PARÁMETROS DE IMAGEN
$nombrecampoimagen="strImagen1";
$nombrecampoimagenmostrar="strImagenpic1";
$nombrecarpetadestino="../images/productos/"; //carpeta destino con barra al final
$nombrecampofichero="file1";
$nombrecampostatus="status1";
$nombrebarraprogreso="progressBar1";
$maximotamanofichero="500000"; //en Bytes, "0" para ilimitado. 1000000 Bytes = 1000Kb = 1Mb
$tiposficheropermitidos="jpg, png"; //  Por ejemplo "jpg,doc,png", separados por comas y poner "0" para permitir todos los tipos
$limiteancho="500"; // En píxels, "0" significa cualquier tamaño permitido
$limitealto="400"; // En píxels, "0" significa cualquier tamaño permitido
									  
$cadenadeparametros="'".$nombrecampoimagen."','".$nombrecampoimagenmostrar."','".$nombrecarpetadestino."','".$nombrecampofichero."','".$nombrecampostatus."','".$nombrebarraprogreso."','".$maximotamanofichero."','".$tiposficheropermitidos."','".$limiteancho."','".$limitealto."'";

//$cadenadeparametros="";

									  
									  ?>
<div class="form-group">
	<label>Imagen Principal</label>
	<input class="form-control"  name="<?php echo $nombrecampoimagen;?>" id="<?php echo $nombrecampoimagen;?>" value="<?php echo $row_DatosProducto["strImagen1"];?>">
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
	<?php if ($row_DatosProducto["strImagen1"]!=""){?>
	<img src="<?php echo $nombrecarpetadestino.$row_DatosProducto["strImagen1"];?>" alt="" id="<?php echo $nombrecampoimagenmostrar;?>" width="200">
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
<?php 
//BLOQUE INSERCION IMAGEN
//***********************
//***********************
//***********************									  //***********************
//PARÁMETROS DE IMAGEN
$nombrecampoimagen="strImagen2";
$nombrecampoimagenmostrar="strImagenpic2";
$nombrecarpetadestino="../images/productos/"; //carpeta destino con barra al final
$nombrecampofichero="file2";
$nombrecampostatus="status2";
$nombrebarraprogreso="progressBar2";
$maximotamanofichero="500000"; //en Bytes, "0" para ilimitado. 1000000 Bytes = 1000Kb = 1Mb
$tiposficheropermitidos="jpg, png"; //  Por ejemplo "jpg,doc,png", separados por comas y poner "0" para permitir todos los tipos
$limiteancho="500"; // En píxels, "0" significa cualquier tamaño permitido
$limitealto="400"; // En píxels, "0" significa cualquier tamaño permitido
									  
$cadenadeparametros="'".$nombrecampoimagen."','".$nombrecampoimagenmostrar."','".$nombrecarpetadestino."','".$nombrecampofichero."','".$nombrecampostatus."','".$nombrebarraprogreso."','".$maximotamanofichero."','".$tiposficheropermitidos."','".$limiteancho."','".$limitealto."'";

//$cadenadeparametros="";

									  
									  ?>
<div class="form-group">
	<label>Imagen 2</label>
	<input class="form-control"  name="<?php echo $nombrecampoimagen;?>" id="<?php echo $nombrecampoimagen;?>" value="<?php echo $row_DatosProducto["strImagen2"];?>">
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
	<?php if ($row_DatosProducto["strImagen2"]!=""){?>
	<img src="<?php echo $nombrecarpetadestino.$row_DatosProducto["strImagen2"];?>" alt="" id="<?php echo $nombrecampoimagenmostrar;?>" width="200">
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
<?php 
//BLOQUE INSERCION IMAGEN
//***********************
//***********************
//***********************									  //***********************
//PARÁMETROS DE IMAGEN
$nombrecampoimagen="strImagen3";
$nombrecampoimagenmostrar="strImagenpic3";
$nombrecarpetadestino="../images/productos/"; //carpeta destino con barra al final
$nombrecampofichero="file3";
$nombrecampostatus="status3";
$nombrebarraprogreso="progressBar3";
$maximotamanofichero="500000"; //en Bytes, "0" para ilimitado. 1000000 Bytes = 1000Kb = 1Mb
$tiposficheropermitidos="jpg, png"; //  Por ejemplo "jpg,doc,png", separados por comas y poner "0" para permitir todos los tipos
$limiteancho="500"; // En píxels, "0" significa cualquier tamaño permitido
$limitealto="400"; // En píxels, "0" significa cualquier tamaño permitido
									  
$cadenadeparametros="'".$nombrecampoimagen."','".$nombrecampoimagenmostrar."','".$nombrecarpetadestino."','".$nombrecampofichero."','".$nombrecampostatus."','".$nombrebarraprogreso."','".$maximotamanofichero."','".$tiposficheropermitidos."','".$limiteancho."','".$limitealto."'";

//$cadenadeparametros="";

									  
									  ?>
<div class="form-group">
	<label>Imagen 3</label>
	<input class="form-control"  name="<?php echo $nombrecampoimagen;?>" id="<?php echo $nombrecampoimagen;?>" value="<?php echo $row_DatosProducto["strImagen3"];?>">
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
	<?php if ($row_DatosProducto["strImagen3"]!=""){?>
	<img src="<?php echo $nombrecarpetadestino.$row_DatosProducto["strImagen3"];?>" alt="" id="<?php echo $nombrecampoimagenmostrar;?>" width="200">
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
<?php 
//BLOQUE INSERCION IMAGEN
//***********************
//***********************
//***********************									  //***********************
//PARÁMETROS DE IMAGEN
$nombrecampoimagen="strImagen4";
$nombrecampoimagenmostrar="strImagenpic4";
$nombrecarpetadestino="../images/productos/"; //carpeta destino con barra al final
$nombrecampofichero="file4";
$nombrecampostatus="status4";
$nombrebarraprogreso="progressBar4";
$maximotamanofichero="500000"; //en Bytes, "0" para ilimitado. 1000000 Bytes = 1000Kb = 1Mb
$tiposficheropermitidos="jpg, png"; //  Por ejemplo "jpg,doc,png", separados por comas y poner "0" para permitir todos los tipos
$limiteancho="500"; // En píxels, "0" significa cualquier tamaño permitido
$limitealto="400"; // En píxels, "0" significa cualquier tamaño permitido
									  
$cadenadeparametros="'".$nombrecampoimagen."','".$nombrecampoimagenmostrar."','".$nombrecarpetadestino."','".$nombrecampofichero."','".$nombrecampostatus."','".$nombrebarraprogreso."','".$maximotamanofichero."','".$tiposficheropermitidos."','".$limiteancho."','".$limitealto."'";

//$cadenadeparametros="";

									  
									  ?>
<div class="form-group">
	<label>Imagen 4</label>
	<input class="form-control"  name="<?php echo $nombrecampoimagen;?>" id="<?php echo $nombrecampoimagen;?>" value="<?php echo $row_DatosProducto["strImagen4"];?>">
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
	<?php if ($row_DatosProducto["strImagen4"]!=""){?>
	<img src="<?php echo $nombrecarpetadestino.$row_DatosProducto["strImagen4"];?>" alt="" id="<?php echo $nombrecampoimagenmostrar;?>" width="200">
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
<?php 
//BLOQUE INSERCION IMAGEN
//***********************
//***********************
//***********************									  //***********************
//PARÁMETROS DE IMAGEN
$nombrecampoimagen="strImagen5";
$nombrecampoimagenmostrar="strImagenpic5";
$nombrecarpetadestino="../images/productos/"; //carpeta destino con barra al final
$nombrecampofichero="file5";
$nombrecampostatus="status5";
$nombrebarraprogreso="progressBar5";
$maximotamanofichero="500000"; //en Bytes, "0" para ilimitado. 1000000 Bytes = 1000Kb = 1Mb
$tiposficheropermitidos="jpg, png"; //  Por ejemplo "jpg,doc,png", separados por comas y poner "0" para permitir todos los tipos
$limiteancho="500"; // En píxels, "0" significa cualquier tamaño permitido
$limitealto="400"; // En píxels, "0" significa cualquier tamaño permitido
									  
$cadenadeparametros="'".$nombrecampoimagen."','".$nombrecampoimagenmostrar."','".$nombrecarpetadestino."','".$nombrecampofichero."','".$nombrecampostatus."','".$nombrebarraprogreso."','".$maximotamanofichero."','".$tiposficheropermitidos."','".$limiteancho."','".$limitealto."'";

//$cadenadeparametros="";

									  
									  ?>
<div class="form-group">
	<label>Imagen 5</label>
	<input class="form-control"  name="<?php echo $nombrecampoimagen;?>" id="<?php echo $nombrecampoimagen;?>" value="<?php echo $row_DatosProducto["strImagen5"];?>">
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
	<?php if ($row_DatosProducto["strImagen5"]!=""){?>
	<img src="<?php echo $nombrecarpetadestino.$row_DatosProducto["strImagen5"];?>" alt="" id="<?php echo $nombrecampoimagenmostrar;?>" width="200">
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
								</div>
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