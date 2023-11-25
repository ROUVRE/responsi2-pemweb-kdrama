<?php
session_start();
function set_login_session($user_id, $nama, $username, $role) {
    $_SESSION['user_id'] = $user_id;
    $_SESSION['nama'] = $nama;
    $_SESSION['username'] = $username;
    $_SESSION['role'] = $role;
}
function check_session() {
    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
        exit();
    }
}
?>