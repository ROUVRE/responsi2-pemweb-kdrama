<?php
session_start();

function set_session_timeout($menit = 5) {
    $timeout = $menit * 60;
    if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > $timeout)) {
        $main_dir = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');

        if (strpos($main_dir, '/admin') !== false) {
            header("Location: $main_dir/../logout.php");
        } else {
            header("Location: $main_dir/logout.php");
        }
        exit();
    }
    $_SESSION['last_activity'] = time();
}

function refresh_session() {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    set_session_timeout();
}

function set_login_session($user_id, $nama, $username, $role) {
    $_SESSION['user_id'] = $user_id;
    $_SESSION['nama'] = $nama;
    $_SESSION['username'] = $username;
    $_SESSION['role'] = $role;
}

function check_session() {
    refresh_session();

    if (!isset($_SESSION['username'])) {
        redirect_to_login();
    } else {
        $role = $_SESSION['role'];
        
        if ($role === 'admin') {
            //Kalau akun admin, boleh masuk ke semua file
            return;
        } elseif ($role === 'user') {
            //Kalau akun user, bakal ngelempar mereka ke index.php (khusus user) kalau mereka nyobain buat akses file di subfolder 'admin'
            $main_dir = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');

            if (strpos($main_dir, '/admin') !== false) {
                header("Location: $main_dir/../index.php");
                exit();
            }
        }
    }
}

function redirect_to_login() {
    $main_dir = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');

    if (strpos($main_dir, '/admin') !== false) {
        header("Location: $main_dir/../login.php");
    } else {
        header("Location: $main_dir/login.php");
    }
    exit();
}

?>