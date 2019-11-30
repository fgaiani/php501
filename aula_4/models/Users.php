<?php

$servidor = 'pgsql:host=localhost;dbname=blog';
$usuario = 'postgres';
$senha = '';

try {
	$connection = new PDO($servidor, $usuario, $senha);
} catch (PDOException $e) {
	echo $e->getMessage();
	die;
}

class User
{
	public $id;
	public $name;
	public $email;
	public $age;

	public static function getByEmail($email)
	{
		global $connection;

		$query = $connection->query("
			SELECT * FROM tb_users WHERE email = '$email'"
		);

		if (!$query) {
			return null;
		}

		$userData = $query->fetch(PDO::FETCH_ASSOC);

		return new User(
			$userData['name'],
			$userData['age'],
			$userData['email'],
			$userData['id']
		);
	}

	public function __construct($name, $email, $age, $id=null)
	{
		$this->id = $id;
		$this->name = $name;
		$this->age = $age;
		$this->email = $email;
	}

	public function save()
	{
        global $connection;

        if (!$this->id) {
            $query = $connection->prepare("INSERT INTO tb_users(name, email, age) VALUES ('$this->name','$this->email', '$this->age')");
        } else {
            $query = $connection->prepare(`UPDATE tb_users SET 
                                        name = ${$this->name},
                                        email = ${$this->email},
                                        age = ${$this->age} WHERE id ${$this->id};`);
        }
        $query->execute();
	}

	public function createProfile($data) {
		global $connection;
		
		$foto = $data['foto'];
		$site = $data['site'];
		$phone = $data['phone'];

		$query = $connection->query("INSERT INTO profile (iduser, foto, site, phone) VALUES
							($this->id, 
							'$foto',
							'$site',
							'$phone');");
		if (!$query) {
			return null;
		}

		$query->execute();

		$profile = new Profile();

		//$profile->id = $connection->lastInsertId();
		$profile->iduser = $this;
		$profile->foto = $foto;
		$profile->site = $site;
		$profile->phone = $phone;
		
		return $profile;
	}

	public function createProblem($data) {
		// A mesma implementação do createProfile
	}
}

class Profile {
    private $user;
    private $foto;
    private $site;
    private $phone;
}

class Problems {
	private $id;
	private $user;
	private $subject;
	private $message;	
}

class Developer extends User {
	private $salary;

	public function __construct($data, $salary) {
		
	}
}

$user = User::getByEmail('lucas.salles@4linux.com.br');

$profile = $user->createProfile([ 
	'foto' => 'https://avatars1.githubusercontent.com/u/13923301?s=400&v=4',
	'site' => 'lucas.com.br',
	'phone' => '199999992'
]);

var_dump($profile);