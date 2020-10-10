<?php
//include("../conect.php");
    $link = mysql_connect("localhost","root","kilo*sargento56")
        or die ("No me pude conectar");
    mysql_select_db ("empleados")
        or die ("No se puede seleccionar la base de datos");
?>

