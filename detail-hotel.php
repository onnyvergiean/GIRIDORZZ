<?php
require_once('header.php');

$hotel = [];
$rooms = [];
$fasilities = [];

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($conn, "SELECT imgurl.imageUrl, hotel.*, (SELECT MIN(kamar.hargaKamar) FROM kamar WHERE kamar.hotelId=hotel.idHotel) as harga FROM imgUrl JOIN hotel ON imgUrl.hotelId=hotel.idHotel WHERE hotelId=$id");
    $hotel = mysqli_fetch_array($query);

    $query = mysqli_query($conn, "SELECT kamar.*, imgurl.imageUrl FROM `kamar` INNER JOIN imgurl ON imgurl.kamarId=kamar.idKamar WHERE kamar.hotelId=$id");
    while ($data = mysqli_fetch_array($query)) {
        $rooms[] =  $data;
    }

    $query = mysqli_query($conn, "SELECT * FROM `fasilitas` WHERE fasilitas.hotelId=$id");
    while ($data = mysqli_fetch_array($query)) {
        $fasilities[] =  $data;
    }
}

?>
<section class="container">
    <div class="row">
        <div class="col-4">
            <ol class="breadcrumb ml-auto">
                <li class="breadcrumb-item"><a href="daftar-hotel.php">Hotels</a></li>
                <li class="breadcrumb-item active">Hotel Details</li>
            </ol>
        </div>
        <div class="col-4 text-center justify-content-center">
            <h1 class="h2"><?= $hotel['namaHotel'] ?></h1>
            <span style="color: #605858;">
                <?= $hotel['kotaHotel'] ?>
            </span>
        </div>
    </div>
</section>
<section class="container detail-hotel">
    <div class="row">
        <div class="col-12 img-wrapper">
            <img class="img-cover" src="./Assets/Images/hotel/<?= $hotel['imageUrl'] ?>" alt="imgFeatured">
        </div>
    </div>
</section>
<main class="container about-wrapper">
    <div class="row">
        <div class="col-7">
            <h4 class="about-title">About the Place</h4>
            <span class="about-text">
                <p>
                    <?= $hotel['deskripsiHotel'] ?>
                </p>
            </span>
            <div>
                <h4 class="about-title">Fasilitas</h4>
                <div class="row">

                    <?php
                    foreach ($fasilities as $fasility) {
                    ?>
                        <div class="col-3  img-icon"><img src="./Assets/Images/fasilitas/$fasility['imageUrl']" alt="Couch">
                            <p style="margin-top: 10px;">1 <span style="color: #B0B0B0;"><?= $fasility['namaFasilitas'] ?></span></p>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </div>
        <div class="col-5 p-3">
            <h4 class="about-title">Recommended Room</h4>
            <?php
            foreach ($rooms as $room) {
            ?>
                <div class="card-hotel">
                    <div class="price">Rp. <?= $room["hargaKamar"] ?>/malam</div>
                    <a href="detail-kamar.php?id=5&kamar=61">
                        <img src="Assets/Images/kamar/<?= $room["imageUrl"] ?>" alt="">
                        <div class="layer-shadow">
                            <h5><?= $room["tipeKamar"] ?></h5>
                            <h7><?= $room["deskripsiKamar"] ?></h7>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
</main>
<main class="container">
    <h4 class="about-title" style="margin-top: 42px;">List Room</h4>
    <div class="row">
        <?php
        foreach ($rooms as $room) {
        ?>
            <div class="col-3">
                <div class="card-hotel">
                    <div class="price">Rp. <?= $room["hargaKamar"] ?>/malam</div>
                    <a href="detail-kamar.php?id=5&kamar=61">
                        <img src="Assets/Images/kamar/<?= $room["imageUrl"] ?>" alt="">
                        <div class="layer-shadow">
                            <h5><?= $room["tipeKamar"] ?></h5>
                            <h7><?= $room["deskripsiKamar"] ?></h7>
                        </div>
                    </a>
                </div>

            </div>
        <?php } ?>

    </div>
</main>

<?php
require_once('footer.php');
?>