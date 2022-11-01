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
            error_reporting(0);
            $mensaje = $_GET["mensaje"];
            if ($mensaje == 1) {
                echo "<p class='btn  btn-danger'><i class='icon-trash icon-white'></i> El Reporte fue eliminado con éxito.</p><br><br>";
            
            }
            if ($mensaje == 2) {
                echo "<p class='btn  btn-success'><i class='icon-ok icon-white'></i> El Reporte fue guardado con éxito.</p><br><br>";
            }
            if ($mensaje == 3) {
                echo "<p class='btn  btn-warning'><i class='icon-refresh icon-white'></i> El Reporte fue modificado con éxito.</p><br><br>";
            }
        ?>
        <h3>Tabla de Ordenes de trabajo Completas</h3>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr class="tr-head">
                        <th>Area</th>
                        <th>Maquina</th>
                        <th>Fecha y Hora de paro</th>
                        <th>Descripcion del trabajo</th>
                        <th>Fecha y Hora de entrega</th>
                        <th>Firma Operador</th>
                        <th>Firma Mantenimiento</th>
                        <th>Folio</th>
                        <th>Ver mas</th>
                        <th>Eliminar</th>
                        </tr>
                    </thead>
                <tbody>
                    <?php
                        require_once("connect_estudiantes.php");
                        if ($users->count()>0)
                        {
                            $datos = $users->find(['Estatus' => 'Completo']);
                            foreach ($datos as $dato) {   

                    ?>
                    <tr>
                        <td><?php echo $dato["Area"]; ?></td>
                        <td><?php echo $dato["Maquina"]; ?></td>
                        <td><?php echo $dato["Fecha"]; ?></td>
                        <td><?php echo $dato["Descripcion del trabajo"]; ?></td>
                        <td><?php echo $dato["Fecha de Entrega"]; ?></td>
                        <td><?php echo $dato["FirmaInterna"]; ?></td>
                        <td><?php echo $dato["Firma Mantenimiento"]; ?></td>
                        <td><?php echo $dato["_id"]; ?></td>

                        
                        <td><a href="reportecompleto.php?id=<?php echo $dato["_id"]?>" class="btn btn-warning"><i class="icon-pencil icon-white"></i> Ver mas</a></td>
                        <td><a href="eliminarestudiante.php?nombre=<?php echo $dato["FirmaInterna"]?>" class="btn btn-danger"><i class="icon-remove icon-white"></i> Eliminar</a></td>

                    </tr>
                    <?php
                        }
                    }else{
                    ?>
                    <tr>
                        <td colspan="4"><h4><i class="icon-info-sign"></i> Sin registros en la Base de Datos</h4></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div> 
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>   
    </body>
</html>