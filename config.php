<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="kal";
//    $conn = new mysqli($servername, $username, $password, "kal");

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    echo "Error: " . $e->getMessage();
}

?>