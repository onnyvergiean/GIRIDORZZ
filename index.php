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
    <a href="detail-hotel.php" class="btn btn-warning btn-lg my-5" style="  width: 210px;
        border-radius: 12px;
        margin-left: 445px">Lihat Semua Hotel</a>
  </div>
</main>

<main class="container news">
  <div class="h1 fw-bold" style="margin-top: 90px;">News</div>
  <div class="card mb-3 align-content-center" style="max-width: 800px;  margin-top: 40px; border: 0cm;">
    <div class="row no-gutters">
      <div class="col-md-8">
        <div class=" card-body">
          <?php 
            $queryNewsDiskon = "SELECT MAX(hargaKamar) as hargaMax, max(jmlhDiskon) as diskonMax, namaDiskon, deskripsiDiskon FROM kamar
                      INNER JOIN diskon ON kamar.idKamar=diskon.idKamar LIMIT 1
            ";
            $sqlNewsDiskon = mysqli_query($conn, $queryNewsDiskon);

            while($data_news_diskon = mysqli_fetch_array($sqlNewsDiskon)) { ?>


          <h1 class="card-title fw-bold"><?= $data_news_diskon['namaDiskon'] ?></h1>
          <p class="card-text text-muted"><?= $data_news_diskon['deskripsiDiskon'] ?></p>
          <del>
            <h3 class="card-text text-danger my-1">Rp <?= $data_news_diskon['hargaMax'] ?>/malam</h3>
          </del>
          <h3 class="card-text text-primary my-2" style="text-indent: 30px;">
            <?php 

              $hargaMax = (int)$data_news_diskon['hargaMax'];

              $diskonMax = (int)$data_news_diskon['diskonMax'];
              
              echo "Rp ";
              echo $hargaMax - $diskonMax;
              echo " / malam";


             ?>

          </h3>
          <a href="detail-kamar.php" class="btn btn-lg btn-warning shadow-sm my-4" style="margin-left: 90px;">Check
            Now</a>

          <?php } ?>

        </div>
      </div>

      <?php 
        $queryNewsImg = "SELECT * FROM hotel 
                INNER JOIN imgurl ON hotel.idHotel=imgurl.hotelId
                INNER JOIN kamar ON hotel.idHotel=kamar.hotelId
                LIMIT 1
                ";
        $queryFindDiskon = "SELECT min(jmlhDiskon) as diskonMax, hargaKamar  FROM kamar INNER JOIN diskon ON kamar.idKamar=diskon.idKamar
        ";
        $sqlFindDiskon = mysqli_query($conn, $queryFindDiskon);
        $sqlNewsImg = mysqli_query($conn, $queryNewsImg);
        while ($dataFindDiskon = mysqli_fetch_array($sqlFindDiskon)) {
        

        while($dataNewsImg = mysqli_fetch_array($sqlNewsImg)) { ?>

       
      <div class="col-4 ">
        <div class=" card-news" style="width:600px; height: 370px; border-top-left-radius: 100px;">
          <div class="diskon"><?= $dataFindDiskon['diskonMax']; ?>%</div>
          <div class="price">Rp <?= number_format($dataFindDiskon['hargaKamar']) ?></div>
          <?= '<img style="height: 400px" src="Assets/Images/hotel/'. $dataNewsImg['imageUrl'] .'">'?>
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
  </div>
  </div>
  </div>


</main>

<div class="container" style="margin-top: 100px;">
  <div class="card" style="background-color: #f5f5f5; height: 500px;  border-radius: 30px; ">
    <h1 class="about-title" style="margin-top: 42px; font-size: 36px; font-weight: bold; margin-left: 30px">Giridorzz
      Promos</h1>
    <div class="row" style="margin-top: 40px; margin-left: 50px;">
    <?php 
        $queryNewsImg = "SELECT * FROM hotel 
                INNER JOIN imgurl ON hotel.idHotel=imgurl.hotelId
                INNER JOIN kamar ON hotel.idHotel=kamar.hotelId
                LIMIT 3
                ";
        $queryFindDiskon = "SELECT min(jmlhDiskon) as diskonMax, hargaKamar  FROM kamar INNER JOIN diskon ON kamar.idKamar=diskon.idKamar
        ";
        $sqlFindDiskon = mysqli_query($conn, $queryFindDiskon);
        $sqlNewsImg = mysqli_query($conn, $queryNewsImg);
        while ($dataFindDiskon = mysqli_fetch_array($sqlFindDiskon)) {
        

        while($dataNewsImg = mysqli_fetch_array($sqlNewsImg)) { ?>

      <div class="col-3" style="margin: auto; margin-left:1px; margin-right:60px">
        <div class="card-home" style="width: 320px;">
          <div class="rating"><?= $dataFindDiskon['diskonMax']; ?>%</div>
          <div class="price">Rp <?= number_format($dataFindDiskon['hargaKamar']) ?></div>
          <?= '<img style="height: 300px" src="Assets/Images/hotel/'. $dataNewsImg['imageUrl'] .'">'?>
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
        <p class="card-text text-muted text-center" style="margin-left: 65px; margin-right: 40px;">with a 30% promo
          you can take
          a vacation without thinking
          about extra costs</p>
      </div>
      <div class="col">
        <p class="card-text text-muted text-center" style="margin-left: 30px; margin-right: 40px;">with a 40% promo
          you can take
          a vacation without thinking
          about extra costs</p>
      </div>
      <div class="col">
        <p class="card-text text-muted text-center" style="margin-left: 10px; margin-right: 50px;">with a 40% promo
          you can take
          a vacation without thinking
          about extra costs</p>
      </div>
    </div>
  </div>
  </main>


  <?php
  require_once('footer.php');
  ?>
