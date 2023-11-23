<?php
include("inc/navbar.php");
include("inc/link.php");
include("inc/footer.php");
include("koneksi.php");
include("session.php");
check_session();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=MonteCarlo&family=Playball&display=swap"
        rel="stylesheet">
    <title>Index</title>
</head>

<body>
    <div class="banner">
        <img src="assets/images/shinRyujin.jpeg" alt="">
        <h2 style="font-family: MonteCarlo;">K - Drama</h2>
        <div>
            <p>Dive into the magic of K-drama: profound stories, mesmerizing acting, and captivating visuals, just one
                click away!</p>
        </div>
    </div>
    <div class="movieBg">
        <h1 class="movieBoxTitle" style="font-family: Kaushan Script;">Genre</h1>
        <div class="movieBox">
            <h1>Nama Genre</h1>
            <div class="genreBox">
                <div>
                    <img src="assets/images/hwangYeji.jpeg" alt="">
                    <h2 style="font-family: 'Playball', cursive;">Title</h2>
                    <a class="button" href="movie.php">Learn More</a>
                    <a class="button" href="">Add to List</a>
                </div>
                <!-- nambah movie disini brow -->
            </div>
            <i class="fa-solid fa-chevron-right" onclick="scrollGenreBox(1)"></i>
        </div>
    </div>

    <script>
        function scrollGenreBox(direction) {
            const genreBox = document.querySelector('.genreBox');
            const scrollAmount = 300;
            genreBox.scrollLeft += direction * scrollAmount;
        }
    </script>

</body>

</html>