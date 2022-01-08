<?php
require '../../db_conn.php';

if (!$conn) {
    die("Connection failed:" . mysqli_connect_error());
}

$idBank = $_GET['idBank'];

$result = mysqli_query($conn, "SELECT * FROM bank WHERE idBank = '$idBank'")
    or die(mysqli_error($conn));
while ($data = mysqli_fetch_array($result)) {

?>
    <div class="tab-pane fade show active" id="edit-item" role="tabpanel" aria-labelledby="home-tab">
        <div class="card shadow mb-4 mt-2">
            <div class=" card-body">
                <form action="process.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="namaBank">Nama Bank</label>
                        <input type="text" value="<?= $data['namaBank'] ?>" class="form-control" id="namaBank" name="namaBank" placeholder="Masukkan nama Bank" required>
                    </div>
                    <div class="form-group">
                        <label for="namaPemilik">Nama Pemilik Bank</label>
                        <input type="text" value="<?= $data['namaPemilik'] ?>" class="form-control" id="namaPemilik" name="namaPemilik" placeholder="Masukkan nama Pemilik Bank" required>
                    </div>
                    <div class="form-group">
                        <label for="noRekening">No Rekening Bank</label>
                        <input type="number" value="<?= $data['noRekening'] ?>" class="form-control" id="noRekening" name="noRekening" placeholder="Masukkan No Rekening" required>
                    </div>
                    <div>
                        <img src="imagesBank/<?= $data['imageUrl'] ?>" width="50px" height="50px">
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" name="file">
                    </div>
                    <input type="hidden" name="idBank" value="<?= $idBank ?>">
                    <input type="hidden" name="idImage" value="<?= $idImage ?>">
                    <input type="hidden" name="oldImage" value="<?= $data['imageUrl'] ?>">
                    <button type="submit" name="edit" class="btn btn-primary">Save</button>
                    <a href="bank.php" class="btn btn-warning">Back</a>
                </form>
            </div>
        </div>
    </div>
<?php
}
?>