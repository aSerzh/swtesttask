<?php

class ProductModel
{
	private $dbConnection;

	public function __construct(DatabaseConnection $dbc)
	{
		$this->dbConnection = $dbc;
	}
	private function getDBConnection()
	{
		return $this->dbConnection;
	}


	public function dbInit()
	{
		$this->dropProductsTable();
		$this->createProductsTable();
	}
	
	private function prepareStringForDelete(Array $arrayOfSKU)
	{
		return "'" . implode(",", $arrayOfSKU) . "'";
	}

	private function dropProductsTable()
	{
		$this->getDBConnection()->query('DROP TABLE products');
	}

	private function createProductTable()
	{
		$query = "CREATE TABLE 'products' (
			'sku' CHAR(9) PRIMARY KEY,
			'name' VARCHAR(100) DEFAULT NULL,
			'price' FLOAT(11, 2) DEFAULT NULL,
			'size' INT(6) DEFAULT NULL,
			'weight' INT(6) DEFAULT NULL,
			'height' INT(6) DEFAULT NULL,
			'width' INT(6) DEFAULT NULL,
			'length' INT(6) DEFAULT NULL,
		) DEFAULT CHARSET=utf8";

		$this->getDBConnection()->query($query);
	}

	//возникает желание разбить на классы

	public function getProducts()
	{
		$this->dbConnection->query("SELECT * FROM 'products'");
	}
	
	public function deleteProducts($arrayOfSKU)
	{
		$this->dbConnection->query(
			"DELETE FROM 'products' WHERE 'sku' IN
			( {$this->prepareStringForDelete($arrayOfSKU)} )"
		);
	}

	public function addProduct(Product $product)
	{
		$queryInput = [];
		$queryInput['type'] = get_class($product);

		$arrayOfAttributes = [
			'sku','name','price','size','weight','height','width','length'
		];

		foreach ($arrayOfAttributes as $value) {
			//ucwords();
			$queryInput[$value] = method_exists($product, "get{$value}") 
			? ($product->get{$value}())
			: 'NULL';
		}

		$query = "INSERT INTO 'products' 
			('sku','name','price','size','weight','height','width','length')
			VALUES ('{$queryInput['sku']}',
					'{$queryInput['name']}',
					'{$queryInput['price']}',
					'{$queryInput['size']}',
					'{$queryInput['weight']}',
					'{$queryInput['height']}',
					'{$queryInput['width']}',
					'{$queryInput['length']}')
		";
		$this->dbConnection->query($query);
	}
}