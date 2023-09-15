<?php 
 class Usuario
{
	
	public function cambiar_password_user($id_registro, $password_actual, $nuevo_password, $repita_password)
	{
		$nueva = hash('sha512',$_POST['nuevo_password']);
		$pass = hash('sha512',$_POST['password_actual']);
		$consulta = ("SELECT  * FROM usuario WHERE id_registro = '$id_registro'");
		//die($consulta);
		$res=mysqli_query(conexion::con(), $consulta);
        foreach ($res as $key) {
        	$password_a = $key['password'];
        }
        
		if ($password_a == $pass) {
			$sql=("UPDATE usuario SET password='$nueva' WHERE id_registro='$id_registro'");
		if (mysqli_query(conexion::con(), $sql)) {
            header("Location:../../views/publico/home.php?msj=update_pass");
           }
		}else{
			header("location:../../views/publico/home.php?msj=error_pass");
		}	
	  }


	public function cambiar_password_admin($id_registro, $password_actual, $nuevo_password, $repita_password)
	{
		$pass = hash('sha512',$_POST['password_actual']);
		$consulta = ("SELECT  * FROM usuario WHERE id_registro = '$id_registro'");
		//die($consulta);
		$res=mysqli_query(conexion::con(), $consulta);
        foreach ($res as $key) {
        	$password_a = $key['password'];
        }
        
		if ($password_a == $pass) {
		
		$sql=("UPDATE usuario SET  password ='$nuevo_password'  WHERE id_registro = '$id_registro'");
		if (mysqli_query(conexion::con(), $sql)) {
            header("Location:../../views/admin/home.php?msj=update_pass");
            }
        }else{
        	header("location:../../views/admin/home.php?msj=error_pass");
	    }	
		
	}

} 
?>