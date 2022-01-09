<?php
require_once('header.php');

$hotel = mysqli_query($conn, "SELECT GROUP_CONCAT(imgurl.imageUrl) as img, hotel.*, (SELECT MIN(kamar.hargaKamar) FROM kamar WHERE kamar.hotelId=hotel.idHotel) as harga FROM imgUrl JOIN hotel ON imgUrl.hotelId=hotel.idHotel GROUP BY hotel.idHotel ORDER BY hotel.ratingHotel DESC");

$rows = [];

while($data = mysqli_fetch_array($hotel)) {
    $rows[] = $data;
}
?>
<section class="container search-section">
    <div class="row justify-content-center">
        <div class="col-6">
            <input type="text" id="" class="form-control search-bar" placeholder="Cari hotel">
        </div>
        <div class="col-2">
            <button class="btn btn-warning search-button" href="#">
                Cari
            </button>
        </div>
    </div>
</section>
<main class="container my-5 daftar-hotel">
    <div class="row">

        <?php
        if (count($rows) > 0) {
            foreach ($rows as $hotel) {
                $image = explode(",", $hotel['img']);
        ?>
                <div class="col-4">
                    <div class="card-hotel">
                        <div class="rating"><?=$hotel['ratingHotel']?></div>
                        <div class="price">Rp. <?=(empty($hotel['harga'])) ? "100000" : $hotel['harga']?>/malam</div>
                        <a href="detail-hotel.php?id=<?=$hotel['idHotel']?>">
                            <img src="Assets/Images/hotel/<?=$image[0]?>" alt="">
                            <div class="layer-shadow">
                                <h5><?=$hotel['namaHotel']?></h5>
                                <h7><?=$hotel['kotaHotel']?></h7>
                            </div>
                        </a>
                    </div>
                </div>
        <?php
            }
        }
        ?>

    </div>
</main>

<section class="pagination">
    <div class="container">
        <div class="row justify-content-center">
            <button class="pagination-control prev">Previous</button>
            <button class="pagination-number">1</button>
            <button class="pagination-number">2</button>
            <button class="pagination-number">3</button>
            <button class="pagination-control next">Next</button>
        </div>
    </div>
</section>

<?php
require_once('footer.php');
?>