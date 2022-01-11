<?php
require '../../db_conn.php';

$result = mysqli_query($conn, "SELECT transaksi.*,hotel.namaHotel,kamar.tipeKamar FROM transaksi JOIN hotel on transaksi.idHotel = hotel.idHotel JOIN kamar ON transaksi.idKamar = kamar.idKamar") or die(mysqli_error($conn));

while ($data = mysqli_fetch_array($result)) {
  $rows[] = $data;
}
?>
<div class="tab-pane fade show active" id="show-item" role="tabpanel" aria-labelledby="home-tab">
  <div class="card shadow mb-4 mt-2">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Invoice</th>
              <th>Tanggal</th>
              <th>Nama Hotel & Kamar </th>
              <th>Nama Lengkap</th>
              <th>Bank</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($rows)) {

              foreach ($rows as $row) :  ?>
                <tr>
                  <td>#<?= $row['invoice'] ?></td>
                  <td><?= $row['tglCheckin'] ?> s/d <?= $row['tglCheckout'] ?></td>
                  <td><?= $row['namaHotel'] ?>, <?= $row['tipeKamar'] ?></td>
                  <td><?= $row['namaLengkap'] ?></td>
                  <td><?= $row['namaBank'] ?></td>
                  <td><?= $row['status'] ?></td>
                  <td>
                    <a href="show_detail_booking.php?id=<?= $row['idTransaksi'] ?>" class="btn btn-success btn-circle btn-sm "><i class="fas fa-eye"></i></a>
                  </td>
                </tr>
            <?php endforeach;
            } ?>

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>