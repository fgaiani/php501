<?php

require('../models/user.php');

$url = '../views/user.php?email=';

$name = $_POST['name'];
$email = $_POST['email'];
$age = $_POST['age'];
$password = $_POST['password'];

$user = User::findByEmail($email);

if ($user) {
    echo 'Email já cadastrado <br>';
    echo '<a href="../views/create.php">Voltar</a>';
} else {
    $user = new User($name, $email, $age, $password);
    $user->save();

    header('Location: ' . $url . $email, true, 303);
}