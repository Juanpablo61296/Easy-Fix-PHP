<?php
include_once '../includes/user.php';
include_once '../includes/user_session.php';
session_start();
error_reporting(0);
if ($_SESSION['user']==null || $_SESSION['user']=='') {
    echo "Usted no tiene autorizacion";
    die();
}else{
    include_once 'includes/user.php';
include_once 'includes/user_session.php';


$userSession = new UserSession();
$user = new User();

if(isset($_SESSION['user'])){
    //echo "hay sesion";
    $user->setUser($userSession->getCurrentUser());
    $id=$user->getRol_id();
}
if($id==3){
    header("Refresh: 0;url=Jefe.php");
}elseif($id==2){
    header("Refresh: 0;url=index.php");
}
}
?>
<?php
require_once __DIR__ . '/vendor/autoload.php';


                        
                        
	

	//////////////////////////////////////
	$FechaRecepcion = $_POST["FechaRecepcion"];
	$Descripciondetrabajo = $_POST["Descripciondetrabajorealizado"];
	$Fechaentrega= $_POST["fechadeentrega"];
	$Refacciones= $_POST["Refacciones"];
	$Firmamante= $_POST["firmamante"];
	$id= $_POST["id"];
	
	
	

$collection = (new MongoDB\Client)->Estudiantes->Estudiantes;
	//////////////////////////////////////
$insertOneResult  =  $collection -> updateOne ([ "_id"  =>  new MongoDB\BSON\ObjectID ( $id )], [ '$set'  =>  [ "FechaRecepcion"  =>  $FechaRecepcion]] );
$insertOneResult  =  $collection -> updateOne ([ "_id"  =>  new MongoDB\BSON\ObjectID ( $id )], [ '$set'  =>  [ "Descripcion del trabajo"  =>  $Descripciondetrabajo]] );
$insertOneResult  =  $collection -> updateOne ([ "_id"  =>  new MongoDB\BSON\ObjectID ( $id )], [ '$set'  =>  [ "Fecha de Entrega"  =>  $Fechaentrega]] );
$insertOneResult  =  $collection -> updateOne ([ "_id"  =>  new MongoDB\BSON\ObjectID ( $id )], [ '$set'  =>  [ "Refacciones"  =>  $Refacciones]] );
$insertOneResult  =  $collection -> updateOne ([ "_id"  =>  new MongoDB\BSON\ObjectID ( $id )], [ '$set'  =>  [ "Firma Mantenimiento"  =>  $Firmamante]] );
$insertOneResult  =  $collection -> updateOne ([ "_id"  =>  new MongoDB\BSON\ObjectID ( $id )], [ '$set'  =>  [ "Estatus"  =>  "Completo"]] );


	header("Refresh: 0;url=mantenimiento.php?mensaje=2&echo($id)")
?>