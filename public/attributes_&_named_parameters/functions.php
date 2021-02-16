<?php

function executeClassByString(string $action)
{
	$methodName = explode(separator: '@', string: $action)[1];
	$className = explode(separator: '@', string: $action)[0];
	if (!class_exists($className)) {
		throw new \DomainException('Invalid class name.');
	}

	$refClass = new ReflectionClass($className);
	$refInstance = $refClass->newInstance();
	if (!method_exists($refInstance, $methodName)) {
		throw new \DomainException('Invalid method name.');	
	}

	$refFunction = new ReflectionMethod($refInstance, $methodName);
	$attribute = $refFunction->getAttributes(
		MyAttributeContract::class, 
		\ReflectionAttribute::IS_INSTANCEOF
	);

	if (empty($attribute)) {
		return;
	}

	$attribute = array_shift($attribute)->newInstance();

	$attribute->handle();
	$refInstance->$methodName();
}