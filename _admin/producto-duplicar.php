<?php require_once('../Connections/conexion.php');
RestringirAcceso("1");
//MySQLi Fragmentos por http://www.dreamweaver-tutoriales.com
//Copyright Jorge Vila 2015

//DUPLICAR EL TABLA PRODUCTO
$query_DatosConsulta = sprintf("INSERT INTO tblproducto(strNombre_1, strSEO_1, refCategoria1, strImagen1, strDescripcion_1, dblPrecio, dblPrecioAnterior, intEstado, refMarca,  refCategoria2, refCategoria3, refCategoria4, refCategoria5, strImagen2, strImagen3, strImagen4, strImagen5, intPrincipal, intStock, refImpuesto, dblPeso ,refGrupo, strNombre_2, strDescripcion_2, strNombre_3, strDescripcion_3, strNombre_4, strDescripcion_4, strSEO_2, strSEO_3 ,strSEO_4, strTitleSEO_1, strTitleSEO_2, strTitleSEO_3, strTitleSEO_4, strDesSEO_1, strDesSEO_2, strDesSEO_3, strDesSEO_4) SELECT strNombre_1, strSEO_1, refCategoria1, strImagen1, strDescripcion_1, dblPrecio, dblPrecioAnterior, 0, refMarca,  refCategoria2, refCategoria3, refCategoria4, refCategoria5, strImagen2, strImagen3, strImagen4, strImagen5, intPrincipal, intStock, refImpuesto, dblPeso ,refGrupo, strNombre_2, strDescripcion_2, strNombre_3, strDescripcion_3, strNombre_4, strDescripcion_4, strSEO_2, strSEO_3 ,strSEO_4, strTitleSEO_1, strTitleSEO_2, strTitleSEO_3, strTitleSEO_4, strDesSEO_1, strDesSEO_2, strDesSEO_3, strDesSEO_4 FROM tblproducto WHERE idProducto= %s ", GetSQLValueString($_GET["id"], "int"));
$DatosConsulta = mysqli_query($con,  $query_DatosConsulta) or die(mysqli_error($con));
$ultimaduplicado = mysqli_insert_id($con);

//DUPLICAR CARACTERÍSTICA
	$query_ConsultaFuncion = sprintf("SELECT refCaracteristica, refSeleccionada FROM tblproductocaracteristica WHERE refProducto= %s ",
							   GetSQLValueString($_GET["id"], "int"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);

	if ($totalRows_ConsultaFuncion>0){
		do {
			
			$query_DatosConsulta = sprintf("INSERT INTO tblproductocaracteristica(refProducto, refCaracteristica, refSeleccionada) VALUES (%s, %s, %s) ", $ultimaduplicado,
							   GetSQLValueString($row_ConsultaFuncion["refCaracteristica"], "int"),
					   		   GetSQLValueString($row_ConsultaFuncion["refSeleccionada"], "int"));
$DatosConsulta = mysqli_query($con,  $query_DatosConsulta) or die(mysqli_error($con));
		
		} while ($row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion)); 
	}

//DUPLICAR OPCIONES
	$query_ConsultaFuncion = sprintf("SELECT refOpcion FROM tblproductoopcion WHERE refProducto= %s ",
							   GetSQLValueString($_GET["id"], "int"));
	//echo $query_ConsultaFuncion;
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);

	if ($totalRows_ConsultaFuncion>0){
		do {
			
			$query_DatosConsulta = sprintf("INSERT INTO tblproductoopcion(refProducto, refOpcion) VALUES (%s, %s) ", $ultimaduplicado,
					   		   GetSQLValueString($row_ConsultaFuncion["refOpcion"], "int"));
			$DatosConsulta = mysqli_query($con,  $query_DatosConsulta) or die(mysqli_error($con));
		
		} while ($row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion)); 
	}




header("Location:producto-lista.php");
?>