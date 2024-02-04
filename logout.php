<?php

    session_start();

    include "config.php" ;


    $unique_id = $_SESSION['unique_id'] ;

    $sql = "UPDATE users set status = 'Offline' WHERE unique_id = ?" ;
    $stmt = $db->prepare($sql) ;
    $stmt->execute( [ $unique_id ] ) ;

    session_unset() ;
    session_destroy() ;

    header("location:index.php") ;