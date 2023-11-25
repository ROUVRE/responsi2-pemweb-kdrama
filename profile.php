<?php
include("inc/navbar.php");
include("inc/link.php");
include("koneksi.php");
include("session.php");
check_session();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["Name"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    if (!empty($nama) && !empty($username) && !empty($password)) {
        $pengguna = $_SESSION["username"];

        $query = "UPDATE user SET nama='$nama', username='$username', password='$password' WHERE username='$pengguna'";

        if (mysqli_query($conn, $query)) {
            set_login_session($_SESSION['user_id'], $nama, $username, $_SESSION['role']);

            echo "Data berhasil diperbarui!";
        } else {
            echo "Gagal memperbarui data: " . mysqli_error($conn);
        }
    } else {
        echo "Tolong isi semua field!";
    }
}

$pengguna = $_SESSION["username"];
$query = "SELECT nama FROM user WHERE username='$pengguna'";
$result = mysqli_query($conn, $query);

if ($result) {
    $user_data = mysqli_fetch_assoc($result);
    $default_nama = $user_data['nama'];
} else {
    $default_nama = "";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background: linear-gradient(180deg, rgba(57, 35, 44, 0.42) 44.79%, rgba(26, 25, 26, 0.252) 89.06%, rgba(26, 25, 25, 0) 100%);
        }
    </style>
</head>

<body>
    <div class="profileHead">
        <h1>My Profile</h1>
        <a href="logout.php">
            <i class="fa-solid fa-arrow-right-from-bracket"></i>  <!--Tombol logout kadang masih nggak muncul-->
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
                        <input type="text" name="Name" value="<?php echo $default_nama; ?>">
                    </div>
                    <label for="username">Username :</label>
                    <div class="inputBox">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" name="username" value="<?php echo $_SESSION['username']; ?>">
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