<?php

include "config.php" ;

session_start();

// if (isset($_SESSION['unique_id'])) {
//     header("Location: index.php");
// }

$errorEmpty = "" ;
$errorNotEmpty = "" ;

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

    if ( empty($_POST["email"]) || empty($_POST["password"]) ) {
        $errorEmpty = "All Inputs are required" ; 
        echo $errorEmpty;
    } else {

        $email = test( $_POST["email"] ) ;

        if ( !filter_var( $email , FILTER_VALIDATE_EMAIL ) ) {
            $errorNotEmpty .= $email . " - Syntax Error !" ;
            echo $errorNotEmpty ;
            exit() ;
        }

        $password = test( $_POST["password"] ) ;

        }

    if ( empty($errorEmpty) && empty($errorNotEmpty) ) {
        $sql = "SELECT * FROM users WHERE email = ?" ;
        $stmt = $db->prepare( $sql ) ;
        $stmt->execute(array($email)) ;

        if ( $stmt->rowCount() > 0 ) {
            $user = $stmt->fetch() ;
            if ( password_verify( $password, $user["password"] ) ) {
                $_SESSION["unique_id"] = $user["unique_id"] ;
                $sql2 = "UPDATE users set status = 'Online' WHERE unique_id = ?" ;
                $stmt2 = $db->prepare($sql2) ;
                $stmt2->execute( [ $_SESSION["unique_id"] ] ) ;                
                echo "success" ;
            } else {
                $info = "Password is incorrect." ;
                echo $info ;
            }
        } else {
                $info = "Email is incorrect." ;
                echo $info ;
        }
    }
}

    function test($data) {
        $data = trim( $data );
        $data = htmlspecialchars( $data );
        return $data;
    }


?>