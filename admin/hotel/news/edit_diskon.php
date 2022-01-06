<?php
require '../../db_conn.php';

if (!$conn) {
    die("Connection failed:" . mysqli_connect_error());
}

$idDiskon = $_GET['id'];
$resultDiskon = mysqli_query($conn, "SELECT * from Diskon where idDiskon = $idDiskon") or die(mysqli_error($conn));

while ($data = mysqli_fetch_array($resultDiskon)) {
?>
    <div class="tab-pane fade show active" id="edit-diskon" role="tabpanel" aria-labelledby="home-tab">
        <div class="card shadow mb-4 mt-2">
            <div class=" card-body">
                <div class="row"></div>
                <form action="process.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="namaDiskon">Nama</label>
                        <input value="<?= $data['namaDiskon'] ?>" type="text" class="form-control" id="namaDiskon" name="namaDiskon" placeholder="Masukkan nama diskon">
                    </div>
                    <div class="form-group">
                        <label for="jmlDiskon">Jumlah Diskon %</label>
                        <input value="<?= $data['jmlhDiskon'] ?>" type="number" class="form-control" id="jmlDiskon" name="jmlDiskon" placeholder="Masukkan Jumlah Diskon" min="1" max="100">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <input value="<?= $data['deskripsiDiskon'] ?>" type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Tulis deskripsi">
                    </div>
                <?php
            }
                ?>
                <button type="submit" name="edit" class="btn btn-primary">Save</button>
                <input type="hidden" name="idDiskon" value="<?= $idDiskon ?>">
                <a href="news.php" class="btn btn-warning">Back</a>
                </form>

            </div>
        </div>
    </div>