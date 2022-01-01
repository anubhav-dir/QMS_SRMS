<?php

// localhost
$dbhost = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "srms_project";
$charset = "utf8mb4";

// Remotehost
// $dbhost = "fdb34.awardspace.net";
// $dbusername = "3894080_qms";
// $dbpassword = "#y9fwqzrajDZnmj";
// $dbname = "3894080_qms";
// $charset = "utf8mb4";

$dns = "mysql:host=$dbhost; dbname=$dbname; charset=$charset";

try {
    $pdo = new PDO($dns, $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // echo "Connected";
} catch (PDOException $e) {
    echo $e->getMessage();
}

?>
