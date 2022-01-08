<?php
require '../db_conn.php';

if (!$conn) {
    die("Connection failed:" . mysqli_connect_error());
}


$idHotel = $_GET['id'];

$result = mysqli_query($conn, "SELECT * from hotel where idHotel = $idHotel")
    or die(mysqli_error($conn));
while ($data = mysqli_fetch_array($result)) {
?>
    <div class="tab-pane fade show active" id="edit-item" role="tabpanel" aria-labelledby="home-tab">
        <div class="card shadow mb-4 mt-2">
            <div class=" card-body">
                <div class="row"></div>
                <form action="process.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="tipe">Nama Hotel</label>
                        <input value="<?= $data['namaHotel'] ?>" type="text" class="form-control" id="tipe" name="namaHotel" placeholder="Masukkan Nama Hotel">
                    </div>
                    <div class="form-group">
                        <label for="harga">Lokasi Hotel</label>
                        <input value="<?= $data['kotaHotel'] ?>" type="text" class="form-control" id="harga" name="lokasiHotel" placeholder="Masukkan Lokasi Hotel">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea type="text" class="form-control" id="deskripsi" name="deskripsiHotel" placeholder="Masukkan Deskripsi Hotel" rows="5">
                            <?= $data['deskripsiHotel'] ?>
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Rating</label>
                        <input value="<?= $data['ratingHotel'] ?>" type="number" class="form-control" id="jumlah" name="ratingHotel" placeholder="Masukkan Rating">
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" name="files[]" multiple>
                    </div>
                <?php
            }
                ?>
                <input type="hidden" name="idHotel" value=<?= $idHotel ?>>
                <button type="submit" name="edit" class="btn btn-primary">Save</button>

                <a href="kamar.php?id=<?= $idHotel ?>" class="btn btn-warning">Back</a>
                </form>

            </div>
        </div>
    </div>