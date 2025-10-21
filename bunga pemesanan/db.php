<?php
$hostname = "localhost";
$username = "tugaspabw_2414101030";
$password = "tugaspabw_2414101030";
$dbname = "tugaspabw_2414101030";

$conn = new mysqli($hostname, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}