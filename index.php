   <!DOCTYPE html>
   <html>
   <head>
       <meta charset="utf-8">
       <title>Iniciar sesion</title>
   </head>
   <body>
   

<?php
include_once 'includes/user.php';
include_once 'includes/user_session.php';


$userSession = new UserSession();
$user = new User();

if(isset($_SESSION['user'])){
    //echo "hay sesion";
    $user->setUser($userSession->getCurrentUser());
    $id=$user->getRol_id();
    echo $id;
    if ($id==1) {
        header("Refresh: 0;url=vistas/mantenimiento.php?");
    }else if ($id==2){
        header("Refresh: 0;url=vistas/index.php");
    }else if ($id==3){
        header("Refresh: 0;url=vistas/Jefe.php");
    }

}else if(isset($_POST['username']) && isset($_POST['password'])){
    
    $userForm = $_POST['username'];
    $passForm = $_POST['password'];

    $user = new User();
    if($user->userExists($userForm, $passForm)){
        //echo "Existe el usuario";
        $userSession->setCurrentUser($userForm);
        $user->setUser($userForm);
        $id=$user->getRol_id();
        if ($id==1) {
        header("Refresh: 0;url=vistas/mantenimiento.php");
    }else if ($id==2){
        header("Refresh: 0;url=vistas/index.php");
    }else if ($id==3){
        header("Refresh: 0;url=vistas/Jefe.php");
    }

        include_once 'vistas/home.php';
    }else{
        //echo "No existe el usuario";
        $errorLogin = "Nombre de usuario y/o password incorrecto";
        include_once 'vistas/login.php';
    }
}else{
    //echo "login";
    include_once 'vistas/login.php';
}





?>


   
   </body>
   </html>

    


