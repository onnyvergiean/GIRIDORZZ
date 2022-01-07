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
              <th>No</th>
              <th>Nama</th>
              <th>Nama Hotel </th>
              <th>Nama Kamar</th>
              <th>Tanggal</th>
              <th>Status</th>
              <th>Harga</th>
              <th>action</th>
            </tr>
          </thead>
          <tbody>
                    <a href="show_edit_booking.php?id=<?= $idDiskon ?>" class="btn btn-warning btn-circle btn-sm "><i class="fas fa-edit"></i>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>