<?php
session_start();

if (!$_SESSION["unique_id"]) {
    header("Location: index.php");
    exit;
}

require "config.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize and validate the input (for security)
    $updatedName = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $updatedEmail = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $updatedSocialMedia = filter_var($_POST['social_media'], FILTER_SANITIZE_STRING);

    // Update the user's profile in the database
    $sqlUpdate = "UPDATE users SET username = :username, email = :email, social_media = :social_media WHERE unique_id = :unique_id";
    $stmtUpdate = $db->prepare($sqlUpdate);

    // Bind values
    $stmtUpdate->bindValue(':username', $updatedName, PDO::PARAM_STR);
    $stmtUpdate->bindValue(':email', $updatedEmail, PDO::PARAM_STR);
    $stmtUpdate->bindValue(':social_media', $updatedSocialMedia, PDO::PARAM_STR);
    $stmtUpdate->bindValue(':unique_id', $_SESSION['unique_id'], PDO::PARAM_INT);

    // Execute the statement
    $stmtUpdate->execute();

    // Handle success or error if needed
    // ...

    // Close the statement
    $stmtUpdate->closeCursor();

    // Redirect to the same page after the update
    if (!headers_sent()) {
        header('Location: http://localhost/PHP-EFM-ISMAGI/home.php');
        exit;
    } else {
        echo "Headers already sent. Please click <a href='".$_SERVER['PHP_SELF']."'>here</a> to refresh.";
        exit;
    }
}
?>
