<?php 

    include 'Login.php';

    $pdo = new PDO('mysql:host=localhost;port=3306;dbname=prueba','root','');

    $user = "e.g.e@gmail.com";
    $pass = "demo0412";
    $table = "usuario";

    $user = new Login($user,$pass,$pdo);

    print_r($user);




?>