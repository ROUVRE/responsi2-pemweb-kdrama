<?php
include("../koneksi.php");
include("../session.php");
check_session();

$editStatus = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $filmId = $_POST['film_id'];
    $judul = $_POST['judul'];
    $director = $_POST['director'];
    $cast = $_POST['cast'];
    $releaseDate = $_POST['release_date'];
    $usia = $_POST['usia'];
    $genre = $_POST['genre'];
    $link = $_POST['link'];
    $sinopsis = $_POST['sinopsis'];

    if ($_FILES['banner']['size'] > 0) {
        $banner = basename($_FILES['banner']['name']);
        move_uploaded_file($_FILES['banner']['tmp_name'], $banner);
    } else {
        $banner = $_POST['current_banner'];
    }

    if ($_FILES['poster']['size'] > 0) {
        $poster = basename($_FILES['poster']['name']);
        move_uploaded_file($_FILES['poster']['tmp_name'], $poster);
    } else {
        $poster = $_POST['current_poster'];
    }

    $updateQuery = "UPDATE film SET 
                    judul = '$judul',
                    director = '$director',
                    cast = '$cast',
                    release_date = '$releaseDate',
                    usia = '$usia',
                    genre = '$genre',
                    link = '$link',
                    sinopsis = '$sinopsis',
                    banner = '$banner',
                    poster = '$poster'
                    WHERE film_id = $filmId";

    $updateResult = mysqli_query($conn, $updateQuery);

    if ($updateResult) {
        $editStatus = 'success';
    } else {
        $editStatus = 'fail';
    }
}

if (isset($_GET['id'])) {
    $filmId = $_GET['id'];
    $selectQuery = "SELECT * FROM film WHERE film_id = $filmId";
    $selectResult = mysqli_query($conn, $selectQuery);

    if ($selectResult) {
        $filmData = mysqli_fetch_assoc($selectResult);
    } else {
        echo "Gagal edit data" . mysqli_error($conn);
        exit();
    }
} else {
    header("Location: admin.php");
    exit();
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
    <form method="POST" action="" enctype="multipart/form-data">
        <input type="hidden" name="film_id" value="<?php echo $filmData['film_id']; ?>">
        <div class="crudContainer">
            <label for="judul">Judul Film</label>
            <input type="text" name="judul" id="judul" value="<?php echo $filmData['judul']; ?>" required>
            <div class="imgContainer">
                <div>
                    <label for="">Banner Film</label>
                    <label for="banner" class="file" id="bannerImg"
                        onclick="chooseFile('banner', 'bannerPreview', 'bannerFileContainer')">
                        <i class="fas fa-image"></i>
                        <p>Add Banner Film</p>
                        <img id="bannerPreview" src="<?php echo $filmData['banner']; ?>" alt="">
                    </label>
                    <input type="file" name="banner" id="banner" style="display: none;"
                        onchange="previewFile('banner', 'bannerPreview', 'bannerFileContainer')" required>
                    <input type="hidden" name="current_banner" value="<?php echo $filmData['banner']; ?>">
                </div>
                <div>
                    <label for="">Poster Film</label>
                    <label for="poster" class="file" id="posterImg"
                        onclick="chooseFile('poster', 'posterPreview', 'posterFileContainer')">
                        <i class="fas fa-image"></i>
                        <p>Add Poster Film</p>
                        <img id="posterPreview" src="<?php echo $filmData['poster']; ?>" alt="">
                    </label>
                    <input type="file" name="poster" id="poster" style="display: none;"
                        onchange="previewFile('poster', 'posterPreview', 'posterFileContainer')" required>
                    <input type="hidden" name="current_poster" value="<?php echo $filmData['poster']; ?>">
                </div>
            </div>
            <label for="director">Director</label>
            <input type="text" name="director" id="director" value="<?php echo $filmData['director']; ?>" required>
            <label for="cast">Cast Utama</label>
            <input type="text" name="cast" id="cast" value="<?php echo $filmData['cast']; ?>" required>
            <div class="dateContainer">
                <div>
                    <label for="release_date">Date Release</label>
                    <input type="date" name="release_date" id="release_date" value="<?php echo $filmData['release_date']; ?>" required>
                </div>
                <div>
                    <label for="usia">Batas Usia</label>
                    <input type="text" name="usia" id="usia" value="<?php echo $filmData['usia']; ?>" required>
                </div>
            </div>
            <label for="genre">Genre</label>
            <input type="text" name="genre" id="genre" value="<?php echo $filmData['genre']; ?>" required>
            <label for="link">Link Film</label>
            <input type="text" name="link" id="link" value="<?php echo $filmData['link']; ?>" required>
            <label for="sinopsis">Sinopsis</label>
            <textarea name="sinopsis" id="" cols="30" rows="10" required><?php echo $filmData['sinopsis']; ?></textarea>
            <div class="buttonContainer">
                <a href="admin.php">
                    <input type="button" name="cancel" id="cancel" value="cancel">
                </a>
                <input type="submit" name="submit" id="submit" >
            </div>
        </div>
    </form>
    <div class="regInfo" id="editSucced"style="<?php echo ($editStatus === 'success') ? 'display: flex;' : 'display: none;'; ?>">
        <h2>Edit Data Film Berhasil !!</h2>
        <button onclick="redirectToAdmin('editSucced')">OK</button>
    </div>
    <div class="regInfo" id="editFail" style="<?php echo ($editStatus === 'fail') ? 'display: flex;' : 'display: none;'; ?>">
        <i class="fa-solid fa-triangle-exclamation"></i>
        <h2>Edit Data Film Gagal !!</h2>
        <button onclick="closeModal('editFail')">OK</button>
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