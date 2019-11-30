<?php

class User {
    private static $DB = '../db/user.txt';
    private $name;
    private $email;

    public function __construct($name, $email) {
        $this->name = $name;
        $this->email = $email;
    }

    public function toJson() {
        return [
            'name' => $this->name,
            'email' => $this->email
        ];
    }

    public function getAllUsers() {
        $res = file_get_contents(self::DB);

        $users = [];

        foreach(explode('\n', $res) as $c) {
            $users = unserialize($c);

            if ($user) {
                $users[] = $user;
            }
        }

        return $users;
    }

    public static function alreadyExits($email) {
        for () {
            if ($u->email == $email) {
                return true;
            }
        }
    }

    public function save() {
        $res = file_get_contents(self::DB);

        $users = [];


    }
}