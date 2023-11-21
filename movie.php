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
    <title>Movie</title>
</head>

<body>
    <div class="banner">
        <img src="assets/images/shinRyujin.jpeg" alt="">
    </div>
    <div class="movieBg margin">
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
                    <div class="komentarInput">
                    <textarea name="komentar" id="" cols="30" rows="10"></textarea>
                    <input type="submit" name="submit" id="" value="Submit">    
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>