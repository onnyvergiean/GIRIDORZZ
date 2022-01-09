<?php
session_start();
if (!isset($_SESSION['log'])) {
  header('location: ../login.php');
  exit;
}

require_once('header.php');

$result = mysqli_query($conn, "SELECT * FROM hotel ORDER BY idHotel") or die(mysqli_error($conn));

while ($data = mysqli_fetch_array($result)) {
  $rows[] = $data;
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Hotel</h1>
  <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="home-tab" data-toggle="tab" href="#show-item" role="tab" aria-controls="home" aria-selected="true">Show Item</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="profile-tab" data-toggle="tab" href="#add-item" role="tab" aria-controls="profile" aria-selected="false">Add Item</a>
    </li>
  </ul>
  <div class="tab-content" id="myTabContent">

    <div class="tab-pane fade show active" id="show-item" role="tabpanel" aria-labelledby="home-tab">
      <div class="card shadow mb-4 mt-2">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Nama</th>
                  <th>Kota</th>
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
                      <td><?= $row['namaHotel'] ?></td>
                      <td><?= $row['kotaHotel'] ?></td>
                      <td><?= $row['deskripsiHotel'] ?></td>
                      <td><?= $row['ratingHotel'] ?></td>
                      <td>
                        <a href="show_edit_hotel.php?id=<?= $row['idHotel'] ?>" class="btn btn-warning btn-circle btn-sm "><i class="fas fa-edit"></i></a>
                        <a href="show_image_hotel.php?id=<?= $row['idHotel'] ?>" class="btn btn-info btn-circle btn-sm "><i class="fas fa-image"></i></a>
                        <a href="../hotel/fasilitasHotel/show_fasilitas.php?id=<?= $row['idHotel'] ?>" class="btn btn-primary btn-circle btn-sm "><i class="fas fa-plus"></i></a>
                        <a href="./kamar/kamar.php?id=<?= $row['idHotel'] ?>" class="btn btn-success btn-circle btn-sm"><i class="fas fa-bed"></i></a>
                        <a href=<?= "./process.php?delete=" . $row['idHotel'] ?> class="btn btn-danger btn-circle btn-sm" type="submit"><i class="fas fa-trash"></i></a>
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
    <div class="tab-pane fade" id="add-item" role=" tabpanel" aria-labelledby="profile-tab">
      <div class="card shadow mb-4 mt-2">
        <div class=" card-body">
          <form action="process.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <label for="nama">Nama Hotel</label>
              <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Hotel" required>
            </div>
            <div class="form-group">
              <label for="lokasi">Lokasi Hotel</label>
              <input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="Masukkan Lokasi Hotel" required>
            </div>
            <div class="form-group">
              <label for="deskripsi">Deskripsi Hotel</label>
              <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="Masukkan Deskripsi" required rows="5"></textarea>
            </div>
            <div class="form-group">
              <label for="rating">Rating Hotel</label>
              <input type="text" class="form-control" id="rating" name="rating" placeholder="Masukkan Rating Hotel" required>
            </div>
            <div class=" form-group">
              <label for="image">Image</label>
              <input type="file" class="form-control" name="files[]" multiple required>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Save</button>
          </form>
        </div>
      </div>
    </div>

  </div>
</div>

<?php
require_once('footer.php');
?>
<!-- /.container-fluid -->