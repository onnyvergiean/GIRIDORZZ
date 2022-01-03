<?php
require('database/connection.php');

$idHotel = $_GET['id'];
$idKamar = $_GET['kamar'];
$result = mysqli_query($conn, "SELECT hotel.namaHotel,hotel.ratingHotel,kamar.* FROM hotel INNER JOIN kamar ON hotel.idHotel = $idHotel where kamar.hotelId = $idHotel")
    or die(mysqli_error($conn));
while ($data = mysqli_fetch_array($result)) {
    $rows[] = $data;
}

$resultFasilitas = mysqli_query($conn, "SELECT fasilitas.*,imgurl.* from fasilitas INNER JOIN imgurl on fasilitas.idImageUrl = imgurl.imageId WHERE fasilitas.kamarId = $idKamar")
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
            <a href=" details-hotel.php" class="brand-text-wrapper">
                <span class="brand-text-icon">GIRIDORZZ</span>
            </a>
            <nav class="navbar-nav navbar-center">
                <a class="nav-link" href="home.html">
                    Home
                </a>
                <a class="nav-link" href="#">
                    Booking
                </a>
                <a class="nav-link active" href="detail-hotel.html">
                    Hotels
                </a>
            </nav>
            <nav class="navbar navbar-nav " style="position: absolute; top: 0; right: 0;">
                <a class="nav-link" href="login.html">
                    Login
                </a>
                <form action="register.html">
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
                            <li class="breadcrumb-item"><a href="daftar-hotel.html">Hotels</a></li>
                            <li class="breadcrumb-item"><a href="detail-hotel.php">Hotel Details</a></li>
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

                        <img class="img-cover" src="admin/hotel/kamar/imageskamar/<?= $resultImage[4]['imageUrl'] ?>" alt="imgFeatured">

                    </div>
                    <div class="col-5 booking-wrapper card">
                        </br>
                        <h3 class="booking-title">Start Booking</h3>
                        <p class=" booking-price" style="color: #1ABC9C;">Rp <?= $row['hargaKamar'] ?> <span style="color: #B0B0B0; ">/
                                Malam</span></p>
                        <p class="booking-promo">Anda bisa membayar Rp 180.000 / 2 malam</p>
                        <form action="page/booking/index.php">
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
                            <div class="col-4 img-icon"><img src="admin/hotel/fasilitasKamar/images/<?= $resultfasilitas['imageUrl'] ?>" alt="Image Fasilitas">
                                <p style="margin-top: 10px;"><?= $resultfasilitas['jumlahFasilitas'] ?> <span style="color: #B0B0B0;"><?= $resultfasilitas['namaFasilitas'] ?></span></p>
                            </div>
                    <?php endforeach;
                    } ?>
                </div>
            </div>
                </div>
            </main>
            <main class="container">
                <h4 class="about-title" style="margin-top: 42px;">Room Picture</h4>
                <div class="row">
                    <div class="col-6"><img class="img-room" src="admin/hotel/kamar/imageskamar/<?= $resultImage[0]['imageUrl'] ?>" alt="LivingRoom">
                        <p class="text-room text-center">Bathroom</p>
                    </div>
                    <div class="col-6 "><img class="img-room" src="admin/hotel/kamar/imageskamar/<?= $resultImage[1]['imageUrl'] ?>" alt="">
                        <p class="text-room text-center">Bedroom</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6"><img class=" img-room" src="admin/hotel/kamar/imageskamar/<?= $resultImage[2]['imageUrl'] ?>" alt="LivingRoom">
                        <p class="text-room text-center">Living Room</p>
                    </div>
                    <div class="col-6"><img class="img-room" src="admin/hotel/kamar/imageskamar/<?= $resultImage[3]['imageUrl'] ?>" alt="">
                        <p class="text-room text-center">Swimming Pool</p>
                    </div>
                </div>
            </main>

            <footer class="container">
                <div class="row" style="margin-top: 69px;">
                    <div class="col-3"> <span class="brand-text-icon">GIRIDORZZ</span>
                        <p class="p-footer">We provide what you need to enjoy your
                            holiday with family.</p>
                    </div>
                    <div class="col-4">
                        <span class="footer-title">About <p class="p-footer">GIRIDORZZ akan membantu menghubungkan jutaan
                                travellers dengan
                                berbagai tempat menginap yang luar biasa dan terjamin </p></span>
                    </div>
                    <div class="col-3">
                        <span class="footer-title">Contact Info <div style="margin-top: 12px;"><img class="footer-icon" src=" ./Assets/Images/Icon/ic_round-where-to-vote.png" alt="location">
                                <span class="p-footer" style="margin-top: 12px;">
                                    GIRIDORZZ, Yogyakarta
                                </span>
                            </div>
                            <div style="margin-top: 12px;"><img class="footer-icon" src="./Assets/Images/Icon/ic_baseline-local-phone.png" alt="phone">
                                <span class="p-footer">
                                    +6221 4012 0888</span>
                            </div>
                            <div style="margin-top: 12px;"><img class="footer-icon" src="./Assets/Images/Icon/ic_round-email.png" alt="phone">
                                <span class="p-footer">
                                    cs@giridorzz.com</span>
                            </div>
                        </span>
                    </div>
                    <div class="col-2">
                        <span class="footer-title">Follow Us
                            <div style="margin-top: 12px;">
                                <img class="footer-icon" src="./Assets/Images/Icon/uim_instagram-alt.png" alt="ig">
                                <img class="footer-icon" style="margin-left: 12px;" src="./Assets/Images/Icon/fa-brands_twitter-square.png" alt="ig">
                                <img class="footer-icon" style="margin-left: 12px;" src="./Assets/Images/Icon/brandico_facebook-rect.png" alt="ig">
                            </div>
                        </span>
                    </div>
                </div>
                <p class="footer-last-text text-center">Copyright 2021 • All rights reserved • GIRIDORZZ</p>
            </footer>
            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src=" https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
            </script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
            </script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
            </script>
</body>

</html>