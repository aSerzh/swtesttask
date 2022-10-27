<?php

class Controller
{
	private $model;
	public function __construct()
	{
		if (!isset($model)) {
			$dbConnectionSettings = new DatabaseConnectionSettings('localhost', 'root', 'root', 'products');
			$dbConnection = new DatabaseConnection($dbConnectionSettings);
			$this->model = new ProductModel($dbConnection);
		}
	}
	public function getModel()
	{
		return $this->model;
	}
}

class DeleteProductController extends Controller
{
	public function act()
	{
		$this->getModel()->deleteProducts($_POST['sku']);

		$products = $this->getModel()->getProducts();

		//// Non static method 'render' should not be called statically

		$productsContent = new Template();
		$productsContent->render(
			'template/products.php',
			[
				'products' => $products
			]
		);

		echo $productsContent->render(
			'templates/main.php',
			[
				'title' => 'Products list',
				'content' => $productsContent,
			]
		);
	}
}

class ShowProductsController extends Controller
{
	public function act()
	{
		$products = $this->getModel()->getProducts();
		$productsContent = new Template();
		$productsContent->render(
			'templates/products.php',
			[
				'products' => $products,
			]
		);

		echo $productsContent->render(
			'templates/main.php',
			[
				'title' => 'Products List',
				'content' => $productsContent,
			]
		);
	}
}

class ShowProductAddFormController extends Controller
{
	public function act()
	{
		$formContent = new Template;
		$formContent->render('templates/productAddForm.php');

		echo $formContent->render(
			'templates/main.php',
			[
				'title' => 'Add Product',
				'content' => $formContent
			]
		);
	}
} 

class ProductAddController extends Controller
{
	public function act()
	{
		$model = $this->getModel();
		$model->addProduct(new $_POST['type']($_POST));
		
		$products = $this->getModel()->getProduct();
		$productsContent = new Template;
		$productsContent->render(
			'templates/products.php',
			[
				'products' => $products,
			]
		);

		echo $productsContent->render(
			'templates/main.php',
			[
				'title' => 'Products List',
				'content' => $productsContent,
			]
		);
	}
}

class DefaultController extends Controller
{
	public function act()
	{
		$defaultContent = new Template;
		echo $defaultContent->render(
			'templates/main.php',
			[
				'title' => 'Error: Page is not found (404)',
				'content' => 'Page is not found',
			]
		);
	}
}