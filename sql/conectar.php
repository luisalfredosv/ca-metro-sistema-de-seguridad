<?php
//include("../conect.php");
$con = mysql_connect("localhost","user","password") 
 	   or die ("No me pude conectar");

mysql_select_db ("si_visitantes") 
or die ("No se puede seleccionar la base de datos");

?>

