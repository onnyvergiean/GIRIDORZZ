<?php
require_once('header.php');
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

<section class="container">
    <div class="row">
        <div class="col-4">

        </div>
        <div class="col-4 text-center justify-content-center">
            <h1 class="h2">History Transaksi</h1>
            <span style="color: #605858;">
                Indonesia
            </span>
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
} ?>



<?php
require_once('footer.php');
?>