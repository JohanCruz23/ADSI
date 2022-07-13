<?php 
session_start();
include('../inc/header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head><!--Head-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.8.0/css/bootstrap-slider.min.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.8.0/bootstrap-slider.min.js"></script>
    <script src="../js/search.js"></script>
    <link rel="stylesheet" href="../css/formulario.css">
    <title>Busqueda fotos</title>
</head>
<body>
<header>
        <nav>
            <div class="logo">
                <img src="../logo/logo.png"  alt="" class="i1">
            </div>
        <div class="navbar">
           <a href="../index.php">Inicio</a>
           <a href="formulario.php">Cargar</a> 
        </div>
        </nav>
    </header><!--/Head-->

<!--Form-->
<div class="global-container">
	<div class="card login-form">
	<div class="card-body">
		<div class="card-text">
    <h8 class="titulo">Sube tu foto</h8>
			<form  action="proceso_guardar.php" method="POST">
				
      <div class="form-group">
					<label>Titulo de la foto</label>
					<input type="text" name="titulo" class="form-control form-control-sm" required>
			</div>

      <div class="form-group">
					<label>Categoria</label>
					<input type="text" name="categoria" class="form-control form-control-sm" required>
		  </div>
				
      <div class="form-group">
					<label>Año de la foto</label>
					<input type="text" name="año" class="form-control form-control-sm" required>
		  </div>

      <div class="form-group">
					<label>La foto tiene relacion con... (Aprendices, Egresandos, etc)</label>
					<input type="text" name="relacion" class="form-control form-control-sm" required>
		  </div>

      <div class="form-group">
					<label>Formato de la foto (JPG, JGEP, PNG)</label>
					<input type="text" name="formato" class="form-control form-control-sm" required>
		  </div>
      
      <label for="photo">Incluya una foto</label>
  <div class="drag-drop">
<input name="imagen" accept="image/png,image/jpeg,image/jpg"  size="30" type="file"><br>

  <input type="submit" value="Subir imagen" class="myButton">


				</div>


			</form>
		</div>
	</div>
</div>
</div>
<!--/Form-->


</body>
</html>


