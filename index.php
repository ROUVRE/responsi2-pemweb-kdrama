<?php
include("inc/navbar.php");
include("inc/link.php");
include("inc/footer.php");
include("koneksi.php");
include("session.php");
check_session();

$query_film = "SELECT * FROM film";
$result_film = mysqli_query($conn, $query_film);

if (!$result_film) {
    die("Query error: " . mysqli_error($conn));
}
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
        <img src="assets/images/index.jpeg" alt="">
        <h2 style="font-family: MonteCarlo;">K - Drama</h2>
        <div>
            <p>Dive into the magic of K-drama: profound stories, mesmerizing acting, and captivating visuals, just one
                click away!</p>
        </div>
    </div>
    <div class="movieBg">
        <h1 class="movieBoxTitle" style="font-family: Kaushan Script;">Film</h1>
        <div class="movieBox">
            <div class="genreBox">
                <?php while ($movie = mysqli_fetch_assoc($result_film)): ?>
                    <div>
                        <img src="<?php echo "assets/images/" . $movie['poster']; ?>" alt="<?php echo $movie['judul']; ?>">
                        <h2 style="font-family: 'Playball', cursive;"><?php echo $movie['judul']; ?></h2>
                        <a class="button" href="movie.php?film_id=<?php echo $movie['film_id']; ?>">Learn More</a>
                        <a class="button" href="mylist.php?action=add&film_id=<?php echo $movie['film_id']; ?>">Add to List</a>
                    </div>
                <?php endwhile; ?>
            </div>
            <i class="fa-solid fa-chevron-right" onclick="scrollGenreBox(1)"></i>
            <i class="fa-solid fa-chevron-left" onclick="scrollLeftGenreBox()"></i>
        </div>
    </div>

    <script>
        function scrollGenreBox(direction) {
            const genreBox = document.querySelector('.genreBox');
            const scrollAmount = 300;
            genreBox.scrollLeft += direction * scrollAmount;
        }

        function scrollLeftGenreBox() {
        scrollGenreBox(-1);
    }
    </script>

</body>

</html>