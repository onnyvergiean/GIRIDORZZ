<?php
require_once('header.php');
?>

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
      <?php 
            // $query = "SELECT hotel.idHotel, hotel.namaHotel, hotel.kotaHotel, hotel.deskripsiHotel, hotel.ratingHotel, imgurl.imageId, imgurl.imageUrl FROM hotel INNER JOIN imgurl ON hotel.idHotel=imgurl.hotelId";
      $query = "SELECT * FROM hotel 
                INNER JOIN imgurl ON hotel.idHotel=imgurl.hotelId
                INNER JOIN kamar ON hotel.idHotel=kamar.hotelId
                LIMIT 3
                ";
            $sql = mysqli_query($conn, $query);

            while($data = mysqli_fetch_array($sql)) { ?>

      <div class="col-3" style="  margin-left: 50px;">
        <div class="card-home" style="width: 320px; ">
          <div class="rating"><?= $data['ratingHotel']; ?></div>
          <div class="price"><?= $data['hargaKamar']; ?>/malam</div>
          <?= '<img style="height: 300px" src="Assets/Images/hotel/'. $data['imageUrl'] .'">'?>
          <div class="layer-shadow">
            <h5><?= $data['namaHotel'] ?></h5>
            <h7><?= $data['kotaHotel'] ?></h7>
          </div>
        </div>
      </div>
<?php } ?>

    </div>
    <a href="daftar-hotel.php" class="btn btn-warning btn-lg my-5" style="  width: 210px;
        border-radius: 12px;
        margin-left: 445px">Lihat Semua Hotel</a>
  </div>
</main>



<div class="container" style="margin-top: 100px;">
  <div class="card" style="background-color: #f5f5f5; height: 500px;  border-radius: 30px; ">
    <h1 class="about-title" style="margin-top: 42px; font-size: 36px; font-weight: bold; margin-left: 30px">Giridorzz
      Promos</h1>
    <div class="row" style="margin-top: 40px; margin-left: 50px;">
    <?php 
       
        $queryFindDiskon = "SELECT jmlhDiskon, hargaKamar  FROM kamar INNER JOIN diskon ON kamar.idKamar=diskon.idKamar
        ";
         $queryNewsImg = "SELECT * FROM hotel 
         INNER JOIN imgurl ON hotel.idHotel=imgurl.hotelId
         INNER JOIN kamar ON hotel.idHotel=kamar.hotelId
         LIMIT 1
         ";
        $sqlFindDiskon = mysqli_query($conn, $queryFindDiskon);
        $sqlNewsImg = mysqli_query($conn, $queryNewsImg);
        while ($dataFindDiskon = mysqli_fetch_array($sqlFindDiskon)) {
        

        while($dataNewsImg = mysqli_fetch_array($sqlNewsImg)) { ?>

      <div class="col-3" style="margin: auto; margin-left:250px;">
        <div class="card-home" style="width: 350px;">
          <div class="rating"><?= $dataFindDiskon['jmlhDiskon']; ?>%</div>
          <div class="price">Rp <?= number_format($dataFindDiskon['hargaKamar']) ?></div>
          <a href="detail-hotel.php?id=29">
          <?= '<img style="height: 300px" src="Assets/Images/hotel/'. $dataNewsImg['imageUrl'] .'">'?></a>
          <div class="layer-shadow">
          <h5><?= $dataNewsImg['namaHotel'] ?></h5>
            <h7><?= $dataNewsImg['kotaHotel'] ?></h7>
          </div>
        </div>
      </div>
      <?php
         }
        } 
        ?>
    </div>
    <div class="row my-3">
      <div class="col ">
        <p class="card-text text-muted text-center" style="margin-left: 65px; margin-right: 40px;"></p>
      </div>
    </div>
  </div>
  </main>


  <?php
  require_once('footer.php');
  ?>
