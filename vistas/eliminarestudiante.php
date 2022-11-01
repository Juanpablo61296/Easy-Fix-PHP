<?php
session_start();
error_reporting(0);
if ($_SESSION['user']==null || $_SESSION['user']=='') {
    echo "Usted no tiene autorizacion";
    die();
}
?>
<?php
require_once __DIR__ . '/vendor/autoload.php';
	
	/////////////////////////////////
	$nombre = $_GET['nombre'];
	



$collection = (new MongoDB\Client)->Estudiantes->Estudiantes;

	$collection->deleteOne(["FirmaInterna"=>$nombre]);
	////////////////////////////////
	
	header("Refresh: 0;url=Jefe.php?mensaje=1");
?>