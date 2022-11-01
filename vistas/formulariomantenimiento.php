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
<?php
$id=$_GET['id'];
$firma=$_GET['firma'];
?>
        <form class="form-horizontal" action="CompletarReporte.php" method="post">
            <div class="control-group">
                <label class="control-label" for="inputNEst">Fecha y Hora de Recepcion</label>
                <div class="controls">
                    <input type="datetime-local" name="FechaRecepcion" id="inputNEst" class="input-xlarge" placeholder="FechaRecepcion"/>
                </div>
            </div>

             
             <div class="control-group">
                <label class="control-label" for="inputEEst">Descripcion de trabajo realizado</label>
                <div class="controls">
                    <input type="text" name="Descripciondetrabajorealizado" id="inputEEst" class="input-xlarge" placeholder="Descripciondetrabajorealizado"/>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputSEst">Fecha y Hora de entrega</label>
                <div class="controls">
                    <input type="datetime-local" name="fechadeentrega" id="inputSEst" class="input-xlarge" placeholder="Fechadeentrega"/>
                </div>
            </div>
            
            <div class="control-group">
                <label class="control-label" for="inputMaño">Refacciones Utilizadas</label>
                <div class="controls">
                    <input type="text" name="Refacciones" id="inputMaño" class="input-xlarge" placeholder="Refacciones"/>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputMNu">Firma interna mantenimiento</label>
                <div class="controls">
                    <input type="text" name="firmamante" id="inputMNu" class="input-xlarge" placeholder="Firmamante"/>
                </div>
                </div>


             <div class="control-group">
                <label class="control-label" for="inputMNu">Codigo de Orden</label>
                <div class="controls">
                    <input type="text" name="id" id="inputMNu" class="input-xlarge" readonly value=<?php echo($id);?> />
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputMNu">Firma interna Operador</label>
                <div class="controls">
                    <input type="text" name="firma" id="inputMNu" class="input-xlarge" readonly value=<?php echo($firma);?> />
                </div>
            </div>

            
             
            <div class="control-group">
                <div class="controls">
                    <button type="submit" class="btn btn-default btn-primary"><i class="icon-book icon-white"></i> Terminar Reporte</button>
                   
                </div>
            </div>


             
        </form>

            
        </div> 
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>   
    </body>
</html>