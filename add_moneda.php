<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error)
    die("Connection failed: " . $conn->connect_error);

$query = $conn->prepare('INSERT into monedas (moneda) values (?);');
$moneda = 5;
$query->bind_param('i', $_GET["moneda"]);
$query->execute();
$result = $query->get_result();

echo "done";