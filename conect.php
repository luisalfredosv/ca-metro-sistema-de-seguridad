<?php
session_start();
if(!isset($_SESSION['user_session'])){header("Location: index.php");}
include_once 'login/dbconfig.php';

$stmt = $db_con->prepare("SELECT * FROM usuarios WHERE id=:uid");
$stmt->execute(array(":uid"=>$_SESSION['user_session']));
$row=$stmt->fetch(PDO::FETCH_ASSOC);


//Comprobamos si esta definida la sesión 'tiempo'.
if(isset($_SESSION['tiempo']) ) {

    //Tiempo en segundos para dar vida a la sesión.
    $inactivo = 3600; // tiempo en segundos

    //Calculamos tiempo de vida inactivo.
    $vida_session = time() - $_SESSION['tiempo'];

        //Compraración para redirigir página, si la vida de sesión sea mayor a el tiempo insertado en inactivo.
        if($vida_session > $inactivo)
        {
            //Removemos sesión.
            session_unset();
            //Destruimos sesión.
            session_destroy();              
            //Redirigimos pagina.
            header("Location: index.php");
            ?>
            <script>
            


            </script>
            <?php
            exit();
        }
}else{
    //Activamos sesion tiempo.
    $_SESSION['tiempo'] = time();
}

?>