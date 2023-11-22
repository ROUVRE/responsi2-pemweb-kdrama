<?php
include("inc/navbar.php");
include("inc/link.php");
include("inc/footer.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=MonteCarlo&family=Playball&display=swap" rel="stylesheet">
    <title>My List</title>
</head>

<body>
<div class="movieBg">
        <h1 class="movieBoxTitle" style="font-family: 'Kaushan Script', cursive;  margin-bottom: 50px;">My List</h1>
        <div class="movieBox" style="height: 507px;">
            <div class="genreBox">
                <div>
                    <img src="assets/images/hwangYeji.jpeg" alt="">
                    <h2 style="font-family: 'Playball', cursive;">Title</h2>
                    <a class="button" href="movie.php">Learn More</a>
                    <a class="button" href="">Delete</a>
                </div>
                <!-- nambah list disini brow -->
            </div>
            <i class="fa-solid fa-chevron-right" onclick="scrollGenreBox(1)"></i>
        </div>
    </div>
</body>

</html>