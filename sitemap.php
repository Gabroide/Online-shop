<?php //ini_set('display_errors', '1');
//error_reporting(1);
require_once('Connections/conexion.php');
header('Content-type: application/xml');
echo '<?xml version="1.0" encoding="UTF-8"?>';?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
 <url>
      <loc><?php echo _strURL;?></loc>
      <lastmod><?php echo date("Y-m-d");?></lastmod>
      <changefreq>monthly</changefreq>
      <priority>0.8</priority>
      </url>
<?php $query_ConsultaFuncion = "SELECT idCategoria FROM tblcategoria WHERE intEstado=1  ";
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	if ($totalRows_ConsultaFuncion>0){
	do {


		?>
      <url>
      <loc><?php echo _strURL."/".GenerarRutaCategoria($row_ConsultaFuncion["idCategoria"]);?></loc>
      <lastmod><?php echo date("Y-m-d");?></lastmod>
      <changefreq>monthly</changefreq>
      <priority>0.8</priority>
      </url>
       <?php


	} while ($row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion)); 
	}

//PRODUCTOS
$query_ConsultaFuncion = "SELECT * FROM  tblproducto WHERE intEstado=1 ";
	$ConsultaFuncion = mysqli_query($con,  $query_ConsultaFuncion) or die(mysqli_error($con));
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
	
	do{
		$linkProducto=_strURL."/".GenerarRutaCategoria($row_ConsultaFuncion["refCategoria1"]).$row_ConsultaFuncion["strSEO_"._idiomaactual].".html";
		?>
        <url>
      <loc><?php echo $linkProducto; ?></loc>
      <lastmod><?php echo date("Y-m-d");?></lastmod>
      <changefreq>monthly</changefreq>
      <priority>0.8</priority>
   </url>
        
        <?php
	} while ($row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion)); 
	?>
</urlset>