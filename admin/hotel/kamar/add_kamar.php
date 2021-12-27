    <?php
    require '../../db_conn.php';

    if (!$conn) {
        die("Connection failed:" . mysqli_connect_error());
    }

    $idHotel = $_GET['id'];
    ?>
    <div class="tab-pane fade" id="add-item" role=" tabpanel" aria-labelledby="profile-tab">
        <div class="card shadow mb-4 mt-2">
            <div class=" card-body">
                <form action="process.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="tipe">Tipe Kamar</label>
                        <input type="text" class="form-control" id="tipe" name="tipe" placeholder="Masukkan tipe Kamar" required>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga Kamar</label>
                        <input type="number" class="form-control" id="harga" name="harga" placeholder="Masukkan Harga" required>
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah Kamar Tersedia</label>
                        <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Masukkan Jumlah Kamar" required>
                    </div>
                    <div class=" form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" name="files[]" multiple required>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi Kamar</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" required placeholder="Masukkan Deskripsi Kamar"></textarea>

                    </div>
                    <input type="hidden" name="idHotel" value="<?= $idHotel ?>">
                    <button type="submit" name="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>