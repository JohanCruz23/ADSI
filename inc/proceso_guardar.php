<?php 
include("../config/conexion.php");

$titulo = $_POST['titulo'];
$categoria = $_POST['categoria'];
$año = $_POST['año'];
$relacion = $_POST['relacion'];
$formato = $_POST['formato'];
$imagen = $_POST['imagen'];

$permitidos = array("image/jpg","image/png","image/gif","image/jpeg");

$path = "images/". basename($_FILES['imagen']['name']); 
 
if(move_uploaded_file($_FILES['imagen']['tmp_name'], $path)) {
    echo "El archivo ".  basename( $_FILES['imagen']['name']). " ha sido subido";
} else{
    echo "El archivo no se ha subido correctamente";
}

$query = "INSERT INTO `product_details` (`name`, `brand`, `price`, `ram`, `storage`, `imagen`, `status`) VALUES ('$titulo','$categoria','$año','$relacion','$formato','$imagen','1')";
$resultado = $conexion->query($query);

if($resultado){
    print "<script>alert(\"Se subio correctamente\");
		window.location='../index.php';</script>";
}
else{
    print "<script>alert(\"Error no se pudo procesar informacion\");
		window.location='formulario.php';</script>";
}


?>