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
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama fasilitas" required>
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" name="file" required>
                </div>
                <input type="hidden" name="idHotel" value="<?= $idHotel ?>">
                <button type="submit" name="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>