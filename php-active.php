<?php

    session_start() ;

    $unique_id = $_SESSION['unique_id'] ;

    require "config.php" ;
    $output = "" ;

    $sql = "SELECT * FROM users WHERE unique_id != ? AND status = 'Online'";
    $stmt = $db->prepare($sql) ;
    $stmt->execute( [ $unique_id ] ) ;

    if ( $stmt->rowCount() > 0 ) {
        $users = $stmt->fetchAll() ;
        foreach ($users as $user) {
            $output .= '
                <a href="home.php?id=' . $user["unique_id"] . '">
                    <div class="in-img">
                        <img src="images/' . $user['image'] . '" alt="1705919928-IMG_0028.jpg">
                        <span></span>
                    </div>
                </a>'    
            ;        
        }
    } else {
        $output .= "<p class='no-user serch-p'>No users are Online to chat...</p>" ;    
    }
    echo $output ;

?>