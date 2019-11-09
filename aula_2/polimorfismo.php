<?php

// ##################################################################
// # Estrutura
// ##################################################################

class Object
{
	private $id;
}

interface Serializable2
{
	public function toString();
}

interface Printable
{
	public function print();
}

class User extends Object implements Serializable2, Printable
{
	public function __construct()
	{
		$this->name = 'Lucas Ricciardi de Salles';
		$this->age = 26;
	}

	public function print()
	{
		$result = <<<STR

<table>
	<thead>
		<tr>
			<th>Nome</th>
			<th>Idade</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<th>{$this->name}</th>
			<th>{$this->age}</th>
		</tr>
	</tbody>
</table>
STR;
		return $result;
	}

	public function toString()
	{
		return $this->name . ',' . $this->age;
	}
}

// ##################################################################
// # API
// ##################################################################

function findUserById($id): Object
{
	return new User();
}

function showInfo(Printable $printable)
{
	echo $printable->print();
}

function toJson(Serializable2 $serializable)
{
	return $serializable->toString();
}

function getUserById($id)
{
	$user = findUserById($id);

	$debug = true;

	if ($debug) {
		showInfo($user);
	}

	return toJson($user);
}

echo getUserById(12);