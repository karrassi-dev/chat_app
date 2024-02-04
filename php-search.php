<?php

    session_start() ;

    $unique_id = $_SESSION['unique_id'] ;

    require "config.php" ;

    $value = $_POST['searchValue'];

    $sql = "SELECT * FROM users WHERE username LIKE ? AND unique_id != ?";
    $stmt = $db->prepare($sql) ;
    $output = "" ;
    $stmt->execute([ "%$value%" , $unique_id ]) ;
    

    if ( $stmt->rowCount() > 0 ) {
        $users = $stmt->fetchAll() ;
        foreach ($users as $user) {
            $output .= '
                <a href="home.php?id=' . $user["unique_id"] . '">
                <div class="image">
                    <img src="images/' . $user['image'] . '" alt="1705919928-IMG_0028.jpg">
                    <div class="info">
                        <h4>' . $user['username'] . '</h4>
                        <p>' . $user['email'] . '</p>
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