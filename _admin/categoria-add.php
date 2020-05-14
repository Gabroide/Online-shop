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

	if ((comprobarseocategorianoexiste($_POST["strSEO_1"], 1)) && (comprobarseocategorianoexiste($_POST["strSEO_2"], 2)) && (comprobarseocategorianoexiste($_POST["strSEO_3"], 3)) && (comprobarseocategorianoexiste($_POST["strSEO_4"], 4)))
	{
		
		$esprincipal=0;
	if ((isset($_POST["intPrincipal"])) && ($_POST["intPrincipal"]=="1"))
		$esprincipal=1;


  $insertSQL = sprintf("INSERT INTO tblcategoria(strNombre_1,strNombre_2,strNombre_3,strNombre_4, strSEO_1, strSEO_2, strSEO_3, strSEO_4, intEstado, refPadre, intOrden, intPrincipal) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST["strNombre_1"], "text"),
					   GetSQLValueString($_POST["strNombre_2"], "text"),
					   GetSQLValueString($_POST["strNombre_3"], "text"),
					   GetSQLValueString($_POST["strNombre_4"], "text"),
					   GetSQLValueString($_POST["strSEO_1"], "text"),
					   GetSQLValueString($_POST["strSEO_2"], "text"),
					   GetSQLValueString($_POST["strSEO_3"], "text"),
					   GetSQLValueString($_POST["strSEO_4"], "text"),
                       GetSQLValueString($_POST["intEstado"], "int"),
                       GetSQLValueString($_POST["refPadre"], "int"),
                       GetSQLValueString($_POST["intOrden"], "int"),
					   GetSQLValueString($esprincipal, "int")
					  );

  
  $Result1 = mysqli_query($con,  $insertSQL) or die(mysqli_error($con));


  $insertGoTo = "categoria-lista.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
		
			}
	else
	{
		//EL SEO NO ES ÚNICO
		 $insertGoTo = "error.php?error=7";
  		 header(sprintf("Location: %s", $insertGoTo));
	}
		
}
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
    <title>Administración Tienda | Añadir Categoría</title>
    <!-- InstanceEndEditable -->
    <!-- Bootstrap Core CSS -->
    <?php include("../includes/adm-cabecera.php"); ?>

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
                    <h1 class="page-header">Gestión de Categorías</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <a href="categoria-lista.php" class="btn btn-outline btn-info" title="Volver Atrás">Volver atrás</a><br>
			<br>

			<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Añadir Categoría
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                  <form action="categoria-add.php" method="post" id="forminsertar" name="forminsertar" role="form" >
                                       <div class="form-group">
                                            <label for="strNombre_1">Nombre de categoría (Idioma 1)</label>
                                            <input class="form-control" placeholder="Escribir Nombre del categoría" name="strNombre_1" id="strNombre_1" onChange="javascript:document.forminsertar.strSEO_1.value=CodificarSEO(document.forminsertar.strNombre_1.value);" required>
                                        </div>
                                         <div class="form-group">
                                            <label for="strSEO_1">SEO de categoría (Idioma 1)</label>
                                            <input class="form-control" placeholder="Escribir SEO del categoría" name="strSEO_1" id="strSEO_1" required>
                                        </div>
                                         <div class="form-group">
                                            <label for="strNombre_2">Nombre de categoría (Idioma 2)</label>
                                            <input class="form-control" placeholder="Escribir Nombre del categoría" name="strNombre_2" id="strNombre_2" onChange="javascript:document.forminsertar.strSEO_2.value=CodificarSEO(document.forminsertar.strNombre_2.value);">
                                        </div>
                                         <div class="form-group">
                                            <label for="strSEO_2">SEO de categoría (Idioma 2)</label>
                                            <input class="form-control" placeholder="Escribir SEO del categoría" name="strSEO_2" id="strSEO_2">
                                        </div>
                                         <div class="form-group">
                                            <label for="strNombre_3">Nombre de categoría (Idioma 3)</label>
                                            <input class="form-control" placeholder="Escribir Nombre del categoría" name="strNombre_3" id="strNombre_3" onChange="javascript:document.forminsertar.strSEO_3.value=CodificarSEO(document.forminsertar.strNombre_3.value);">
                                        </div>
                                         <div class="form-group">
                                            <label for="strSEO_3">SEO de categoría (Idioma 3)</label>
                                            <input class="form-control" placeholder="Escribir SEO del categoría" name="strSEO_3" id="strSEO_3">
                                        </div>
                                         <div class="form-group">
                                            <label for="strNombre_4">Nombre de categoría (Idioma 4)</label>
                                            <input class="form-control" placeholder="Escribir Nombre del categoría" name="strNombre_4" id="strNombre_4" onChange="javascript:document.forminsertar.strSEO_4.value=CodificarSEO(document.forminsertar.strNombre_4.value);">
                                        </div>
                                         <div class="form-group">
                                            <label for="strSEO_4">SEO de categoría (Idioma 4)</label>
                                            <input class="form-control" placeholder="Escribir SEO del categoría" name="strSEO_4" id="strSEO_4">
                                        </div>
                                        <div class="form-group">
                                            <label for="intOrden">Orden de categoría</label>
                                            <input class="form-control" placeholder="Escribir Orden de la categoría" name="intOrden" id="intOrden" required>
                                        </div>
                                          <div class="alert alert-danger oculto" id="errororden">Orden obligatorio</div>
                                          	<div class="form-group">
												<label for="refPadre">Categoría de la que depende</label>
												<select name="refPadre" class="form-control" id="refPadre">
													<option value="0">Categoría Principal</option>
													<?php categoriadesplegablenivel(0);?>
												</select>
											</div>
										   <div class="form-group">
												<label for="intEstado">Estado</label>
												<select name="intEstado" class="form-control" id="intEstado">
													<option value="0">Inactivo</option>
													<option value="1" selected>Activo</option>
												</select>
											</div>
										   <div class="form-group">
												<label for="intPrincipal">En página principal</label>
												 <div class="checkbox">
													<label>
														<input type="checkbox" value="1" name="intPrincipal" id="intPrincipal">
														Marcar para mostrar la categoría en la página principal de la tienda
													</label>
												</div>
                                        	</div>     
                                        <button type="submit" class="btn btn-success">Añadir</button>
                                      <input name="MM_insert" type="hidden" id="MM_insert" value="forminsertar">
                                       
                                    </form>
                              </div>
                                <!-- /.col-lg-6 (nested) -->
                                
                                <!-- /.col-lg-6 (nested) -->
                            </div>
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

     <?php include("../includes/adm-pie.php"); ?>
   

</body>

<!-- InstanceEnd --></html>