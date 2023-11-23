<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/global.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500&family=Kaushan+Script&family=MonteCarlo&family=Playball&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
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
    <div class="filmContainer">
        <div class="pageTitle">
            <h1 style="font-family: 'Kaushan Script', cursive;">Data Film</h1>
        </div>
        <div class="dataContainer">
            <a class="addFilm" href="addFilm.php">Tambah Film</a>
            <div class="tableContainer">
                <table>
                    <tr>
                        <th>No</th>
                        <th>Judul Film</th>
                        <th>Banner Film</th>
                        <th>Poster Film</th>
                        <th>Director</th>
                        <th>Cast Utana</th>
                        <th>Date Release</th>
                        <th>Batas Usia</th>
                        <th>Genre</th>
                        <th>Link URL Film</th>
                        <th>Sinopsis Film</th>
                        <th>Aksi</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                        <td>5</td>
                        <td>6</td>
                        <td>7</td>
                        <td>8</td>
                        <td>9</td>
                        <td>10</td>
                        <td>11</td>
                        <td>
                            <a href="#"><i class="fa-solid fa-pen-to-square"></i></a>
                            |
                            <a href="#"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="regInfo" id="deleteSucced">
        <h2>Hapus Film Berhasil !!</h2>
        <button>OK</button>
    </div>
    <div class="regInfo" id="deleteFail">
        <i class="fa-solid fa-triangle-exclamation"></i>
        <h2>Hapus Film Gagal !!</h2>
        <button>OK</button>
    </div>
    <div class="modalConfirm" id="modalConfirm">
        <h2>Yakin Ingin Menghapus Film?</h2>
        <div>
            <button id="modalCancel">Cancel</button>
            <button id="modalOk">OK</button>
        </div>
    </div>
    <footer>
        <h2>© Copyright 2023 K-Drama</h2>
    </footer>
</body>

</html>