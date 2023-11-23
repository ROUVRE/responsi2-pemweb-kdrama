<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/global.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500&family=Karma:wght@300;400;500&family=Kaushan+Script&family=MonteCarlo&family=Playball&display=swap"
        rel="stylesheet">
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
    </header>
    <h1 class="crudTitle" style="font-family: 'Kaushan Script', cursive;">Tambah Film</h1>
    <form action="">
        <div class="crudContainer">
            <label for="judul">Judul Film</label>
            <input type="text" name="judul" id="">
            <div class="imgContainer">
                <div>
                    <label for="">Banner Film</label>
                    <label for="banner" class="file"
                        onclick="chooseFile('banner', 'bannerPreview', 'bannerFileContainer')">
                        <i class="fas fa-image"></i>
                        <p>Add Banner Film</p>
                        <img id="bannerPreview" src="" alt="">
                    </label>
                    <input type="file" name="banner" id="banner" style="display: none;"
                        onchange="previewFile('banner', 'bannerPreview', 'bannerFileContainer')">
                </div>
                <div>
                    <label for="">Poster Film</label>
                    <label for="poster" class="file"
                        onclick="chooseFile('poster', 'posterPreview', 'posterFileContainer')">
                        <i class="fas fa-image"></i>
                        <p>Add Poster Film</p>
                        <img id="posterPreview" src="" alt="">
                    </label>
                    <input type="file" name="poster" id="poster" style="display: none;"
                        onchange="previewFile('poster', 'posterPreview', 'posterFileContainer')">
                </div>
            </div>
            <label for="director">Director</label>
            <input type="text" name="director" id="">
            <label for="cast">Cast Utama</label>
            <input type="text" name="cast" id="">
            <div class="dateContainer">
                <div>
                    <label for="date">Date Release</label>
                    <input type="date" name="date" id="">
                </div>
                <div>
                    <label for="usia">Batas Usia</label>
                    <input type="text" name="usia" id="">
                </div>
            </div>
            <label for="genre">Genre</label>
            <input type="text" name="genre" id="">
            <label for="link">Link Film</label>
            <input type="text" name="link" id="">
            <label for="sinopsis">Sinopsis</label>
            <textarea name="sinopsis" id="" cols="30" rows="10"></textarea>
            <div class="buttonContainer">
                <input type="submit" name="cancel" id="cancel" value="cancel">
                <input type="submit" name="submit" id="submit" >
            </div>
        </div>
    </form>

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
    </script>
</body>

</html>