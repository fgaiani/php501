<?php

class User
{
	private $name;
	private $email;
	private $id;
	private $createdAt;

	public function __wakeup()
	{
		$this->createdAt = new DateTime();
	}

	public function __toString()
	{
		return json_encode([
			'name' => $this->name,
			'email' => $this->email,
			'id' => $this->id
		]);
	}
}

$res = file_get_contents('users.txt');

$users = [];

foreach (explode('\n', $res) as $c)
{
	$users[] = unserialize($c);
}

foreach ($users as $u) {
	echo $u . '<br>';
}