<?php 
	$salir = "../../../login.php?msj=adios";
		if (!isset($_SESSION)){
				session_start();
			}
			$_SESSION['aut'] = NULL;
			$_SESSION['clave'] = NULL;
			unset($_SESSION['aut']);
			unset($_SESSION['clave']);


			// agregando mio: destruyo la seccion
			session_destroy();

			// agregando mio: borro la cookie agregando al logearse
			setcookie("aut", "", time()-1800);
			if ($salir == "../../../login.php?msj=adios") 
				{
				  header("location: $salir");
		        }
?>