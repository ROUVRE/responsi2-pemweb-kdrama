<?php
include("inc/link.php");
include("koneksi.php");
include("session.php");

$registrationStatus = null;

if (isset($_POST['submit'])) {
    $nama = $_POST['Name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = 'user';

    $query = "INSERT INTO user (nama, username, password, role) VALUES ('$nama', '$username', '$password', '$role')";

    // modal
    if (mysqli_query($conn, $query)) {
        $registrationStatus = 'success';
    } else {
        $registrationStatus = 'fail';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500&family=Roboto:wght@300;400;500&family=Signika:wght@300;400;500&display=swap"
        rel="stylesheet">
    <title>Register</title>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-image: url(assets/images/logReg.jpeg);
            background-size: cover;
        }

        * {
            font-family: Inter;
        }
    </style>
</head>

<body>
    <div class="logBox">
        <div class="logTop">
            <div>
                <i class="fa-solid fa-user"></i>
            </div>
            <h2>Registrasi</h2>
        </div>
        <div class="logBot">
            <form action="" method="post" onsubmit="return validateForm()">
                <div>
                    <label for="name">Nama :</label>
                    <div class="inputBox">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" name="Name" maxlength="40" oninput="validateInput(this)">
                    </div>
                    <label for="username">Username :</label>
                    <div class="inputBox">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" name="username" maxlength="25" oninput="validateInput(this)">
                    </div>
                    <label for="password">Password :</label>
                    <div class="inputBox">
                        <i class="fa-solid fa-key"></i>
                        <input type="password" name="password" id="password" maxlength="20"
                            oninput="validateInput(this)">
                        <i class="fa-solid fa-eye-slash"></i>
                    </div>
                    <label for="confPassword">Confirm Password :</label>
                    <div class="inputBox">
                        <i class="fa-solid fa-key"></i>
                        <input type="password" name="confPassword" id="confPassword" maxlength="20"
                            oninput="validateInput(this)">
                        <i class="fa-solid fa-eye-slash"></i>
                    </div>
                </div>
                <input class="submit" type="submit" name="submit" value="Daftar">
            </form>
            <p>Sudah punya akun?<a href="login.php">Login di sini!</a></p>
        </div>
    </div>
    <div class="regInfo" id="regSucced"
        style="<?php echo ($registrationStatus === 'success') ? 'display: flex;' : 'display: none;'; ?>">
        <h2>Registrasi Berhasil !!</h2>
        <button onclick="redirectToLogin('regSucced')">OK</button>
    </div>
    <div class="regInfo" id="regFail"
        style="<?php echo ($registrationStatus === 'fail') ? 'display: flex;' : 'display: none;'; ?>">
        <i class="fa-solid fa-triangle-exclamation"></i>
        <h2>Registrasi Gagal !!</h2>
        <button onclick="closeModal('regFail')">OK</button>
    </div>

    <script>
        function validateInput(input) {
            input.value = input.value.replace(/'/g, '');
        }

        function validateForm() {
            var password = document.getElementById('password').value;
            var confPassword = document.getElementById('confPassword').value;

            if (password !== confPassword) {
                alert('Password dan Confirm Password harus sama');
                return false;
            }

            return true;
        }

        function closeModal(modalId) {
            document.getElementById(modalId).style.display = 'none';
        }

        function redirectToLogin(modalId) {
            document.getElementById(modalId).style.display = 'none';
            window.location.href = 'login.php';
        }
    </script>
</body>

</html>