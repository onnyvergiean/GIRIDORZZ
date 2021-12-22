<?php
require '../db_conn.php';

$result = mysqli_query($conn, "SELECT * FROM kamar ORDER BY idKamar") or die(mysqli_error($conn));

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
              <th>No</th>
              <th>Tipe</th>
              <th>Harga</th>
              <th>Jumlah</th>
              <th>Deskripsi</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($rows as $row) : ?>
              <tr>
                <td><?= $row['idKamar'] ?></td>
                <td><?= $row['tipeKamar'] ?></td>
                <td><?= $row['hargaKamar'] ?></td>
                <td><?= $row['jumlahKamar'] ?></td>
                <td><?= $row['deskripsiKamar'] ?></td>
                <td>
                  <form action="#" method=" POST">
                    <a href="#" class="btn btn-info btn-circle btn-sm"><i class="fas fa-image"></i></a>
                    <a href="#" class="btn btn-warning btn-circle btn-sm "><i class="fas fa-edit"></i></a>
                    <a href="#" class="btn btn-success btn-circle btn-sm"><i class="fas fa-plus"></i></a>
                    <button type="submit" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i>
                    </button>
                  </form>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>