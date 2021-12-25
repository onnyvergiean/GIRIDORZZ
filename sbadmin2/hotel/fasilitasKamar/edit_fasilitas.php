<?php
require '../../db_conn.php';

if (!$conn) {
    die("Connection failed:" . mysqli_connect_error());
}

$idFasilitas = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM fasilitas WHERE idFasilitas='$idFasilitas'");

while ($data = mysqli_fetch_array($query)) {

?>
    <div class="tab-pane fade show active" id="edit-item" role="tabpanel" aria-labelledby="home-tab">
        <div class="card shadow mb-4 mt-2">
            <div class=" card-body">
                <div class="row"></div>
                <form action="process.php" method="POST">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input value="<?= $data['namaFasilitas'] ?>" type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama fasilitas" required>
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input value="<?= $data['jumlahFasilitas'] ?>" type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Masukkan Jumlah fasilitas" required>
                    </div>
                    <input type="hidden" class="id" name="id" value="<?= $idFasilitas ?>">
                    <button type="submit" name="edit" class="btn btn-primary">Save</button>
                    <a href="show_fasilitas.php" class="btn btn-warning">Back</a>
                </form>

            </div>
        </div>
    </div>
<?php
}
?>