<?php
$host = 'localhost';
$dbname ='module10';
$username = 'root';
$pass = 'root';

try{
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $pass);
    // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO:ERRMODE_EXCEPTION);
    // echo "Connected!!";
}catch(PDOException $e){
    echo "Database connection failed: ".$e->getMessage();
}
?> 
Donika Pllana says:<?php
require_once 'config.php';

try{
    $sql = "SELECT id, username, email, password FROM users";
    $stmt = $pdo->query($sql);
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
}catch(PDOException $e){
    echo "Error fetching data: ".$e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html> 