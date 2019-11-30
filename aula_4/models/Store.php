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

abstract class Employee {
    public $id;
	public $salary;

	abstract public function getBonus(): double;

	protected function __construct($salary, $id=null)
	{	
		$this->id = $id;
		$this->salary = $salary;		
	}

	public function save()
	{
		if (!$this->id) {
			$query = $connection->prepare("
				INSERT INTO tb_employees
				(salary) VALUES ($this->salary);
			");
		} else {
			$query = $connection->prepare("UPDATE tb_employees
				SET salary = $this->salary;
			");
		}

		$query->execute();

		if (!$this->id) {
			$this->id = $connection->lastInsertId();
		}
	}
}

class Developer extends Employee {
    public function setLinesOfCode($lines) {
        global $connection;

        $connection->prepare("UPDATE tb_dev SET lines_of_code = $linesOfCode WHERE employee = $this->id")
                    ->execute();
    }

    public function getLinesOfCode() {
        global $connection;

		$query = $connection->query("SELECT * FROM tb_dev WHERE employee = $this->id");

		return $query->fetch(PDO::FETCH_ASSOC)['lines_of_code'];
    }

    public function getBonus(): double {
        return 5.0 * $this->getLinesOfCode();
    }

    public function __construct() {
        parent::__construct(5000);
    }

    public function getSalary() {
        return $fullSalary;
    }

    public function save(){
		global $connection;		

		$createTable = $this->id ? false : true;

		parent::save();

		if ($createTable) {
			$connection->prepare("INSERT INTO tb_dev (lines_of_code, employee) VALUES (0, $this->id)"
			)->execute();
		}
	}
}

class Administrator extends Employee {
    public function __construct() {
        parent::__construct();
    }

    public function getBonus() {

    }
}