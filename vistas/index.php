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
}elseif($id==1){
    header("Refresh: 0;url=mantenimiento.php");
}
}
?>
<!DOCTYPE html>
<html lang="es-CL">
    <head>
        
        <?php
        	require_once("head.php");


        ?>
        <title>Iniciar sesion</title>


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
        <form class="form-horizontal" action="AgregarEstudiante.php" method="post">
            <div class="control-group">
                <label class="control-label" for="inputNEst">Area</label>
                <div class="controls">
                    <input type="text" name="area" id="inputNEst" class="input-xlarge" placeholder="Area"/>
                </div>
            </div>
             <div class="control-group">
                <label class="control-label" for="inputAEst">Maquina</label>
                <div class="controls">
                    <input type="text" name="maquina" id="inputAEst" class="input-xlarge" placeholder="Maquina"/>
                </div>
            </div>
             <div class="control-group">
                <label class="control-label" for="inputEEst">Codigo de la maquina</label>
                <div class="controls">
                    <input type="text" name="codigo" id="inputEEst" class="input-xlarge" placeholder="Codigo de la maquina"/>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputSEst">Fecha y Hora</label>
                <div class="controls">
                    <input type="datetime-local" name="fecha" id="inputSEst" class="input-xlarge" placeholder="Fecha"/>
                </div>
            </div>
            
            <div class="control-group">
                <label class="control-label" for="inputMaño">Diagnostico del solicitante</label>
                <div class="controls">
                    <input type="text" name="diagnostico" id="inputMaño" class="input-xlarge" placeholder="Diagnostico del solicitante"/>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="inputMNu">Firma interna solicitante</label>
                <div class="controls">
                    <input type="text" name="firma" id="inputMNu" class="input-xlarge" placeholder="Firma interna solicitante"/>
                </div>
                </div>
                
             
            <div class="control-group">
                <div class="controls">
                    <button type="submit" class="btn btn-default btn-primary"><i class="icon-book icon-white"></i> Generar Reporte</button>
                   
                </div>
            </div>
             
        </form>

            <h3>Tabla de Ordenes de trabajo pendientes</h3>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr class="tr-head">
                        <th>Area</th>
                        <th>Maquina</th>
                        <th>Codigo</th>
                        <th>Fecha y Hora</th>
                        <th>Diagnostico</th>
                        <th>Firma Interna</th>
                        <th>Estatus</th>
                        <th>ID</th>
                        </tr>
                    </thead>
                <tbody>
                    <?php
                        require_once("connect_estudiantes.php");
                        if ($users->count()>0)
                        {
                            $datos = $users->find(['Estatus' => 'Pendiente']);
                            foreach ($datos as $dato) {   

                    ?>
                    <tr>
                        <td><?php echo $dato["Area"]; ?></td>
                        <td><?php echo $dato["Maquina"]; ?></td>
                        <td><?php echo $dato["Codigo"]; ?></td>
                        <td><?php echo $dato["Fecha"]; ?></td>
                        <td><?php echo $dato["Diagnostico"]; ?></td>
                        <td><?php echo $dato["FirmaInterna"]; ?></td>
                        <td><?php echo $dato["Estatus"]; ?></td>
                        <td><?php echo $dato["_id"]; ?></td>

                        
            

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
