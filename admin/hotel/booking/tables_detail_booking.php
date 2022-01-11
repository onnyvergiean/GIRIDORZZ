<?php
require '../../db_conn.php';
$idTransaksi = $_GET['id'];
$result = mysqli_query($conn, "SELECT transaksi.*,hotel.namaHotel,kamar.tipeKamar FROM transaksi JOIN hotel on transaksi.idHotel = hotel.idHotel JOIN kamar ON transaksi.idKamar = kamar.idKamar WHERE transaksi.idTransaksi = $idTransaksi") or die(mysqli_error($conn));

while ($data = mysqli_fetch_array($result)) {

?>
  <div class="tab-pane fade show active" id="show-item" role="tabpanel" aria-labelledby="home-tab">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <a href="booking.php" class="btn btn-warning">Back</a>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-4">
            <img src="../../../Assets/Images/booking/<?= $data['buktiTransfer'] ?>" alt="buktiTransfer" style="width: 100%; display: block;">
            <div class="row ml-2">
              <?php if ($data['status'] === 'Proses') { ?>
                <form action="process.php?confirm=<?= $data['idTransaksi'] ?>" method="POST">
                  <button type="submit" name="confirm" class="btn btn-success btn-sm"><i class="fas fa-check"></i> Confirm
                  </button>
                </form>
                <form action="process.php?reject=<?= $data['idTransaksi'] ?>" method="POST" class="ml-1">
                  <button type="submit" name="reject" class="btn btn-danger  btn-sm"><i class="fas fa-times"></i> Reject
                  </button>
                </form>
              <?php } ?>
            </div>
          </div>

          <div class="col-md-8">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Nama Lengkap</th>
                    <th>Nama Hotel & Kamar</th>
                    <th>Total</th>
                    <th>Bank</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><?= $data["namaLengkap"] ?></td>
                    <td><?= $data['namaHotel'] ?>, <?= $data['tipeKamar'] ?></td>
                    <td><?= number_format($data["totalHarga"]) ?></td>
                    <td><?= $data["namaBank"] ?></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
    </div>
  </div>