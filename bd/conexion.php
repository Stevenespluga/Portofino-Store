<?php

class conexion {
 public static function con()
	{
		$server = "localhost";
        $user = "root";
        $pass = "";
        $bd = "tienda";


        $con = mysqli_connect($server, $user, $pass,$bd) 
        or die("Ha sucedido un error inexperado en la conexion de la base de datos");

        return $con;

	}
}
?>
