<?php
session_start();
require('../../database/connection.php');
$idHotel = $_GET['id'];
$idKamar = $_GET['kamar'];
$result = mysqli_query($conn, "SELECT hotel.namaHotel,hotel.ratingHotel,kamar.* FROM hotel INNER JOIN kamar ON hotel.idHotel = $idHotel where kamar.hotelId = $idHotel")
    or die(mysqli_error($conn));
while ($data = mysqli_fetch_array($result)) {
    $rows[] = $data;
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
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../../Assets/css/details.css">

    <title>Booking Information</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light container justify-content-center">
            <a href="../../index.php" class="brand-text-wrapper">
                <span class="brand-text-icon">GIRIDORZZ</span>
            </a>
        </nav>
    </header>
    <main class="container my-5 booking-kamar px-5">
        <div class="row justify-content-center">
            <div style="position: relative;">
                <button class="progress-number active">1</button>
                <button class="progress-number">2</button>
                <button class="progress-number">3</button>
            </div>
            <?php if (!empty($rows)) {
                foreach ($rows as $row) : ?>
                    <div class="col-12 text-center my-5">
                        <h4>Booking Information</h4>
                        <h5><?= $row['namaHotel'] ?> <span class="h5" style="color: #f0b828"><?= $row['ratingHotel'] ?></span></h5>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-6">
                            <img src="../../Assets/Images/kamar/<?= $resultImage[0]['imageUrl'] ?>" alt="" class="img-wrapper">
                            <div class="row my-2 align-items-center">
                                <div class="col-6">
                                    <b><?= $row['tipeKamar'] ?></b>
                                </div>
                                <div class="col-6">
                                    <b>Rp <?= $row['hargaKamar'] ?></b> / <b> malam</b>
                                </div>
                            </div>
                        </div>
                <?php endforeach;
            } ?>
                <div class="col-6">
                    <form action="next-step.php?id=<?= $idHotel ?>&kamar=<?= $idKamar ?>" method="post">
                        <div class="form-group">
                            <label for="fullName" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="fullName" name="fullName" required>
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-label">Alamat Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="telphone" class="form-label">Nomor Handphone</label>
                            <input type="number" class="form-control" id="telphone" name="telphone" required>
                        </div>
                        <div class="form-group">
                            <label for="startDate" class="form-label">Tanggal Mulai Reservasi</label>
                            <input type="date" class="form-control" id="startDate" name="startDate" required>
                        </div>
                        <div class="form-group">
                            <label for="endDate" class="form-label">Tanggal Akhir Reservasi</label>
                            <input type="date" class="form-control" id="endDate" name="endDate" required>
                        </div>
                        <div>
                            <button class="btn btn-warning nav-link my-3" type="submit" name="submit">Lanjut Booking</button>
                        </div>
                    </form>
                    <div class="mb-3"><a href="../../detail-kamar.php" class="btn btn-light">Batal</a></div>
                </div>
                    </div>
        </div>
    </main>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src=" https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script type="text/javascript">
        $(function() {
            // Bootstrap DateTimePicker v4
            $('#datetimepicker4').datetimepicker({
                format: 'DD/MM/YYYY'
            });
        });
    </script>
</body>

</html>