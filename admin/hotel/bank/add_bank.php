<?php
require '../../db_conn.php';

if (!$conn) {
    die("Connection failed:" . mysqli_connect_error());
}


?>
<div class="tab-pane fade" id="add-item" role=" tabpanel" aria-labelledby="profile-tab">
    <div class="card shadow mb-4 mt-2">
        <div class=" card-body">
            <form action="process.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="namaBank">Nama Bank</label>
                    <input type="text" class="form-control" id="namaBank" name="namaBank" placeholder="Masukkan nama Bank" required>
                </div>
                <div class="form-group">
                    <label for="namaPemilik">Nama Pemilik Bank</label>
                    <input type="text" class="form-control" id="namaPemilik" name="namaPemilik" placeholder="Masukkan nama Pemilik Bank" required>
                </div>
                <div class="form-group">
                    <label for="noRekening">No Rekening</label>
                    <input type="number" class="form-control" id="noRekening" name="noRekening" placeholder="Masukkan No Rekening" required>
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" name="file" required>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>