<!DOCTYPE html>
<html lang="en">
<head>
    <?php
            require_once("head.php");

        ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sesiones</title>

    <link rel="stylesheet" href="main.css">
</head>
<body>

    <form action="" method="POST">
        <?php
            if(isset($errorLogin)){
                echo $errorLogin;
            }
        ?>
        <h2>Iniciar sesión</h2>
        <p>Nombre de usuario: <br>
        <input type="text" name="username"></p>
        <p>Password: <br>
        <input type="password" name="password"></p>
        <p class="center"><input type="submit" value="Iniciar Sesión"></p>
    </form>

    

<h3 align="center">Tabla de Ordenes de trabajo pendientes</h3>
                <table align="center">
                    <thead>
                        <tr class="tr-head">
                        <th>Area</th>
                        <th>Maquina</th>
                        <th>Codigo</th>
                        <th>Fecha y Hora</th>
                        <th>Diagnostico</th>
                        <th>Firma Interna</th>
                        <th>Estatus</th>
                        </tr>
                    </thead>
                <tbody>
                    <?php
                        require_once("connect_estudiantes.php");
                        if ($users->count()>0)
                        {
                            //$datos = $users->find()
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
            
</body>
</html>