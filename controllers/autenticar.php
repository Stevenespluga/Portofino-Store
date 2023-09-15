<?php 
    // conexion a la base de datos
    include("../bd/conexion.php");
    session_start();
    
    $usuario = $_POST["usuario"];
    $pass = hash('sha512', $_POST["pass"]);
   
    $consulta = ("SELECT * FROM usuario WHERE email='$usuario' AND password='$pass' AND estatus='0'");
    $result=mysqli_query(conexion::con(), $consulta);
    $num=$result->num_rows; 

    if ($num>'0') {
        $_SESSION["aut"]="si";
        $_SESSION["tipo"]="tipo";
        $_SESSION["usuario"] = $usuario;

            header('location:../views/admin/home.php');        
    }else{
            header('location:../../login.php?msj=invalide');
    }
          
?>  

