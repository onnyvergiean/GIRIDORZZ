<?php
require '../../db_conn.php';

if (!$conn) {
    die("Connection failed:" . mysqli_connect_error());
}


?>
<div class="tab-pane fade" id="add-booking" role=" tabpanel" aria-labelledby="profile-tab">
    <div class="card shadow mb-4 mt-2">
        <div class=" card-body">
            <form action="process.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama Bank" required>
                </div>
                <div class="form-group">
                    <label for="hotel">Hotel</label>
                    <input type="text" class="form-control" id="hotel" name="hotel" required>
                </div>
                <div class="form-group">
                    <label for="tipekamar">Kamar</label>
                    <input type="text" class="form-control" id="tipeKamar" name="tipeKamar" required>
                </div>
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="" class="form-control" id="tanggal" name="tanggal" required>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <input type="text" class="form-control" id="status" name="status" required>
                </div>
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="number" class="form-control" id="harga" name="harga" required>
                </div>
                <input type="hidden" name="idTransaski" value="<?= $idTransaksi ?>">
                <input type="hidden" name="idUser" value="<?= $idUser ?>">
                <input type="hidden" name="idKamar" value="<?= $idKamar ?>">
                <input type="hidden" name="idHotel" value="<?= $idHotel ?>">
                <button type="submit" name="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>