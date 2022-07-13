<?php 
session_start();
include('inc/header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head><!--Head-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.8.0/css/bootstrap-slider.min.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.8.0/bootstrap-slider.min.js"></script>
    <script src="js/search.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>Busqueda fotos</title>
</head>
<body>
<header>
        <nav>
            <div class="logo">
                <img src="./logo/logo.png"  alt="" class="i1">
            </div>
        <div class="navbar">
           <a href="index.php">Inicio</a>
           <a href="inc/formulario.php">Cargar</a> 
        </div>
        </nav>
    </header><!--/Head-->

    <div class="container">		
	<?php
	include 'class/Product.php';
	$product = new Product();	
	?>	
	<div class="row">
	<div class="col-md-3">                    
		<div class="list-group">
			<h3>Año</h3>	
			<div class="entrada">
				<input id="priceSlider" data-slider-id='ex1Slider' type="text" data-slider-min="2004" data-slider-max="2022" data-slider-step="1" data-slider-value="14"/>
				<div class="priceRange">2004 - 2022</div>
				<input type="hidden" id="minPrice" value="" />
				<input type="hidden" id="maxPrice" value="2022" />                  
			</div>			
		</div>    
		<div class="list-group">
			<h3>Categoria</h3>
			<div class="brandSection">
				<?php
				$brand = $product->getBrand();
				foreach($brand as $brandDetails){	
				?>
				<div class="list-group-item checkbox">
				<label><input type="checkbox" class="productDetail brand" value="<?php echo $brandDetails["brand"]; ?>"  > <?php echo $brandDetails["brand"]; ?></label>
				</div>
				<?php }	?>
			</div>
		</div>
		<div class="list-group">
			<h3>Relación Con:</h3>
			<?php			
			$ram = $product->getRam();
			foreach($ram as $ramDetails){	
			?>
			<div class="list-group-item checkbox">
			<label><input type="checkbox" class="productDetail ram" value="<?php echo $ramDetails['ram']; ?>" > <?php echo $ramDetails['ram']; ?></label>
			</div>
			<?php    
			}
			?>
		</div>    
		<div class="list-group">
			<h3>Tipo Soporte</h3>
			<?php
			$storage = $product->getStorage();
			foreach($storage as $storageDetails){	
			?>
			<div class="list-group-item checkbox">
			<label><input type="checkbox" class="productDetail storage" value="<?php echo $storageDetails['storage']; ?>"  > <?php echo $storageDetails['storage']; ?></label>
			</div>
			<?php
			}
			?> 
		</div>
	</div>
	<div class="col-md-9">
	 <br />
		<div class="row searchResult">
		</div>
	</div>
    </div>	
</div>	

</body>
</html>