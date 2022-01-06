<?php
session_start();
if(!isset($_SESSION['log'])){
  header('location: ../..login.php');
  exit;
}

require_once('./header.php');

$result = mysqli_query($conn, "SELECT * FROM diskon ORDER BY idDiskon") or die(mysqli_error($conn));

while ($data = mysqli_fetch_array($result)) {
  $rows[] = $data;
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">News</h1>
  <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="home-tab" data-toggle="tab" href="#show-item" role="tab" aria-controls="home" aria-selected="true">Show News</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="profile-tab" data-toggle="tab" href="#add-item" role="tab" aria-controls="profile" aria-selected="false">Add Diskon</a>
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
                  <th>Nama diskon</th>
                  <th>Type Kamar</th>
                  <th>Diskripsi</th>
                </tr>
              </thead>
              <tbody>

                <?php
                if (!empty($rows)) {
                  foreach ($rows as $row) : ?>
                    <tr>
                      <td><?= $row['namaDiskon'] ?></td>
                      <td><?= $row['idKamar'] ?></td>
                      <td><?= $row['deskripsi'] ?></td>

                      <td>
                        <form action="#" method=" POST">
                          <a href="./show_edit_diskon.php" class="btn btn-warning btn-circle btn-sm "><i class="fas fa-edit"></i></a>
                          <a href=<?= "./process.php?delete=" . $row['idDiskon'] ?> class="btn btn-danger btn-circle btn-sm" type="submit"><i class="fas fa-trash"></i></a>
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
    <div class="tab-pane fade" id="add-item" role=" tabpanel" aria-labelledby="profile-tab">
      <div class="card shadow mb-4 mt-2">
        <div class=" card-body">
          <form action="process.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <label for="namaDiskon">Nama Diskon</label>
              <input type="text" class="form-control" id="namaHotel" name="namaHotel" placeholder="Masukkan Nama Diskon" required>
            </div>
            <select>                       
                    <option selected>tipe kamar</option>
                    <?php 
                    include "connetion.php";
                    $query=mysqli_query($conn, "SELECT * FROM kamar order by idKamar DESC" );
                    while ($data=mysqli_fetch_array($query)){?>
		             <option value="<?=$data['tipeKamar'];?>"><?php echo $data['tipeKamar'];?></option>
                    <?php } ?>
                    </select>
            <div class="form-group">
              <label for="diskripsi">Deskripsi</label>
              <input type="float" class="form-control" id="diskripsi" name="diskripsi" placeholder="tulis deskripsi diskon" required>
            </div>
            <button type="submit" class="btn btn-primary" name="save">Save</button>
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
