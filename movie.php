<?php
include("inc/navbar.php");
include("inc/link.php");
include("inc/footer.php");
include("koneksi.php");
include("session.php");
check_session();

if (isset($_GET['film_id']) && !empty($_GET['film_id'])) {
    $film_id = $_GET['film_id'];

    $query = "SELECT * FROM film WHERE film_id = $film_id";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query error: " . mysqli_error($conn));
    }

    $film = mysqli_fetch_assoc($result);

    $queryComment = "SELECT user.username, comment.rating, comment.komentar FROM comment JOIN user ON comment.user_id = user.user_id WHERE comment.film_id = $film_id";
    $resultComment = mysqli_query($conn, $queryComment);

    if (!$resultComment) {
        die("Comment query error: " . mysqli_error($conn));
    }
} else {
    die("Film ID tidak ada");
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $user_id = $_SESSION['user_id'];
    $comment_text = $_POST['komentar'];
    $rating = isset($_POST['rating']) ? $_POST['rating'] : null;

    if (!empty($comment_text) && !empty($rating) && $rating >= 1 && $rating <= 5) {
        $insertCommentQuery = "INSERT INTO comment (user_id, film_id, komentar, rating) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $insertCommentQuery);

        mysqli_stmt_bind_param($stmt, 'iisi', $user_id, $film_id, $comment_text, $rating);

        $insertCommentResult = mysqli_stmt_execute($stmt);

        if (!$insertCommentResult) {
            die("Error adding comment: " . mysqli_error($conn));
        }

        mysqli_stmt_close($stmt);

        header("Location: movie.php?film_id=$film_id");
        exit();

    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=MonteCarlo&family=Playball&display=swap" rel="stylesheet">
    <style>
        .comment .star input[type="radio"] {
            display: none;
        }

        .comment .star label {
            display: flex;
        }

        .comment .star label i {
            font-size: 24px;
            cursor: pointer;
            margin-right: 5px;
        }

        .comment .star label i.fa-solid {
            color: #ffd700 !important;
        }
    </style>
    <title>Movie</title>
</head>

<body>
<div class="movieBanner">
        <img src="<?php echo "assets/images/" . $film['banner']; ?>" alt="">
        <div class="bannerText">
            <h1 style="font-family: 'Playball', cursive;"><?php echo $film['judul']; ?></h1>
            <h3><?php echo $film['release_date']; ?> | <?php echo $film['usia']; ?> | <?php echo $film['genre']; ?></h3>
        </div>
    </div>
    <div class="movie margin">
    <div class="movieLeft">
        <div class="tittleBox">
            <p><?php echo $film['judul']; ?></p>
            <p><?php echo $film['release_date']; ?> | <?php echo $film['usia']; ?> | <?php echo $film['genre']; ?></p>
        </div>
        <p class="sinopsis"><?php echo $film['sinopsis']; ?></p>
        <div class="castBox">
            <p>Dibintangi Oleh : <?php echo $film['cast']; ?></p>
            <p>Kreator : <?php echo $film['director']; ?></p>
        </div>
        <div class="linkBox">
            <p>Link Film</p>
            <a href="<?php echo $film['link']; ?>">Link</a>
        </div>
        <div class="commentBox">
        <?php while ($comment = mysqli_fetch_assoc($resultComment)): ?>
            <div class="komentar">
                <div class="profile">
                    <i class="fa-solid fa-user"></i>
                </div>
                <div class="comment">
                    <p><?php echo $comment['username']; ?></p>
                    <div class="star">
                        <?php
                        for ($i = 0; $i < $comment['rating']; $i++) {
                            echo '<i class="fa-regular fa-star fa-solid"></i>';
                        }
                        ?>
                    </div>
                    <p><?php echo $comment['komentar']; ?></p>
                </div>
            </div>
        <?php endwhile; ?>

            <form method="post" action="">
                <div class="comment">
                    <div class="star">
                        <label>
                            <input type="radio" name="rating" id="star1" value="1" required>
                            <i class="fa-regular fa-star" onclick="toggleStar(this, 1)"></i>
                            <input type="radio" name="rating" id="star2" value="2" required>
                            <i class="fa-regular fa-star" onclick="toggleStar(this, 2)"></i>
                            <input type="radio" name="rating" id="star3" value="3" required>
                            <i class="fa-regular fa-star" onclick="toggleStar(this, 3)"></i>
                            <input type="radio" name="rating" id="star4" value="4" required>
                            <i class="fa-regular fa-star" onclick="toggleStar(this, 4)"></i>
                            <input type="radio" name="rating" id="star5" value="5" required>
                            <i class="fa-regular fa-star" onclick="toggleStar(this, 5)"></i>
                        </label>
                    </div>
                    <input type="hidden" id="ratingInput" name="rating" value="">
                    <textarea name="komentar" cols="30" rows="10"></textarea>
                    <input type="submit" name="submit" value="Send">
                </div>
            </form>
        </div>
        </div>
        <div class="movieRight">
            <img src="<?php echo "assets/images/" . $film['poster']; ?>" alt="">
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