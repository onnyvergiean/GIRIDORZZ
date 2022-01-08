<?php
require '../../db_conn.php';

if (!$conn) {
    die("Connection failed:" . mysqli_connect_error());
}


$idHotel = $_GET['id'];
$idKamar = $_GET['idKamar'];

$resultKamar = mysqli_query($conn, "SELECT * from kamar where idKamar = $idKamar")
    or die(mysqli_error($conn));
while ($data = mysqli_fetch_array($resultKamar)) {
?>
    <div class="tab-pane fade show active" id="edit-item" role="tabpanel" aria-labelledby="home-tab">
        <div class="card shadow mb-4 mt-2">
            <div class=" card-body">
                <div class="row"></div>
                <form action="process.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="tipe">Tipe</label>
                        <input value="<?= $data['tipeKamar'] ?>" type="text" class="form-control" id="tipe" name="tipe" placeholder="Masukkan tipe kamar">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <input value="<?= $data['deskripsiKamar'] ?>" type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Masukkan tipe kamar">
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input value="<?= $data['hargaKamar'] ?>" type="number" class="form-control" id="harga" name="harga" placeholder="Masukkan Harga Kamar">
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input value="<?= $data['jumlahKamar'] ?>" type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Masukkan Jumlah Kamar">
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" name="files[]" multiple>
                    </div>
                <?php
            }
                ?>
                <input type="hidden" name="idKamar" value=<?= $idKamar ?>>
                <input type="hidden" name="idHotel" value=<?= $idHotel ?>>
                <button type="submit" name="edit" class="btn btn-primary">Save</button>

                <a href="kamar.php?id=<?= $idHotel ?>" class="btn btn-warning">Back</a>
                </form>

            </div>
        </div>
    </div>