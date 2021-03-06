<?php
require '../../db_conn.php';

if (!$conn) {
    die("Connection failed:" . mysqli_connect_error());
}

$idFasilitas = $_GET['id'];
$idHotel = $_GET['idHotel'];
$idKamar = $_GET['idKamar'];

$result = mysqli_query($conn, "SELECT * from fasilitas where idfasilitas = '$idFasilitas'")
    or die(mysqli_error($conn));
while ($data = mysqli_fetch_array($result)) {

?>
    <div class="tab-pane fade show active" id="edit-item" role="tabpanel" aria-labelledby="home-tab">
        <div class="card shadow mb-4 mt-2">
            <div class=" card-body">
                <form action="process.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input value="<?= $data['namaFasilitas'] ?>" type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama fasilitas" required>
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input value="<?= $data['jumlahFasilitas'] ?>" type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Masukkan Jumlah fasilitas" required>
                    </div>
                    <div>
                        <img src="../../../Assets/Images/fasilitasKamar/<?= $data['imageUrl'] ?>" width="50px" height="50px">
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" name="file">
                    </div>
                    <input type="hidden" name="idHotel" value="<?= $idHotel ?>">
                    <input type="hidden" name="idKamar" value="<?= $idKamar ?>">
                    <input type="hidden" name="oldImage" value="<?= $data['imageUrl'] ?>">
                    <input type="hidden" class="id" name="id" value="<?= $idFasilitas ?>">
                    <button type="submit" name="edit" class="btn btn-primary">Save</button>
                    <a href="show_fasilitas.php?id=<?= $idKamar ?>&idHotel=<?= $idHotel ?>" class="btn btn-warning">Back</a>
                </form>
            </div>
        </div>
    </div>
<?php
}
?>