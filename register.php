<?php
include("inc/link.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
    </style>
</head>

<body>
    <div class="logBox">
        <div class="logTop">
            <div>
                <i class="fa-solid fa-user"></i>
            </div>
            <h2>Register</h2>
        </div>
        <div class="logBot">
            <form action="" method="post">
                <div>
                    <label for="username">Username :</label>
                    <div class="inputBox">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" name="username">
                    </div>
                    <label for="password">Password :</label>
                    <div class="inputBox">
                        <i class="fa-solid fa-key"></i>
                        <input type="password" name="password" id="">
                    </div>
                    <label for="confPassword">Confirm Password :</label>
                    <div class="inputBox">
                        <i class="fa-solid fa-key"></i>
                        <input type="password" name="confPassword" id="">
                    </div>
                </div>
                <input class="submit" type="submit" name="submit" value="Daftar">
            </form>
            <p>Sudah punya akun?<a href="login.php">Login di sini!</a></p>
        </div>
    </div>
</body>

</html>