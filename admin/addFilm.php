<?php
include("../koneksi.php");
include("../session.php");
check_session();

$addStatus = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = $_POST['judul'];
    $banner = $_POST['banner'];
    $poster = $_POST['poster'];
    $director = $_POST['director'];
    $cast = $_POST['cast'];
    $release_date = $_POST['date'];
    $usia = $_POST['usia'];
    $genre = $_POST['genre'];
    $link = $_POST['link'];
    $sinopsis = $_POST['sinopsis'];

    $query = "INSERT INTO film (judul, banner, poster, director, cast, release_date, usia, genre, link, sinopsis) 
              VALUES ('$judul', '$banner', '$poster', '$director', '$cast', '$release_date', '$usia', '$genre', '$link', '$sinopsis')";

    $result = mysqli_query($conn, $query);

    if ($result) {
        $addStatus = 'success';
    } else {
        $addStatus = 'fail';
    }
}
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
            <a href="admin.php">
                <h1 style="font-family: MonteCarlo;">K-Drama</h1>
            </a>
        </nav>
        <nav class="navRight">
        <a href="../logout.php" style="font-family: 'Roboto', sans-serif;">Logout</a>
    </nav>
    </header>
    <h1 class="crudTitle" style="font-family: 'Kaushan Script', cursive;">Tambah Film</h1>
    <form action="addFilm.php" method="POST">
        <div class="crudContainer">
            <label for="judul">Judul Film</label>
            <input type="text" name="judul" id="judul" required>
            <div class="imgContainer">
                <div>
                    <label for="">Banner Film</label>
                    <label for="banner" class="file" id="bannerImg"
                        onclick="chooseFile('banner', 'bannerPreview', 'bannerFileContainer')">
                        <i class="fas fa-image"></i>
                        <p>Add Banner Film</p>
                        <img id="bannerPreview" src="" alt="">
                    </label>
                    <input type="file" name="banner" id="banner" style="display: none;"
                        onchange="previewFile('banner', 'bannerPreview', 'bannerFileContainer')" required>
                </div>
                <div>
                    <label for="">Poster Film</label>
                    <label for="poster" class="file" id="posterImg"
                        onclick="chooseFile('poster', 'posterPreview', 'posterFileContainer')">
                        <i class="fas fa-image"></i>
                        <p>Add Poster Film</p>
                        <img id="posterPreview" src="" alt="">
                    </label>
                    <input type="file" name="poster" id="poster" style="display: none;"
                        onchange="previewFile('poster', 'posterPreview', 'posterFileContainer')" required>
                </div>
            </div>
            <label for="director">Director</label>
            <input type="text" name="director" id="director" required>
            <label for="cast">Cast Utama</label>
            <input type="text" name="cast" id="cast" required>
            <div class="dateContainer">
                <div>
                    <label for="date">Date Release</label>
                    <input type="date" name="date" id="date" required>
                </div>
                <div>
                    <label for="usia">Batas Usia</label>
                    <input type="text" name="usia" id="usia" required>
                </div>
            </div>
            <label for="genre">Genre</label>
            <input type="text" name="genre" id="genre" required>
            <label for="link">Link Film</label>
            <input type="text" name="link" id="link" required>
            <label for="sinopsis">Sinopsis</label>
            <textarea name="sinopsis" id="sinopsis" cols="30" rows="10" required></textarea>
            <div class="buttonContainer">
            <a href="admin.php">
                <input type="button" name="cancel" id="cancel" value="cancel">
            </a>
                <input type="submit" name="submit" id="submit">
            </div>
        </div>
    </form>
    <div class="regInfo" id="addSucced" style="<?php echo ($addStatus === 'success') ? 'display: flex;' : 'display: none;'; ?>">
        <h2>Tambah Data Berhasil !!</h2>
        <button onclick="redirectToAdmin('addSucced')">OK</button>
    </div>
    <div class="regInfo" id="addFail" style="<?php echo ($addStatus === 'fail') ? 'display: flex;' : 'display: none;'; ?>">
        <i class="fa-solid fa-triangle-exclamation"></i>
        <h2>Tambah Data Gagal !!</h2>
        <button onclick="closeModal('addFail')">OK</button>
    </div>

    <footer>
        <h2>© Copyright 2023 K-Drama</h2>
    </footer>

    <script>
        function previewFile(inputId, imageId) {
            var fileInput = document.getElementById(inputId);
            var imagePreview = document.getElementById(imageId);

            if (fileInput.files.length > 0) {
                var file = fileInput.files[0];
                var reader = new FileReader();

                reader.onload = function (e) {
                    imagePreview.src = e.target.result;
                };

                reader.readAsDataURL(file);
            } else {
                imagePreview.src = '';
            }
        }

        function closeModal(modalId) {
            document.getElementById(modalId).style.display = 'none';
        }

        function redirectToAdmin(modalId) {
            document.getElementById(modalId).style.display = 'none';
            window.location.href = 'admin.php';
        }
    </script>
</body>

</html>