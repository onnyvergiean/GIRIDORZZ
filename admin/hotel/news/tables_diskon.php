<?php
require '../../db_conn.php';



$result = mysqli_query($conn, "SELECT * FROM diskon") or die(mysqli_error($conn));


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
              <th>daftar kamar</th>
              <th>diskripsi</th>
            </tr>

          </thead>
          <tbody>
            <?php
            if (!empty($rows)) {
              foreach ($rows as $row) : $idDiskon = $row['idDiskon'] ?>
                <tr>
                  <td><?= $row['namaDiskon'] ?></td>
                  <td><?= $row['idKamar'] ?></td>
                  <td><?= $row['deskripsi'] ?></td>
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

        <a href="./news.php " class="btn btn-warning">Back</a>

      </div>
    </div>
  </div>
</div>