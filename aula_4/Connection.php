<?php

$servidor = "pgsql:host=localhost;dbname=blog";
$usuario = 'postgres';
$senha = '';

try {
    $connection = new PDO($servidor, $usuario, $senha);
} catch(PDOException $e) {
    echo $e->getMessage();
    die;
}