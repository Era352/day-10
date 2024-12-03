<?php

$host= 'localhost';
$dbname= 'usermanagement';
$username="root";
$password = "";

try{
    $pdo = new PDO ("mysql:host=$host;dbname=$dbname", $username, $password);

    //Set PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //echo mode

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        //Get from data
        $user = $_POST['username'];
        $email=$_POST['email'];
        $pass=$_POST['password'];

        if(empty($user) || empty($email) || empty($pass)){
            echo "All the fields are required!!";
            exit;
        };
        //Hash the password
    $hashed_password = password_hash($pass, PASSWORD_BCRYPT);

    //Prepare the SQL statemnt

    $sql= "INSERT INTO users (username,email,password) VALUES (:username, :email, :password)";
    $stmt = $pdo->prepare($sql);

    //Bind parameteres
    $stmt->bindParam(':username', $user, PDO::PARAM_STR );
    $stmt->bindParam(':email', $email, PDO::PARAM_STR );
    $stmt->bindParam(':password', $hashed_password, PDO::PARAM_STR );
    }
     if($stmt->execute()){
        echo "Sign Up succesful you can now login";
     }else{
        echo "Something went wrong please try again";
     };
   // echo "Connected";
}catch(PDOException $e){
    echo "Error: ".$e->getMessage();
};
?>