<?php

require_once "./Person.php";


$values = ['name' => 'Anderson Lucas', 'age' => 20, 'genre' => 'Masculino'];
$person = new Person(...$values);
$person->setName('NameTeste');

echo $person->getName();