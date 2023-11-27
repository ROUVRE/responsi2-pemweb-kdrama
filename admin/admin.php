<?php
include("../koneksi.php");
include("../session.php");
check_session();

$query = "SELECT * FROM film";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/global.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500&family=Karma:wght@300;400;500&family=Kaushan+Script&family=MonteCarlo&family=Playball&family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
    <style>
        body {
            margin-top: 110px;
            width: 100%;
            overflow-x: hidden;
            background: linear-gradient(to bottom, #5b353c, #000000);
        }
    </style>
</head>

<body>
    <header>
        <nav class="navLeft">
            <a href="#">
                <h1 style="font-family: MonteCarlo;">K-Drama</h1>
            </a>
        </nav>
        <nav class="navRight">
        <a href="../logout.php" style="font-family: 'Roboto', sans-serif;">Logout</a>
    </nav>
    </header>
    <div class="filmContainer">
        <div class="pageTitle">
            <h1 style="font-family: 'Kaushan Script', cursive;">Data Film</h1>
        </div>
        <div class="dataContainer">
            <a class="addFilm" href="addFilm.php">Tambah Film</a>
            <div class="tableContainer">
                <table>
                    <tr>
                        <th>No</th>
                        <th>Judul Film</th>
                        <th>Banner Film</th>
                        <th>Poster Film</th>
                        <th>Director</th>
                        <th>Cast Utama</th>
                        <th>Date Release</th>
                        <th>Batas Usia</th>
                        <th>Genre</th>
                        <th>Link URL Film</th>
                        <th>Sinopsis Film</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>{$no}</td>";
                        echo "<td>{$row['judul']}</td>";
                        echo "<td><img src='../assets/images/{$row['banner']}' alt='Banner' width='190' height='100'></td>";
                        echo "<td><img src='../assets/images/{$row['poster']}' alt='Poster' width='100' height='150'></td>";
                        echo "<td>{$row['director']}</td>";
                        echo "<td>{$row['cast']}</td>";
                        echo "<td>{$row['release_date']}</td>";
                        echo "<td>{$row['usia']}</td>";
                        echo "<td>{$row['genre']}</td>";
                        echo "<td><a href='{$row['link']}' target='_blank'>{$row['link']}</a></td>";
                        echo "<td>{$row['sinopsis']}</td>";
                        echo "<td>
                                <a href='editFilm.php?id={$row['film_id']}'><i class='fa-solid fa-pen-to-square'></i></a>
                                |
                                <a href='#' onclick='showModalConfirm(\"{$row['film_id']}\")'><i class='fa-solid fa-trash'></i></a>
                            </td>";
                        echo "</tr>";
                        $no++;
                    }

                    if (isset($_GET['delete_id'])) {
                        $deleteId = $_GET['delete_id'];
                        $deleteQuery = "DELETE FROM film WHERE film_id = $deleteId";
                        $deleteResult = mysqli_query($conn, $deleteQuery);

                        if ($deleteResult) {
                            echo "<script>document.getElementById('deleteSucced').style.display = 'flex';</script>";
                        } else {
                            echo "<script>document.getElementById('deleteFail').style.display = 'flex';</script>";
                        }

                        echo "<script>window.location.href = 'admin.php';</script>";
                        exit();
                    }
                    ?>

                    <script>
                        function showModalConfirm(filmId) {
                            var modal = document.getElementById('modalConfirm');
                            modal.style.display = 'flex';

                            var modalOk = document.getElementById('modalOk');
                            modalOk.onclick = function () {
                                window.location.href = 'admin.php?delete_id=' + filmId;
                            };

                            var modalCancel = document.getElementById('modalCancel');
                            modalCancel.onclick = function () {
                                modal.style.display = 'none';
                            };
                        }
                    </script>
                </table>
            </div>
        </div>
    </div>
    <div class="regInfo" id="deleteSucced">
        <h2>Hapus Film Berhasil !!</h2>
        <button>OK</button>
    </div>
    <div class="regInfo" id="deleteFail">
        <i class="fa-solid fa-triangle-exclamation"></i>
        <h2>Hapus Film Gagal !!</h2>
        <button>OK</button>
    </div>
    <div class="modalConfirm" id="modalConfirm">
        <h2>Yakin Ingin Menghapus Film?</h2>
        <div>
            <button id="modalCancel">Cancel</button>
            <button id="modalOk">OK</button>
        </div>
    </div>
    <footer>
        <h2>© Copyright 2023 K-Drama</h2>
    </footer>
</body>

</html>