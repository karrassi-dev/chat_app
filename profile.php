<?php

global $db;
session_start();

if (!$_SESSION["unique_id"]) {
    header("Location: index.php");
    exit;
}

require "config.php";

$sql = "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}";
$stmt = $db->prepare($sql);
$stmt->execute();
$currentUser = $stmt->fetch();

if (isset($_GET["id"])) {
    // Sanitize the input to prevent SQL injection
    $friendId = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    $sql2 = "SELECT * FROM users WHERE unique_id = $friendId";

    $stmt2 = $db->prepare($sql2);
    $stmt2->execute();
    $friend = $stmt2->fetch();
}
?>



<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</head>
<body>
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <form class="form-chat" method="POST" action="update_profile.php">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img class="rounded-circle mt-5" width="150px" src="/images/<?=$currentUser['image']?>">
                    <span class="font-weight-bold"><?= $currentUser['email'] ?></span>
                    <?php if (isset($friend)): ?>
                        <span class="text-black-50"><?= $friend['email'] ?></span>
                    <?php endif; ?>
                    <span> </span>
                </div>        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Name</label><input name="name" type="text" class="form-control" placeholder="first name" value="<?= $currentUser['username'] ?>"></div>
                    <!--                    <div class="col-md-6"><label class="labels">Surname</label><input type="text" class="form-control" value="--><?php //= $currentUser['username'] ?><!--" placeholder="surname"></div>-->
                </div>
                <div class="row mt-3">

                    <div class="col-md-12"><label class="labels">Email</label><input name="email" type="text" class="form-control" placeholder="enter email id" value="<?= $currentUser['email'] ?>"></div>
                    <div class="col-md-12"><label class="labels">linkdin</label><input name="social_media" type="text" class="form-control" placeholder="social media" value="<?= $currentUser['social_media'] ?>"></div>
                </div>

<!--
-->

                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Update Profile</button></div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center experience"><span>Edit Experience</span><span class="border px-3 p-1 add-experience"><i class="fa fa-plus"></i>&nbsp;Experience</span></div><br>
                <div class="col-md-12"><label class="labels">Experience in Designing</label><input type="text" class="form-control" placeholder="experience" value=""></div> <br>
                <div class="col-md-12"><label class="labels">Additional Details</label><input type="text" class="form-control" placeholder="additional details" value=""></div>
            </div>
        </div>
        </form>

        </div>



    </div>
</div>
</div>
</div>
<!-- Include jQuery -->



</body>
</html>