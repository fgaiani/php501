<?php

require('../services/return_json.php');

require('../models/user.php');

$users = User::getAllUsers();

$response = [];

foreach ($users as $u) {
    $response[] = $u->toJson();
}

echo returnJson($response);