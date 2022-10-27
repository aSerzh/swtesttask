<?php

abstract class Product
{
	private $sku;
	private $name;
	private $price;

	public function __construct(array $input)
	{
		$this->sku = $input['sku'];
		$this->name = $input['name'];
		$this->price = $input['price'];
	}
	public function getSKU()
	{
		return $this->sku;
	}
	public function getName()
	{
		return $this->name;
	}
	public function getPrice()
	{
		return $this->price;
	}
}


class DVD extends Product
{
	private $size;
	public function __construct(array $input)
	{
		parent::__construct($input);
		$this->size = $input['size'];
	}
	public function getSize()
	{
		return $this->size;
	}
}

class Book extends Product
{
	private $weight;
	public function __construct(array $input)
	{
		parent::__construct($input);
		$this->weight = $input['weight'];
	}
	public function getWeight()
	{
		return $this->weight;
	}
}

class Furniture extends Product
{
	private $height;
	private $width;
	private $length;
	public function __construct(array $input)
	{
		parent::__construct($input);
		$this->height = $input['height'];
		$this->width = $input['width'];
		$this->length = $input['length'];
	}
	public function getHeight()
	{
		return $this->height;
	}
	public function getWidth()
	{
		return $this->width;
	}
	public function getLength()
	{
		return $this->length;
	}
}
