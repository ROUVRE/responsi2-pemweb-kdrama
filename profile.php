<?php
include("inc/navbar.php");
include("inc/link.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>

<body>
    <div class="profileHead">
        <h1>My Profile</h1>
        <a href="">
            <i class="fa-solid fa-arrow-right-from-bracket"></i>
        </a>
    </div>
    <div class="logBox">
        <div class="logTop">
            <div>
                <i class="fa-solid fa-user"></i>
            </div>
        </div>
        <div class="logBot">
            <form action="" method="post">
                <div>
                    <label for="name">Name :</label>
                    <div class="inputBox">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" name="Name">
                    </div>
                    <label for="username">Username :</label>
                    <div class="inputBox">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" name="username">
                    </div>
                    <label for="password">Password :</label>
                    <div class="inputBox">
                        <i class="fa-solid fa-key"></i>
                        <input type="password" name="password" id="">
                        <i class="fa-solid fa-eye-slash"></i>
                    </div>
                </div>
                <input class="submit" type="submit" name="submit" value="Edit">
            </form>
        </div>
    </div>
</body>

</html>