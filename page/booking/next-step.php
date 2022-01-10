<?php
session_start();
include("../../database/connection.php");
date_default_timezone_set('Asia/Jakarta');
$_SESSION['fullName'] = $_POST['fullName'];

$_SESSION['email']
    = $_POST['email'];

$_SESSION['telphone']
    = $_POST['telphone'];

$_SESSION['startDate']
    = $_POST['startDate'];

$_SESSION['endDate']
    = $_POST['endDate'];

$startDate = new DateTime($_SESSION['startDate']);
$endDate = new DateTime($_SESSION['endDate']);
$countDate = $endDate->diff($startDate)->format('%d');

$idKamar = $_GET['kamar'];
$idHotel = $_GET['id'];
$kamar = mysqli_query($conn, "SELECT * FROM kamar where idKamar = '$idKamar' ");
while ($data = mysqli_fetch_array($kamar)) {
    $price = $data['hargaKamar'];
}
$totalPrice = $countDate * $price;
$result = mysqli_query($conn, "SELECT * FROM bank ")
    or die(mysqli_error($conn));
while ($data = mysqli_fetch_array($result)) {
    $rows[] = $data;
}
$total = "";
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="../../Assets/Images/logo.png" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../../Assets/css/details.css">

    <title>Bank</title>
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
                <button class="progress-number">1</button>
                <button class="progress-number active">2</button>
                <button class="progress-number">3</button>
            </div>

            <div class="col-12 text-center my-5">
                <h4>Pembayaran</h4>
                <h5>Silahkan mengikuti instruksi untuk melakukan pembayaran</h5>
            </div>

            <div class="row justify-content-center">
                <div class="col-6">
                    <p>Transfer Pembayaran:</p>
                    <p>Tax: 10%</p>
                    <p>Sub total: Rp <?= number_format($subTotal = $totalPrice * 0.1) ?> </p>
                    <b>Total: Rp <?= number_format($total = $totalPrice + $subTotal) ?></b>

                    <?php if (!empty($rows)) {
                        foreach ($rows as $row) : ?>
                            <div class="row py-3">
                                <div class="col-5">
                                    <img width="100" src="../../Assets/Images/bank/<?= $row['imageUrl'] ?>" alt="">
                                </div>
                                <div class="col-6">
                                    <span><?= $row['namaBank'] ?></span> <br>
                                    <span><?= $row['noRekening'] ?></span> <br>
                                    <span><?= $row['namaPemilik'] ?></span>
                                </div>
                            </div>
                    <?php endforeach;
                    } ?>
                </div>
                <div class="col-6">
                    <form action="process.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="namaBank" class="form-label">Nama Bank</label>
                            <input type="text" class="form-control" name="namaBank">
                        </div>
                        <div class="form-group">
                            <label for="image">Bukti Transfer</label>
                            <input type="file" class="form-control" name="file" required>
                        </div>
                        <div class="form-group">
                            <label for="namaPengirim" class="form-label">Nama Pengirim</label>
                            <input type="text" class="form-control" name="namaPengirim">
                        </div>
                        <input type="hidden" value="<?= rand(100000000, 500000000) ?>" name="invoice">
                        <input type="hidden" value="<?= $total ?>" name="totalHarga">
                        <input type="hidden" value="<?= $idKamar ?>" name="idKamar">
                        <input type="hidden" value="<?= $idHotel ?>" name="idHotel">

                        <button class="btn btn-warning my-3" type="submit" name="submit">Book Now</button>

                    </form>
                    <div class="mb-3"><a href="index.php" class="btn btn-light">Batal</a></div>
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

</body>

</html>