<?php
require '../db_conn.php';

$result = mysqli_query($conn, "SELECT * FROM hotel ORDER BY idKamar") or die(mysqli_error($conn));

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
              <th>Nama</th>
              <th>Kota</th>
              <th>Negara</th>
              <th>Deskripsi</th>
              <th>Rating</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>

            <?php
            if (!empty($rows)) {
              foreach ($rows as $row) : ?>
                <tr>
                  <td><?= $row['idHotel'] ?></td>
                  <td><?= $row['namaHotel'] ?></td>
                  <td><?= $row['kotaHotel'] ?></td>
                  <td><?= $row['negaraHotel'] ?></td>
                  <td><?= $row['deskripsiHotel'] ?></td>
                  <td><?= $row['ratingHotel'] ?></td>
                  <td>
                    <form action="#" method=" POST">
                      <a href="#" class="btn btn-info btn-circle btn-sm"><i class="fas fa-image"></i></a>
                      <a href="#" class="btn btn-warning btn-circle btn-sm "><i class="fas fa-edit"></i></a>
                      <a href="kamar/kamar.php?id=<?= $row['idHotel'] ?>" class="btn btn-success btn-circle btn-sm"><i class="fas fa-plus"></i></a>
                      <button type="submit" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i>
                      </button>
                    </form>
                  </td>
                </tr>
            <?php endforeach;
            } else {
            }
            ?>

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>