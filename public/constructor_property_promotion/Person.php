<?php

class Person
{
	public function __construct(private $name, private $age, private $genre)
	{}

	public function __call($func, $args)
	{
		
		if (strpos($func, 'set') === 0) {
			$this->set($func, array_shift($args));
			return;
		}

		return $this->get($func);
	}

	private function set($func, $value)
	{
		$property = lcfirst(str_replace('set', '', $func));
		$propertyExists = property_exists($this, $property);
		if (!$propertyExists) {
			throw new InvalidArgumentException('Propiedade não existente');
		}

		$this->{$property} = $value;

	}

	private function get($func)
	{
		$property = lcfirst(str_replace('get', '', $func));
		$propertyExists = property_exists($this, $property);
		if (!$propertyExists) {
			throw new InvalidArgumentException('Propiedade não existente');
		}

		return $this->{$property};
	} 
}