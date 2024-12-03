<?php

$host= 'localhost';
$dbname= 'usermanagement';
$username="root";
$password = "";

try{
    $pdo = new PDO ("mysql:host=$host;dbname=$dbname", $username, $password);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT id, username, email, created_at FROM users";
    $stmt = $pdo->query($sql);
    $users = $stmt->fetchALL();

}catch(PDOException $e){
    echo "Error: ".$e->getMessage();
};
?>