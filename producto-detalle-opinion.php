<?php require_once('Connections/conexion.php');

//CAPTCHA
if ((isset($_POST['intCaptcha'])) && ($_POST['intCaptcha']==6))
{

if (isset($_SESSION['tienda2017Front_UserId']))
{
	//ES UN USUARIO REGISTRADO
	$insertSQL = sprintf("INSERT INTO tblcomentario (refProducto, strFecha, refUsuario, strNombreComentador, txtComentario) VALUES (%s, NOW(), %s, %s, %s)",
                       GetSQLValueString($_POST['refProducto'], "int"), GetSQLValueString($_SESSION['tienda2017Front_UserId'], "text"),
						  GetSQLValueString($_POST['strNombreComentador'], "text"),
					   GetSQLValueString($_POST['txtComentario'], "text"));
	
	 $Result1 = mysqli_query($con, $insertSQL) or die(mysqli_error($con));
}
else
{
	//ES UN USUARIO ANÓNIMO
	$insertSQL = sprintf("INSERT INTO tblcomentario (refProducto, strFecha, strNombreComentador, txtComentario) VALUES (%s, NOW(), %s, %s)",
                       GetSQLValueString($_POST['refProducto'], "int"), GetSQLValueString($_POST['strNombreComentador'], "text"),
					   GetSQLValueString($_POST['txtComentario'], "text"));
	
	 $Result1 = mysqli_query($con, $insertSQL) or die(mysqli_error($con));
	
}

}
//echo $insertSQL;
 header(sprintf("Location: ".$_POST['refURL']));

?>