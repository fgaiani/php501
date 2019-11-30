<?php

require('../services/return_json.php');

require('../models/user.php');

$name = $_POST['name'];
$email = $_POST['email'];

if (User::alreadyExits($email)) {
    echo return_json([
        'message' => 'Email já cadastrado'
    ]);
} else {
    $user = new User($name, $email);
    $user->save();

    echo return_json([
        'user' => $user->toJson()
    ]);
}
