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
if($id==1){
    header("Refresh: 0;url=mantenimiento.php");
}elseif($id==2){
    header("Refresh: 0;url=index.php");
}
}
?>
<!DOCTYPE html>
<html lang="es-CL">
    <head>
        
        <?php
            require_once("head.php");


        ?>

    </head>
    <body>
        <div class="navbar navbar navbar-inverse navbar-fixed-top">
            <?php

                require_once("nav.php");

            ?>
        </div>
        <div class="container">
        
                    <?php
                        require_once("connect_estudiantes.php");
                        $id=$_GET['id'];
                            $datos = $users->find(['_id' => new MongoDB\BSON\ObjectID($id)]);
                            foreach ($datos as $dato) {   

                    ?>
                    
                        <h4><?php echo "Area: ".$dato["Area"].("<br>"); ?></h4>
                        <h4><?php echo "Maquina: ".$dato["Maquina"].("<br>");?></h4>
                        <h4><?php echo "Codigo: ".$dato["Codigo"].("<br>"); ?></h4>
                        <h4><?php echo "Fecha y Hora de paro: ".$dato["Fecha"].("<br>");?></h4>
                        <h4><?php echo "Diagnostico: ".$dato["Diagnostico"].("<br>");?> </h4>
                        <h4><?php echo "Firma Interna Operador: ".$dato["FirmaInterna"].("<br>");?> </h4>
                        <h4><?php echo "Estatus: ".$dato["Estatus"].("<br>"); ?></h4>
                        <h4><?php echo "Fecha y Hora de Recepcion: ".$dato["FechaRecepcion"].("<br>");?> </h4>
                        <h4><?php echo "Descripcion del trabajo: ".$dato["Descripcion del trabajo"].("<br>");?> </h4>
                        <h4><?php echo "Fecha y Hora de Entrega: ".$dato["Fecha de Entrega"].("<br>");?></h4>
                        <h4><?php echo "Refacciones: ".$dato["Refacciones"].("<br>"); ?></h4>
                        <h4><?php echo "Firma Mantenimiento: ".$dato["Firma Mantenimiento"].("<br>"); ?></h4>
<?php

}
                         ?>
                         <a href="Jefe.php?" class="btn btn-warning"><i class="icon-pencil icon-white"></i> Regresar a todas las Ordenes</a>


                        
        </div> 
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>   
    </body>
</html>