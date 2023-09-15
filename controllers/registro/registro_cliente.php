<?php
  require_once("../../bd/conexion.php");
  //print_r($_POST);

  $cedula=$_POST['cedula'];
  $nombre=$_POST['nombre'];
  $apellido=$_POST['apellido'];
  $usuario=$_POST['usuario'];
  $password = hash('sha512', $_POST["password"]);
  $telefono=$_POST['telefono'];
  $direccion=$_POST['direccion'];
  $fecha=date("Y-m-d");


  $sql = ("INSERT INTO datos_personales(cedula,apellido,nombre,correo,telefono,direccion,fecha_registro) VALUES ('$cedula','$apellido','$nombre','$usuario','$telefono','$direccion','$fecha')");
        
        if (mysqli_query(conexion::con(), $sql)) {
             $consulta = ("SELECT  * FROM datos_personales ORDER BY id_registro DESC LIMIT 1");
              $r=mysqli_query(conexion::con(), $consulta);
              foreach ($r as $key) {
                $ultimo_id = $key['id_registro'];

                    $sql2 = ("INSERT INTO usuario(id_registro,email,password,tipo,estatus,fecha_registro) VALUES ('$ultimo_id','$usuario','$password','2','0','$fecha')");
       
			        if (mysqli_query(conexion::con(), $sql2)) {
			            header("Location:../../../registrarme.php?msj=yes");
			        }else{
			            header('location:../../../registrarme.php?msj=no');
			        }
                
          }
        }
        

  
?>