<?php
require('database/connection.php');
$idHotel = $_GET['id'];
$idKamar = $_GET['kamar'];
$result = mysqli_query($conn, "SELECT hotel.namaHotel,hotel.ratingHotel,kamar.* FROM hotel INNER JOIN kamar ON hotel.idHotel = $idHotel where kamar.hotelId = $idHotel")
    or die(mysqli_error($conn));
while ($data = mysqli_fetch_array($result)) {
    $rows[] = $data;
}

$resultFasilitas = mysqli_query($conn, "SELECT * from fasilitas WHERE kamarId = $idKamar")
    or die(mysqli_error($conn));

while ($data = mysqli_fetch_array($resultFasilitas)) {
    $fasilitas[] = $data;
}

$image = mysqli_query($conn, "SELECT * from imgurl WHERE kamarId = $idKamar")
    or die(mysqli_error($conn));

while ($data = mysqli_fetch_array($image)) {
    $resultImage[] = $data;
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="./Assets/Images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="./Assets/css/details.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>GIRIDORZZ</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light container">
            <a href="index.php" class="brand-text-wrapper">
                <span class="brand-text-icon">GIRIDORZZ</span>
            </a>
            <nav class="navbar-nav navbar-center">
                <a class="nav-link" href="index.php">
                    Home
                </a>
                <a class="nav-link" href="history.php">
                    Booking
                </a>
                <a class="nav-link active" href="detail-hotel.php">
                    Hotels
                </a>
            </nav>
            <nav class="navbar navbar-nav " style="position: absolute; top: 0; right: 0;">
                <a class="nav-link" href="login.php">
                    Login
                </a>
                <form action="register.php">
                    <button class="btn btn-warning nav-link" type="submit">
                        Sign Up
                    </button>
                </form>
            </nav>

        </nav>
    </header>
    <?php if (!empty($rows)) {
        foreach ($rows as $row) : ?>
            <section class="container">
                <div class="row">
                    <div class="col-4">
                        <ol class="breadcrumb ml-auto">
                            <li class="breadcrumb-item"><a href="daftar-hotel.php">Hotels</a></li>
                            <li class="breadcrumb-item"><a href="detail-hotel.php?id=<?= $idHotel ?>">Hotel Details</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Kamar</li>
                        </ol>
                    </div>
                    <div class="col-4 text-center justify-content-center">
                        <h1 class="h2"><?= $row['tipeKamar'] ?></h1>
                        <span style="color: #605858;">
                            <?= $row['namaHotel'] ?> <span style="color: #f0b828"> <?= $row['ratingHotel'] ?></span>
                        </span>
                    </div>
                </div>
            </section>
            <section class="container">
                <div class="row">
                    <div class="col-6 img-wrapper">
                        <img class="img-cover" src="Assets/Images/kamar/<?= $resultImage[0]['imageUrl'] ?>" alt="imgFeatured">
                    </div>
                    <div class="col-5 booking-wrapper card">
                        </br>
                        <h3 class="booking-title">Start Booking</h3>
                        <p class=" booking-price" style="color: #1ABC9C;">Rp <?= $row['hargaKamar'] ?> <span style="color: #B0B0B0; ">/
                                Malam</span></p>
                        <form method="POST" action="page/booking/index.php?id=<?= $idHotel ?>&kamar=<?= $idKamar ?>">
                            <button class="booking-button btn btn-warning">Booking</button>
                        </form>
                    </div>
                </div>
            </section>
            <main class="container about-wrapper">
                <div class="row">
                    <div class="col-6">
                        <h4 class="about-title">About the Room</h4>
                        <span class="about-text">
                            <p><?= $row['deskripsiKamar'] ?></p>
                            <hr style="border: none;">
                        </span>
                    </div>
            <?php endforeach;
    } ?>

            <div class="col-6">
                <h4 class="about-title">Fasilitas</h4>
                <div class="row">
                    <?php if (!empty($fasilitas)) {
                        foreach ($fasilitas as $resultfasilitas) : ?>
                            <div class="col-4 img-icon"><img src="Assets/Images/fasilitasKamar/<?= $resultfasilitas['imageUrl'] ?>" alt="Image Fasilitas">
                                <p style="margin-top: 10px;"><?= $resultfasilitas['jumlahFasilitas'] ?> <span style="color: #B0B0B0;"><?= $resultfasilitas['namaFasilitas'] ?></span></p>
                            </div>
                    <?php endforeach;
                    } ?>
                </div>
            </div>
            </main>
            <main class="container">
                <h4 class="about-title" style="margin-top: 42px;">Room Pictures</h4>
                <div class="row">
                    <?php foreach ($resultImage as $image) :  ?>
                        <div class="col-4 img-room">
                            <img height="200" width="300" style="border-radius: 25px;" src="Assets/Images/kamar/<?= $image['imageUrl'] ?>" alt="Room Pictures">
                        </div>
                    <?php endforeach; ?>
                </div>
            </main>

            <?php require("footer.php") ?>