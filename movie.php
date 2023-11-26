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
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=MonteCarlo&family=Playball&display=swap" rel="stylesheet">
    <title>Movie</title>
</head>

<body>
    <div class="movieBanner">
        <img src="assets/images/shinRyujin.jpeg" alt="">
        <div class="bannerText">
            <h1 style="font-family: 'Playball', cursive;">Judul Film</h1>
            <h3>Tahun | Rating Usia | Genre</h3>
        </div>
    </div>
    <div class="movie margin">
        <div class="movieLeft">
        <div class="tittleBox">
            <p>Title</p>
            <p>tahun rilis | Rating usia | Jumlah Season | Genre</p>
        </div>
        <p class="sinopsis">Sinopsis</p>
        <div class="castBox">
            <p>Dibintangi Oleh :</p>
            <p>Kreator :</p>
        </div>
        <div class="linkBox">
            <p>Link Film</p>
            <a href="">Link</a>
        </div>
        <div class="commentBox">
            <div class="komentar">
                <div class="profile">
                    <i class="fa-solid fa-user"></i>
                </div>
                <div class="comment">
                    <p>username</p>
                    <div class="star">
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </div>
                    <p>komentar</p>
                </div>
            </div>
            <form action="">
                <div class="comment">
                    <div class="star">
                        <i class="fa-regular fa-star" onclick="toggleStar(this, 1)"></i>
                        <i class="fa-regular fa-star" onclick="toggleStar(this, 2)"></i>
                        <i class="fa-regular fa-star" onclick="toggleStar(this, 3)"></i>
                        <i class="fa-regular fa-star" onclick="toggleStar(this, 4)"></i>
                        <i class="fa-regular fa-star" onclick="toggleStar(this, 5)"></i>
                    </div>
                    <input type="hidden" name="rating" id="ratingInput" value="0">
                    <textarea name="komentar" id="" cols="30" rows="10"></textarea>
                    <input type="submit" name="submit" id="" value="Send">
                </div>
            </form>
        </div>
        </div>
        <div class="movieRight">
            <img src="assets/images/poster.jpeg" alt="">
        </div>
    </div>

    <script>

        function toggleStar(starElement, starIndex) {
            const stars = starElement.parentElement.querySelectorAll('.fa-star');
            const ratingInput = document.getElementById('ratingInput');

            stars.forEach((star, index) => {
                star.classList.remove('fa-solid');
            });

            for (let i = 0; i < starIndex; i++) {
                stars[i].classList.add('fa-solid');
            }

            ratingInput.value = starIndex;
        }
    </script>
</body>

</html>