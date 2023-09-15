<?php
include('../../bd/conexion.php');
//datos q necesito guardar en la base de datos
$id_registro = $_POST['id_registro'];
$foto = basename( $_FILES["fileToUpload"]["name"]);
$sql = ("SELECT * FROM foto_perfil WHERE foto = '$foto' AND id_registro = '$id_registro'");
$result = mysqli_query(conexion::con(), $sql);
$num=$result->num_rows;


if ($num == '1') {
  $fot = ("SELECT * FROM foto_perfil WHERE id_registro = '$id_registro'");
    $resu = mysqli_query(conexion::con(), $fot);
    $n = $resu->num_rows;
    foreach ($resu as $f) {
      if ($n >= '0') {
        $er = $f['foto'];
        unlink("uploads/$er");
        $sql = ("DELETE FROM foto_perfil WHERE id_registro='$id_registro'");
        if (mysqli_query(conexion::con(), $sql)) {
           $sql = ("INSERT into foto_perfil(id_registro, foto) values ('$id_registro', '$foto')");
            if (mysqli_query(conexion::con(), $sql)) {
                header('location:../../views/publico/perfil.php?msj=foto_update');
            }else {
                header('location:../../views/publico/perfil.php?msj=foto_update');
             //header('location:../../views/publico/perfil.php?msj=error_img');
          }
        }
      }
      
    }
   
 }elseif ($num == '0'){
  $sql = ("INSERT into foto_perfil(id_registro, foto) values ('$id_registro', '$foto')");
            if (mysqli_query(conexion::con(), $sql)) {
                header('location:../../views/publico/perfil.php?msj=foto_update');
            }else {
                header('location:../../views/publico/perfil.php?msj=foto_update');
             //header('location:../../views/publico/perfil.php?msj=error_img');
          }
}




//fin de registro
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    //echo "Error, ya existe una imagen con ese nombre.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 1000000) {
    echo "Error, el archivo q intentas subir es demasiado pesado, intenta con uno q no pase de 500kb.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
	header('location:../../views/publico/perfil.php?msj=foto_update');
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        
         header('location:../../views/publico/perfil.php?msj=foto_update');

    } else {
        header('location:../../views/publico/perfil.php?msj=error_foto');
    }
}
?>