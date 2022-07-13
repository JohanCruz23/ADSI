<?php
class Product { 
	private $host  = 'localhost';
    private $user  = 'root';
    private $password   = ""; 
    private $database  = "php_producto";   
	private $productTable = 'product_details';
	private $dbConnect = false;
    public function __construct(){
        if(!$this->dbConnect){ 
            $conn = new mysqli($this->host, $this->user, $this->password, $this->database);
            if($conn->connect_error){
                die("Error al conectar con MySQL: " . $conn->connect_error);
            }else{
                $this->dbConnect = $conn;
            }
        }
    }
	private function getData($sqlQuery) {
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if(!$result){
			die('Error en la consulta: '. mysqli_error($conn));
		}
		$data= array();
		
		/*while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {*/
			while ($row = mysqli_fetch_assoc($result)) {
			$data[]=$row;            
		}
		return $data;
	}
	private function getNumRows($sqlQuery) {
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if(!$result){
			die('Error en la consulta: '. mysqli_error($conn));
		}
		$numRows = mysqli_num_rows($result);
		return $numRows;
	}		
	public function getBrand(){
		$sqlQuery = "
			SELECT DISTINCT(brand)
			FROM ".$this->productTable." 
			WHERE status = '1' ORDER BY id DESC";
        return  $this->getData($sqlQuery);
	}
	public function getStorage(){
		$sqlQuery = "
			SELECT DISTINCT(storage)
			FROM ".$this->productTable." 
			WHERE status = '1' ORDER BY storage DESC";
        return  $this->getData($sqlQuery);
	}
	public function getRam(){
		$sqlQuery = "
			SELECT DISTINCT(ram)
			FROM ".$this->productTable." 
			WHERE status = '1' ORDER BY ram ASC";
        return  $this->getData($sqlQuery);
	}
	public function searchProducts(){
		$sqlQuery = "SELECT * FROM ".$this->productTable." WHERE status = '1'";
		if(isset($_POST["minPrice"], $_POST["maxPrice"]) && !empty($_POST["minPrice"]) && !empty($_POST["maxPrice"])){
			$sqlQuery .= "
			AND price BETWEEN '".$_POST["minPrice"]."' AND '".$_POST["maxPrice"]."'";
		}
		if(isset($_POST["brand"])) {
			$brandFilterData = implode("','", $_POST["brand"]);
			$sqlQuery .= "
			AND brand IN('".$brandFilterData."')";
		}
		if(isset($_POST["ram"])){
			$ramFilterData = implode("','", $_POST["ram"]);
			$sqlQuery .= "
			AND ram IN('".$ramFilterData."')";
		}
		if(isset($_POST["storage"])) {
			$storageFilterData = implode("','", $_POST["storage"]);
			$sqlQuery .= "
			AND storage IN('".$storageFilterData."')";
		}
		$sqlQuery .= " ORDER By price";
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		$totalResult = mysqli_num_rows($result);
		$searchResultHTML = '';
		if($totalResult > 0) {
			/*while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {*/
			while ($row = mysqli_fetch_assoc($result)) {
				$searchResultHTML .= '
				<div class="col-sm-3 col-lg-1 col-md-" id="contenedor-producto">
				<div class="product">
				<img src="images/'. $row['imagen'] .'"  alt="" class="img-responsive" >

				
				
				
				<h4 style="color: #F1731C;" align="center">'. $row['name'] .'</h4>
				<center><button class="btn btn-success" type="button" data-toggle="modal" data-target="#modal1">Ver</button>


				<div class="container-mo">
				
				<div class="modal" tabindex="-1" id="modal1" >
				<div class="modal-dialog">
				<div class="modal-content">

				

				<div class="modal-body">
				<img src="images/'. $row['imagen'] .'"  alt="" class="img-responsive" >
				</div>

				<div class="modal-footer">
				<h4 style="color: #F1731C;" align="center">'. $row['name'] .'</h4>
				<h4 style="color: #F1731C;" align="center">'. $row['brand'] .'</h4>
				<h4 style="color: #F1731C;" align="center">Año '. $row['price'] .'</h4>
				<h4 style="color: #F1731C;" align="center">'. $row['ram'] .'</h4>
				<h4 style="color: #F1731C;" align="center">'. $row['storage'] .'</h4>
				</div>

				</div>
				</div>
				
				</div>
				
				</div>
				
				
				</div>
				</div>';
			}
		} else {
			$searchResultHTML = '<h3>No se ha encontrado ningún producto..</h3>';
		}
		return $searchResultHTML;	

	}	
}
?>