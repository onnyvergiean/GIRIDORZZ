<?php

require_once('database/connection.php');

session_start();

$nama = '';
$email = '';
if (isset($_SESSION['logged_in'])) {
  $nama = $_SESSION['nama'];
  $email = $_SESSION['email'];
}

$hotel = mysqli_query($conn, "SELECT GROUP_CONCAT(imgurl.imageUrl) as img, hotel.*, (SELECT MIN(kamar.hargaKamar) FROM kamar WHERE kamar.hotelId=hotel.idHotel) as harga FROM imgUrl JOIN hotel ON imgUrl.hotelId=hotel.idHotel GROUP BY hotel.idHotel ORDER BY hotel.ratingHotel DESC LIMIT 3");

while ($data = mysqli_fetch_array($hotel)) {
  $dataHotel[] = $data;
}
$result = mysqli_query($conn, "SELECT diskon.*,kamar.* FROM diskon JOIN kamar on diskon.idKamar = kamar.idKamar ") or die(mysqli_error($conn));
while ($data = mysqli_fetch_array($result)) {
  $rows[] = $data;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="./Assets/Images/logo.png" type="image/x-icon">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="./Assets/css/details.css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <title>Home</title>
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-light container">
      <a href="index.php" class="brand-text-wrapper">
        <span class="brand-text-icon">GIRIDORZZ</span>
      </a>
      <nav class="navbar-nav navbar-center">
        <a class="nav-link active" href="index.php"> Home </a>
        <a class="nav-link" href="history.php"> Booking </a>
        <a class="nav-link " href="daftar-hotel.php"> Hotels </a>
      </nav>
      <nav class="navbar navbar-nav" style="position: absolute; top: 0; right: 0">
        <?php if (!isset($_SESSION['logged_in'])) : ?>
          <a class="nav-link" href="login.php"> Login </a>
          <form action="register.php">
            <button class="btn btn-warning nav-link">Sign Up</button>
          </form>
        <?php else : ?>
          <a class="nav-link"> <?= $nama ?> </a>
          <form action="logout.php">
            <button class="btn btn-warning nav-link">Logout</button>
          </form>
        <?php endif; ?>
      </nav>
    </nav>
  </header>

  <section class="container">
    <div class="card mb-3 border-0 text-center">
      <img src="Assets/Images/image 1.png" class="card-img-top" alt="image" />
      <div class="card-body">
        <h1 class="card-title fw-bold text-center">Booking hotel, ga pake ribet!</h1>
        <a href="daftar-hotel.php" class="btn btn-warning btn-lg my-4">Get Started</a>
      </div>
    </div>
  </section>

  <main class="container" style="margin-top: 100px;">
    <div class="card" style="background-color: #f5f5f5; height: 500px; border-radius: 30px; border: 0cm;">
      <h1 class="about-title" style="margin-top: 42px; font-size: 36px; font-weight: bold; margin-left: 30px">
        Rekomendasi Hotel Untukmu</h1>
      <div class="row" style="margin-top: 40px">
        <?php if (!empty($dataHotel)) {
          foreach ($dataHotel as $dataHotels) {
            $image = explode(",", $dataHotels['img']); ?>
            <div class="col-3" style="  margin-left: 50px;">
              <div class="card-home" style="width: 320px; ">
                <div class="rating"><?= $dataHotels['ratingHotel']; ?></div>
                <div class="price"><?= number_format($dataHotels['harga']); ?>/malam</div>
                <a href="detail-hotel.php?id=<?= $dataHotels['idHotel'] ?>">
                  <img style="height: 300px" src="Assets/Images/hotel/<?= $image[0] ?>" alt="imgFeatured">
                  <div class=" layer-shadow">
                    <h5><?= $dataHotels['namaHotel'] ?></h5>
                    <h7><?= $dataHotels['kotaHotel'] ?></h7>
                  </div>
                </a>
              </div>
            </div>
        <?php };
        } ?>

      </div>
      <a href="daftar-hotel.php" class="btn btn-warning btn-lg my-5" style="  width: 210px;
        border-radius: 12px;
        margin-left: 445px">Lihat Semua Hotel</a>
    </div>
  </main>

  <main class="container">
    <h1 class="fw-bold" style="margin-top: 90px;">Diskon terbesar</h1>
    <div class="row">
      <div class="col-4">
        <div class="card-body">
          <?php
          $diskonKamar = mysqli_query($conn, "SELECT diskon.*,kamar.*  FROM diskon INNER JOIN kamar ON kamar.idKamar = diskon.idKamar ORDER BY jmlhDiskon DESC LIMIT 1");
          while ($data = mysqli_fetch_array($diskonKamar)) { ?>

            <h1 class="card-title fw-bold"><?= $data['namaDiskon'] ?></h1>
            <p class="card-text text-muted"><?= $data['deskripsiDiskon'] ?></p>
            <del>
              <h3 class="card-text text-danger my-1">Rp <?= number_format($data['hargaKamar']) ?>/malam</h3>
            </del>
            <h3 class="card-text text-primary my-2" style="text-indent: 30px;">
              <?php
              $harga = $data['hargaKamar'];

              $diskon = $data['jmlhDiskon'];

              echo "Rp ";
              echo   number_format($harga - ($harga * ($diskon / 100)));
              echo " / malam";
              ?>
            </h3>
            <?php
            $idKamar = $data['idKamar'];
            $queryhotel = mysqli_query($conn, "SELECT hotel.*, imgurl.imageUrl FROM hotel 
              INNER JOIN kamar ON kamar.hotelId = hotel.idHotel 
              INNER JOIN imgurl ON imgurl.hotelId = hotel.idHotel 
              AND kamar.idKamar = '$idKamar'
              limit 1") or die(mysqli_error($conn));

            while ($hotel = mysqli_fetch_array($queryhotel)) { ?>
              <a href="detail-kamar.php?id=<?= $hotel['idHotel'] ?>&kamar=<?= $data['idKamar'] ?>&diskon=<?= $data['idDiskon'] ?>" class="btn btn-lg btn-warning shadow-sm my-4" style="margin-left: 90px;">Check
                Now</a>
        </div>
      </div>


      <div class="col-8">
        <div class="card-news ml-4">
          <div class="diskon"><?= $data['jmlhDiskon']; ?>%</div>
          <div class="price">Rp <?= number_format($data['hargaKamar']) ?></div>
          <a href="detail-kamar.php?id=<?= $hotel['idHotel'] ?>&kamar=<?= $data['idKamar'] ?>&diskon=<?= $data['idDiskon'] ?>">
            <img src="Assets/Images/hotel/<?= $hotel['imageUrl'] ?>">
            <div class="layer-shadow">
              <h5><?= $hotel['namaHotel'] ?></h5>
              <h7><?= $hotel['kotaHotel'] ?></h7>
            </div>
          </a>
        </div>
      </div>
  <?php
            };
          }

  ?>
    </div>
  </main>

  <div class="container" style="margin-top: 100px;">

    <div class="card col-12" style="background-color: #f5f5f5; border-radius: 30px; ">
      <h1 class="about-title ml-3" style="margin-top: 42px; font-size: 36px; font-weight: bold; ">Giridorzz
        Promos</h1>


      <div class="row" style="margin-top: 40px; ">
        <?php
        $diskonKamar = mysqli_query($conn, "SELECT diskon.*,kamar.*  FROM diskon INNER JOIN kamar ON kamar.idKamar = diskon.idKamar ORDER BY jmlhDiskon DESC LIMIT 99 OFFSET 1");
        while ($dataDiskon = mysqli_fetch_array($diskonKamar)) {
          $idKamar = $dataDiskon['idKamar'];
          $queryhotel = mysqli_query($conn, "SELECT hotel.*, imgurl.imageUrl FROM hotel 
              INNER JOIN kamar ON kamar.hotelId = hotel.idHotel 
              INNER JOIN imgurl ON imgurl.hotelId = hotel.idHotel 
              AND kamar.idKamar = '$idKamar'
              limit 1") or die(mysqli_error($conn));
          while ($dataHotel = mysqli_fetch_array($queryhotel)) {
        ?>
            <div class="col-4 my-3">
              <div class="row">
                <div class="card-home" style="width: 300px; ">
                  <div class="rating" style="background-color: red; color: white;"><?= $dataDiskon['jmlhDiskon']; ?>%</div>
                  <div class="price">Rp <?= number_format($dataDiskon['hargaKamar']) ?></div>
                  <a href="detail-kamar.php?id=<?= $dataHotel['idHotel'] ?>&kamar=<?= $dataDiskon['idKamar'] ?>&diskon=<?= $dataDiskon['idDiskon'] ?> ">
                    <img style="height: 300px" src="Assets/Images/hotel/<?= $dataHotel['imageUrl'] ?>">
                    <div class="layer-shadow">
                      <h5><?= $dataHotel['namaHotel'] ?></h5>
                      <h7><?= $dataHotel['kotaHotel'] ?></h7>
                    </div>
                  </a>
                </div>
                <div class="col mt-3">
                  <p class="card-text text-muted text-center">
                    <?= $dataDiskon['deskripsiDiskon'] ?></p>
                </div>
              </div>
            </div>
        <?php
          }
        } ?>
      </div>
    </div>

    </main>


    <?php
    require_once('footer.php');
    ?>