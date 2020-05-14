  <?php require_once('../Connections/conexion.php'); 
RestringirAcceso("1");


$updateSQL = sprintf("UPDATE tblcomentario SET intEstado=1 WHERE idCOmentario=%s",
	   GetSQLValueString($_GET["id"], "int"));

//echo $updateSQL;
$Result1 = mysqli_query($con, $updateSQL) or die(mysqli_error($con));

  $updateGoTo = "comentario-lista.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));