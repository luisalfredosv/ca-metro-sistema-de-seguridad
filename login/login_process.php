<?php
	session_start();
	require_once 'dbconfig.php';
	require_once 'dbc_emp.php';
	if(isset($_POST['btn-login']))
	{
		//$usuario = $_POST['usuario'];
		$usuario = trim($_POST['usuario']);
		$clave = trim($_POST['clave']);
		
		$clave = md5($clave);
		
		try
		{	
		
			$stmt = $db_con->prepare("SELECT a.id, a.usuario, a.clave, a.nivel, a.cedula, a.nombre, a.apellido, a.gerencia, b.cod_ger, b.gerencia as gr FROM si_visitantes.usuarios as a, empleados.gerencia as b WHERE a.usuario=:usuario AND a.gerencia=b.cod_ger");
			$stmt->execute(array(":usuario"=>$usuario));
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$count = $stmt->rowCount();
			
			if($row['clave']==$clave){
				
				echo "ok"; // log in
				$_SESSION['user_session'] = $row['id'];
				$_SESSION['user_nivel'] = $row['nivel'];
				$_SESSION['user_usuario'] = $row['usuario'];
				$_SESSION['user_cedula'] = $row['cedula'];
				$_SESSION['user_name'] = utf8_encode($row['nombre']);
				$_SESSION['user_apellido'] = utf8_encode($row['apellido']);
				$_SESSION['user_gerencia'] = utf8_encode($row['gr']);
			}
			else{
				
				echo "El usuario o contraseña son incorrectos"; // wrong details 
			}
				
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

?>