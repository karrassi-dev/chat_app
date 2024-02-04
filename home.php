<?php

    session_start() ;

    if( !$_SESSION["unique_id"] ) {
        header("Location: index.php") ;
    }

    require "config.php" ;
    
    $sql = "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}" ;
    $stmt = $db->prepare($sql) ;
    $stmt->execute() ;
    $currentUser = $stmt->fetch() ;

    if( isset( $_GET["id"] ) ) {
        $sql2 = "SELECT * FROM users WHERE unique_id = {$_GET['id']}" ;
        $stmt2 = $db->prepare($sql2) ;
        $stmt2->execute() ;
        $friend = $stmt2->fetch() ;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="%PUBLIC_URL%/favicon.ico" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Render All Elements Normally -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- Font Awesome Library -->
    <link rel="stylesheet" href="css/all.min.css">
    <!-- Main Template Css File -->
    <link rel="stylesheet" href="css/css.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />    <title>Document</title>
</head>
<body>
    <nav>
        <div class="container">
            <div class="logo">
                    <h2>AH-ISMAGI</h2>
            </div>
            <div class="right">
                <i class="fa-solid fa-bell"></i>
                <div class="image">
                    <img src="images/<?= $currentUser["image"] ?>" alt="<?= $currentUser["image"] ?>">
                    <div class="info">
                        <h4><?= $currentUser["username"] ?></h4>
                        <p><?= $currentUser["email"] ?></p>
                    </div>
                    <i class="fa-solid fa-chevron-down"></i>
                </div>
            </div>
        </div>
    </nav>
    <div class="main">
        <div class="sidebar">
            <div class="top">
                <div class="icon home">
                    <a href="home.php">
                        <i class="fa-solid fa-house"></i>
                    </a>
                </div>
                <div class="icon inbox">
                    <a href="">
                        <i class="fa-solid fa-envelope"></i>
                    </a>
                </div>
                <div class="icon profile">
                    <a href="profile.php">
                        <i class="fa-solid fa-user"></i>
                    </a>
                </div>
                <div class="icon dark-mode">
                    <a href="">
                        <i class="fa-solid fa-sun"></i>                    
                    </a>
                </div>
            </div>
            <div class="bottom">
                <div class="icon log-out">
                <a href="logout.php">
                    <i class="fa-solid fa-right-from-bracket"></i>
                </a>
                </div>
            </div>
        </div>
        <div class="users">
            <div class="users-top">
                <div class="search" name="search">
                    <input type="text" placeholder="Search...">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
                <div class="active-now">
                    <h2>Active now</h2>
                    <div class="img">
                    </div>
                </div>
            </div>
            <div class="users-bottom">

            </div>
        </div>
            <?php
                if( !isset( $friend ) ) { ?>
                    <p class="no-user">Select a chat to start messaging...</p>
                    <?php } else { ?>
                        <div class="chat">
                        <div class="chat-top">
                            <img src="images/<?= $friend["image"] ?>" alt="<?= $friend["image"] ?>">
                            <div class="info">
                                <h2><?= $friend["username"] ?></h2>
                                <p><?= $friend["status"] === "Online" ? $friend["status"] . " Now" : $friend["status"] ; ?> </p>
                            </div>
                        </div>
                        <div class="chat-center">
                            
                        </div>
                        <div class="chat-bottom">
                            <div class="send">
                                <form class="form-chat" method="POST">
                                    <input type="hidden" name="sender_id" value="<?= $_SESSION['unique_id'] ?>" />
                                    <input type="hidden" name="reciever_id" value="<?= $friend['unique_id'] ?>" />
                                    <input class="input" type="text" name="message" placeholder="Type your message..." />
                                    <button type="submit">
                                        <span>Send</span>
                                        <i class="fa-solid fa-paper-plane"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="right-bar">
                        <?php if (isset($friend)): ?>
                            <h2 style="color: white"><?= $friend["username"] ?></h2>
                            <p style="color: white">Email: <?= $friend["email"] ?></p>
                            <p style="color: white">linkdin: <?= $friend["social_media"] ?></p>
                        <?php else: ?>
                            <p style="color: white">No user selected.</p>
                        <?php endif; ?>
                    </div>
            <?php } ?>
        
    </div>

    <script src="userss.js"></script>
    <script src="send_message.js"></script>

</body>
</html>