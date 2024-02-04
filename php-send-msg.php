<?php

    session_start() ;

    require "config.php" ;

    $sender_id = $_POST["sender_id"] ;
    $reciever_id = $_POST["reciever_id"] ;
    $message = $_POST["message"] ;

    if( !empty( $message ) ) {
        $sql = "INSERT INTO messages ( sender_id , reciever_id , message ) VALUES ( ?, ?, ? )" ;
        $stmt = $db->prepare($sql) ;
        $stmt->execute([ $sender_id , $reciever_id , $message ]) ;
    }

?>