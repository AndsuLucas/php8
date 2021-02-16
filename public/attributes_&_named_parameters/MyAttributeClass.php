<?php

require_once __DIR__ . '/MyAttributeContract.php';

#[Attribute]
class MyAttributeClass implements MyAttributeContract
{
	public function handle()
	{
		echo "Executing attribute class method.";
	}
}