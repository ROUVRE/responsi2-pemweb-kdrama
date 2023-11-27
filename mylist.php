<?php
include("inc/navbar.php");
include("inc/link.php");
include("inc/footer.php");
include("koneksi.php");
include("session.php");
check_session();

if (isset($_GET['action']) && isset($_GET['film_id']) && $_GET['action'] == 'add') {
    $user_id = $_SESSION['user_id'];
    $film_id = $_GET['film_id'];

    $check_query = "SELECT * FROM myList WHERE user_id = $user_id AND film_id = $film_id";
    $check_result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_result) == 0) {
        $insert_query = "INSERT INTO myList (user_id, film_id) VALUES ($user_id, $film_id)";
        $insert_result = mysqli_query($conn, $insert_query);
    }
}

if (isset($_GET['action']) && isset($_GET['film_id']) && $_GET['action'] == 'delete') {
    $user_id = $_SESSION['user_id'];
    $film_id = $_GET['film_id'];

    $delete_query = "DELETE FROM myList WHERE user_id = $user_id AND film_id = $film_id";
    $delete_result = mysqli_query($conn, $delete_query);
}
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
                <?php
                $user_id = $_SESSION['user_id'];
                $mylist_query = "SELECT film.* FROM myList JOIN film ON myList.film_id = film.film_id WHERE myList.user_id = $user_id";
                $mylist_result = mysqli_query($conn, $mylist_query);
                ?>

                <?php while ($list_item = mysqli_fetch_assoc($mylist_result)): ?>
                    <div>
                        <img src="<?php echo "assets/images/" . $list_item['poster']; ?>" alt="<?php echo $list_item['judul']; ?>">
                        <h2 style="font-family: 'Playball', cursive;"><?php echo $list_item['judul']; ?></h2>
                        <a class="button" href="movie.php?film_id=<?php echo $list_item['film_id']; ?>">Learn More</a>
                        <a class="button" href="mylist.php?action=delete&film_id=<?php echo $list_item['film_id']; ?>">Delete</a>
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