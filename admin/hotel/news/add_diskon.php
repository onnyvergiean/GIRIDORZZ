<?php
require '../../db_conn.php';

if (!$conn) {
    die("Connection failed:" . mysqli_connect_error());
}

$query = mysqli_query($conn, "SELECT kamar.*,hotel.* FROM kamar INNER JOIN hotel ON kamar.hotelId = hotel.idHotel");
?>

<div class="tab-pane fade" id="add-item" role="tabpanel" aria-labelledby="home-tab">
    <div class="card shadow mb-4 mt-2">
        <div class="card-body">
            <form action="process.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="namaDiskon">Nama Diskon</label>
                    <input type="text" class="form-control" id="namaDiskon" name="namaDiskon" placeholder="Masukkan Nama Diskon" required>
                </div>
                <label for="idKamar">Nama Hotel & Tipe Kamar</label>
                <select class="form-control " name="idKamar">
                    <option selected>--- Pilih Kamar ---</option>
                    <?php
                    while ($data = mysqli_fetch_array($query)) { ?>
                        <option value="<?= $data['idKamar']; ?>"><?php echo $data['namaHotel'], " -- ", $data['tipeKamar']; ?></option>
                    <?php } ?>
                </select>
                <div class="form-group">
                    <label for="jmlDiskon">Jumlah Diskon %</label>
                    <input type="number" class="form-control" id="jmlDiskon" name="jmlDiskon" placeholder="Masukkan Jumlah Diskon" min="1" max="100" required>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Tulis deskripsi" required>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>