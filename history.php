<?php
require_once('database/connection.php');
session_start();

$nama = '';
$email = '';
if (isset($_SESSION['logged_in'])) {
    $nama = $_SESSION['nama'];
    $email = $_SESSION['email'];
}
if (!isset($_SESSION['logged_in'])) {
    header('location: login.php');
    exit;
}

$user = mysqli_query($conn, "SELECT * FROM user WHERE nama = '$nama' and email = '$email'") or die(mysqli_error($conn));
while ($data = mysqli_fetch_array($user)) {
    $idUser = $data['idUser'];
}
$result = mysqli_query($conn, "SELECT transaksi.*,hotel.namaHotel,kamar.tipeKamar FROM transaksi JOIN hotel on transaksi.idHotel = hotel.idHotel JOIN kamar ON transaksi.idKamar = kamar.idKamar WHERE transaksi.idUser = '$idUser'") or die(mysqli_error($conn));

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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./Assets/css/details.css" />
    <title>Home</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light container">
            <a href="index.php" class="brand-text-wrapper">
                <span class="brand-text-icon">GIRIDORZZ</span>
            </a>
            <nav class="navbar-nav navbar-center">
                <a class="nav-link" href="index.php"> Home </a>
                <a class="nav-link active" href="#"> Booking </a>
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
        <div class="row">
            <div class="col-4">

            </div>
            <div class="col-4 text-center justify-content-center">
                <h1 class="h2">History Transaksi</h1>

            </div>
        </div>
    </section><br>
    <?php if (!empty($rows)) {
        foreach ($rows as $row) :  ?>
            <header>
                <nav class="navbar navbar-expand-lg navbar-light container mt-5">
                    <section class="container">
                        <table>
                            <tr>
                                <td>
                                    <h5 style="color: #000000;">#<?= $row['invoice'] ?></h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5 style="color: #000000;">Status Pesanan <?= $row['status'] ?></h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span style="color: #804040;" class="list-text-icon"><?= $row['namaHotel'] ?>, <?= $row['tipeKamar'] ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span style="color: #000000;" class="history-text-icon"><?= $row['tglCheckin'] ?> s/d <?= $row['tglCheckout'] ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span style="color: #000000;" class="history-text-icon">Rp <?= number_format($row['totalHarga']) ?></span>
                                </td>
                            </tr>
                        </table>

                    </section>
                </nav>
                <nav class="navbar navbar-expand-lg navbar-light container mt-3">
                    <section class="container">
                        <div>
                            <span style="color: #000000;" class="history-text-icon"><?= $row['namaLengkap'] ?></span>
                        </div>
                    </section>
                </nav>
            </header>
        <?php endforeach;
    } else { ?>

        <div class="container">
            <h2 class="text-center">Maaf Belum ada History Transaksi</h2>
        </div>
    <?php }; ?>
    <?php
    require_once('footer.php');
    ?>