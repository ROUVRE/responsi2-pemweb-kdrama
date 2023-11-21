<?php
include("inc/navbar.php");
include("inc/link.php");
include("inc/footer.php")
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>

<body>
    <div class="banner">
        <img src="assets/images/shinRyujin.jpeg" alt="">
        <h2>K - Drama</h2>
        <div>
            <p>Dive into the magic of K-drama: profound stories, mesmerizing acting, and captivating visuals, just one
                click away!</p>
        </div>
    </div>
    <div class="movieBg">
        <h1 class="movieBoxTitle">Genre</h1>
        <a href="movie.php">
        <div class="movieBox">
            <h1>Nama Genre</h1>
            <div class="genreBox">
                <div>
                    <img src="assets/images/hwangYeji.jpeg" alt="">
                    <h2>Title</h2>
                    <button>Learn More</button>
                </div>
            </div>
            <i class="fa-solid fa-chevron-right"></i>
        </div>
        </a>
        <div class="movieBox">
            <h1>Nama Genre</h1>
            <div class="genreBox">
                <div>
                    <img src="assets/images/hwangYeji.jpeg" alt="">
                    <h2>Title</h2>
                    <button>Learn More</button>
                </div>
            </div>
            <i class="fa-solid fa-chevron-right"></i>
        </div>
    </div>

</body>

</html>