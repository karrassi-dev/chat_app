<?php

    session_start() ;

    $unique_id = $_SESSION['unique_id'] ;

    require "config.php" ;

    $output = "" ;

    $sql = "SELECT * FROM users WHERE unique_id != ?";
    $stmt = $db->prepare($sql) ;
    $stmt->execute( [ $unique_id ] ) ;

    if ( $stmt->rowCount() > 0 ) {
        $users = $stmt->fetchAll() ;
        foreach ($users as $user) {

            $sql2 = "SELECT * FROM messages WHERE (sender_id = {$user['unique_id']}
            OR reciever_id = {$user['unique_id']}) AND (sender_id = {$unique_id} 
            OR reciever_id = {$unique_id}) ORDER BY id DESC LIMIT 1";
            $stmt2 = $db->prepare($sql2) ;
            $stmt2->execute() ;
            $message = $stmt2->fetch() ;
            ($stmt2->rowCount() > 0) ? $result = $message['message'] : $result ="No message available";
            (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
            if(isset($message['sender_id'])){
                ($unique_id == $message['sender_id']) ? $you = "You: " : $you = "";
            }else{
                $you = "";
            }

            $output .= '
                <a href="home.php?id=' . $user["unique_id"] . '">
                    <div class="image">
                        <img src="images/' . $user['image'] . '" alt="1705919928-IMG_0028.jpg">
                        <div class="info">
                            <h4>' . $user['username'] . '</h4>
                            <p><span class="you">' . $you . '</span>' . $msg . '</p>
                        </div>
                        <div class="' . ($user['status'] == "Online" ? 'status-active' : 'status') . '"></div>
                        </div>
                </a>';        
        }
    } else {
        $output .= "<p class='no-user serch-p'>No users are available to chat...</p>" ;    
    }
    echo $output ;

?>