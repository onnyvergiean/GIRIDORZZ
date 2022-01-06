<?php
require '../../db_conn.php';

if (!$conn) {
    die("Connection failed:" . mysqli_connect_error());
}

$resultDiskon = mysqli_query($conn, "SELECT * from Diskon")
    or die(mysqli_error($conn));
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
                        <label for="deskripsi">tipe kamar</label>
                        <input value="<?= $data['idKamar'] ?>" type="number" class="form-control" id="idKamar" name="idKamar" placeholder="Masukkan ID kamar">
                    </div>
                    <div class="form-group">
                        <label for="harga">deskripsi</label>
                        <input value="<?= $data['deskripsi'] ?>" type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Tulis deskripsi">
                <?php
            }
                ?>

                <button type="submit" name="edit" class="btn btn-primary">Save</button>
                <a href="kamar.php?id=<?= $idHotel ?>" class="btn btn-warning">Back</a>
                </form>

            </div>
        </div>
    </div>