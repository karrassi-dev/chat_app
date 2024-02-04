;;;<?php

    require "config.php" ;

    $sender_id = $_POST["sender_id"] ;
    $reciever_id = $_POST["reciever_id"] ;
    $output = "" ;

    $sql = "SELECT * FROM messages 
            INNER JOIN users ON users.unique_id = messages.sender_id 
            WHERE (messages.sender_id = ? AND messages.reciever_id = ?) 
            OR (messages.sender_id = ? AND messages.reciever_id = ?) 
            ORDER BY messages.id ASC";  

    $stmt = $db->prepare($sql) ;
    $stmt->execute([ $sender_id , $reciever_id , $reciever_id , $sender_id ]) ;

    if ( $stmt->rowCount() > 0 ) {
        $messages = $stmt->fetchAll() ;
        foreach ($messages as $message) {
            if ( $message["sender_id"] === $sender_id ) {
                $output .= '
                    <div class="chat-sender">
                        <div class="details">
                            <p>'. $message['message'] .'</p>
                        </div>
                        <img src="images/' . $message['image'] . '" alt="1705919928-IMG_0028.jpg">
                    </div>
                ' ;
            } else {
                $output .= '
                    <div class="chat-recipient">
                    <img src="images/' . $message['image'] . '" alt="1705919928-IMG_0028.jpg">
                    <div class="details">
                            <p>'. $message['message'] .'</p>
                        </div>
                    </div>
                ' ;
            }
        }
    }
    echo $output ;

?>