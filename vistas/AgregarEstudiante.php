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

	

	//////////////////////////////////////
	$Area = $_POST["area"];
	$Maquina = $_POST["maquina"];
	$Codigo = $_POST["codigo"];
	$Fecha= $_POST["fecha"];
	$Diagnostico= $_POST["diagnostico"];
	$Firmainterna= $_POST["firma"];
	
	
	

$collection = (new MongoDB\Client)->Estudiantes->Estudiantes;
	//////////////////////////////////////
$insertOneResult = $collection->insertOne(["Area"=>$Area,
										   "Maquina"=>$Maquina,
										    "Codigo"=>$Codigo,
										    "Fecha"=>$Fecha,									 
										    "Diagnostico"=>$Diagnostico,
										    "FirmaInterna"=>$Firmainterna,
										    "Estatus"=>"Pendiente",]);



	header("Refresh: 0;url=reportegenerado.php?mensaje=2")
?>