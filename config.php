<?php

$dsn =  "mysql:host=localhost;dbname=efm-php-ismagi" ;
$user  = "root" ;
$pass = "" ;

try {
    $db = new PDO( $dsn , $user , $pass ) ; 
} catch (PDOException $chater) {
    die( "Not Connected : " . $chater->getMessage() ) ;
} 