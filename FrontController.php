<?php	
    class FrontController
	{
		public function route()
		{
			if ($this->method === 'GET' && $this->url === '/') {
				(new ShowProductsController)->act();
			} elseif ($this->method === 'GET' && $this->url === '/addProduct') {
				(new ShowProductAddFormController)->act();
			} elseif ($this->method === 'POST' && $this->url === '/' && isset($_POST['name'])) {
				(new ProductAddController)->act();
			} elseif ($this->method === 'POST' && $this->url === '/' && isset($_POST['sku'])) {
				(new DeleteProductsController)->act();
			} elseif ($this->method === 'POST' && $this->url === '/' && !count($_POST)) {
				(new ShowProductsController)->act();
			} else {
				(new DefaultController)->act();
			}
	}
