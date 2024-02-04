<?php

session_start();

include "config.php" ;


// if (isset($_SESSION['unique_id'])) {
//     header("Location: index.php");
// }


$errorEmpty = "" ;
$errorNotEmpty = "" ;

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

    if ( empty($_POST['username']) || empty($_POST["email"]) || empty($_POST["password"]) || empty($_FILES["image"]["name"]) ) {
        $errorEmpty = "All Inputs are required" ; 
        echo $errorEmpty;
    } else {

        $username = test( $_POST['username'] ) ;
        if ( !preg_match( "/^[a-zA-Z-' ]*$/", $username ) ) {
            $errorNotEmpty .= $username . " - Only letters and white space allowed." ;
            echo $errorNotEmpty ;
            exit() ;
        }

        $email = test( $_POST["email"] ) ;
        if ( !filter_var( $email , FILTER_VALIDATE_EMAIL ) ) {
            $errorNotEmpty .= $email . " - Syntax Error !" ;
            echo $errorNotEmpty ;
            exit() ;
        } elseif ( strlen($email) > 100 ) {
            $errorNotEmpty .= $email . " - Only 100 characters allowed." ;
            echo $errorNotEmpty ;
            exit() ;
        }

        $password = test( $_POST["password"] ) ;
        if ( strlen($password) < 8 ) {
                $errorNotEmpty .= "Please enter a password with a minimum of 8 characters." ;
                echo $errorNotEmpty ;
                exit() ;
            }  elseif ( strlen($password) > 50 ) {
                $errorNotEmpty .= "The password allows access for only 50 characters." ;
                echo $errorNotEmpty ;
                exit() ;
            }

            $image = test( $_FILES["image"]["name"] ) ;
            if ( $_FILES['image']["error"] === UPLOAD_ERR_OK ) {
                $filename = basename($_FILES['image']["name"]);
                $extension = pathinfo($filename, PATHINFO_EXTENSION) ;
                $types = ["jpeg", "png", "jpg"];
                if ( in_array($extension, $types) == 1 ) {
                    $image = time() . "-" . $filename;
                    move_uploaded_file( $_FILES['image']["tmp_name"],"images/$image" ) ;
                } else {
                    $errorNotEmpty .= "Only PNG, JPG, or JPEG formats are allowed." ;
                    echo $errorNotEmpty ;
                    exit() ;
                }
            }

        }

    if ( empty($errorEmpty) && empty($errorNotEmpty) ) {
        $sql = "SELECT * FROM users WHERE email = ?" ;
        $stmt = $db->prepare($sql) ;
        $email = strtolower( $email ) ;
        $stmt->execute(array( $email )) ;
        if ( $stmt->rowCount() > 0 ) {
            $info =  'Email is already registred' ;
            echo $info ;
        } else {
                $status = "Offline" ;
                $unique_id = rand( time() , 1000000 ) ;
                $password = password_hash($password , PASSWORD_DEFAULT ) ;
                $sql = "INSERT INTO users (unique_id , username , email , password , image , status) VALUES (? , ? , ? , ? , ? , ?)" ;
                $stmt = $db->prepare($sql) ;
                $stmt->execute( array( $unique_id, $username, $email, $password, $image, $status ) ) ;
                $_SESSION["unique_id"] = $unique_id ;
                echo 'success' ;
            }
        }

    }

    function test($data) {
        $data = trim( $data );
        $data = htmlspecialchars( $data );
        return $data;
    }


?>