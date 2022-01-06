<?php
require '../../db_conn.php';



$result = mysqli_query($conn, "SELECT diskon.*,kamar.tipeKamar FROM diskon INNER JOIN kamar ON kamar.idKamar = diskon.idKamar") or die(mysqli_error($conn));

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
              <th>Nama Diskon</th>
              <th>Nama Hotel & Tipe Kamar </th>
              <th>Jumlah Diskon</th>
              <th>Deskripsi Diskon</th>
              <th>Action</th>
            </tr>

          </thead>
          <tbody>
            <?php
            if (!empty($rows)) {
              foreach ($rows as $row) : $idKamar = $row['idKamar'];
                $idDiskon = $row['idDiskon']; ?>
                <tr>
                  <td><?= $row['namaDiskon'] ?></td>
                  <?php

                  $namaHotel = mysqli_query($conn, "SELECT hotel.namaHotel FROM hotel INNER JOIN kamar ON kamar.hotelId = hotel.idHotel AND kamar.idKamar = '$idKamar'") or die(mysqli_error($conn));
                  while ($nama = mysqli_fetch_array($namaHotel)) { ?>
                    <td><?= $nama['namaHotel'], ", ", $row['tipeKamar'] ?> </td>
                  <?php }; ?>
                  <td><?= $row['jmlhDiskon'], "%" ?></td>
                  <td><?= $row['deskripsiDiskon'] ?></td>
                  <td>
                    <a href="show_edit_diskon.php?id=<?= $idDiskon ?>" class="btn btn-warning btn-circle btn-sm "><i class="fas fa-edit"></i>
                      <a href="process.php?delete=<?= $idDiskon ?>" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i>
                      </a>
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