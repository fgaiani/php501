<?php

class User {
    public $name;
    public $email;
    public $age;
    public $password;

    public function __construct($name, $email, $age, $password) {
        $this->name = $name;
        $this->email = $email;
        $this->age = $age;
        $this->password = $password;
    }

    public static function findByEmail($email) {
        $res = file_get_contents('../users.txt');

        foreach (explode('\n', $res) as $c) {
            $user = unserialize($c);

            if ($user && $user->email == $email) {
                return $user;
            }
        }

        return null;
    }

    public function save() {

    }
}