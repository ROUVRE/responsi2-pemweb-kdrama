<?php
include("inc/link.php");
include("koneksi.php");
include("session.php");

$loginStatus = null;

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $query = mysqli_query($conn, $sql);

    if (mysqli_num_rows($query) > 0) {
        $user_data = mysqli_fetch_assoc($query);
        
        $user_id = $user_data['user_id'];
        $nama = $nama['nama'];
        $username = $user_data['username'];
        $role = $user_data['role'];

        set_login_session($user_id, $nama, $username, $role);
        
        if ($role === 'admin') {
            header("Location: admin/admin.php");
        } else {
            header("Location: index.php");
        }
        exit();
    } else {
        // modal
        $loginStatus = 'fail';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500&family=Roboto:wght@300;400;500&family=Signika:wght@300;400;500&display=swap"
        rel="stylesheet">
    <title>Login</title>
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
            <h2>Login</h2>
        </div>
        <div class="logBot">
            <form action="" method="post" onsubmit="return validateForm()">
                <div>
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
                        <i id="eye-icon" class="fa-solid fa-eye-slash" onclick="togglePasswordVisibility()"></i>
                    </div>
                </div>
                <input class="submit" type="submit" name="submit" value="Log in">
            </form>
            <p>Belum punya akun?<a href="register.php">Register di sini!</a></p>
        </div>
    </div>
    <div class="regInfo" id="logFail"
        style="<?php echo ($loginStatus === 'fail') ? 'display: flex;' : 'display: none;'; ?>">
        <i class="fa-solid fa-triangle-exclamation"></i>
        <h2>Login Gagal !!</h2>
        <button onclick="closeModal('logFail')">OK</button>
    </div>

    <script>
        function validateInput(input) {
            input.value = input.value.replace(/'/g, '');
        }

        function validateForm() {
            var username = document.getElementsByName('username')[0].value;
            var password = document.getElementById('password').value;

            if (username.includes("'") || password.includes("'")) {
                alert('Tanda petik tidak diizinkan pada username atau password');
                return false;
            }

            return true;
        }

        function closeModal(modalId) {
            document.getElementById(modalId).style.display = 'none';
        }

        function togglePasswordVisibility() {
        var passwordInput = document.getElementById('password');
        var eyeIcon = document.getElementById('eye-icon');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIcon.classList.remove('fa-eye-slash');
            eyeIcon.classList.add('fa-eye');
        } else {
            passwordInput.type = 'password';
            eyeIcon.classList.remove('fa-eye');
            eyeIcon.classList.add('fa-eye-slash');
        }
    }
    </script>
</body>

</html>