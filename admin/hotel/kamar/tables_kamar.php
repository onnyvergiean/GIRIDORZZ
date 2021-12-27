<?php
require '../../db_conn.php';

$idHotel = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM kamar WHERE hotelId = $idHotel") or die(mysqli_error($conn));

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

              <th>Tipe</th>
              <th>Harga</th>
              <th>Jumlah</th>
              <th>Deskripsi</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if (!empty($rows)) {
              foreach ($rows as $row) : $idKamar = $row['idKamar'] ?>
                <tr>

                  <td><?= $row['tipeKamar'] ?></td>
                  <td><?= $row['hargaKamar'] ?></td>
                  <td><?= $row['jumlahKamar'] ?></td>
                  <td><?= $row['deskripsiKamar'] ?></td>
                  <td>

                    <a href="show_image_kamar.php?id=<?= $row['idKamar'] ?>" class="btn btn-info btn-circle btn-sm"><i class="fas fa-image"></i></a>
                    <a href="show_edit_kamar.php?id=<?= $idHotel ?>&idKamar=<?= $row['idKamar'] ?>" class="btn btn-warning btn-circle btn-sm "><i class="fas fa-edit"></i></a>
                    <a href="../fasilitasKamar/show_fasilitas.php?id=<?= $row['idKamar'] ?>&idHotel=<?= $idHotel ?>" class="btn btn-success btn-circle btn-sm"><i class="fas fa-plus"></i></a>
                    <a href="process.php?delete=<?= $idKamar  ?>&idHotel=<?= $idHotel ?>" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i>
                    </a>

                  </td>
                </tr>
            <?php endforeach;
            } ?>
          </tbody>
        </table>

        <a href="../hotel.php " class="btn btn-warning">Back</a>

      </div>
    </div>
  </div>
</div>