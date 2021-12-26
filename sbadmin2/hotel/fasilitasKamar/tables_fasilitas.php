<?php
require '../../db_conn.php';

$idKamar = $_GET['id'];
$result = mysqli_query($conn, "SELECT fasilitas.*, imgurl.* FROM fasilitas INNER JOIN imgurl ON fasilitas.idImageUrl=imgurl.imageId")
    or die(mysqli_error($conn));

while ($data = mysqli_fetch_array($result)) {
    $rows[] = $data;
}


?>
<div class="tab-pane fade show active" id="show-item" role="tabpanel" aria-labelledby="home-tab">
    <div class="card shadow mb-4 mt-2">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nama</th>
                            <th>Jumlah</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($rows as $row) :  ?>
                            <tr>
                                <td><?= $row['idFasilitas'] ?></td>
                                <td><?= $row['namaFasilitas'] ?></td>
                                <td><?= $row['jumlahFasilitas'] ?></td>

                                <td><img src="images/<?= $row['imageUrl'] ?>" width="50px" height="50px"></td>
                                <td>
                                    <a href="show_edit_fasilitas.php?idKamar=<?= $idKamar ?>&id=<?= $row['idFasilitas'] ?>&idImage=<?= $row['imageId'] ?>" class="btn btn-warning btn-circle btn-sm "><i class="fas fa-edit"></i></a>
                                    <a href="process.php?action=hapus&id=<?= $row['idFasilitas'] ?>" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach ?>

                    </tbody>
                </table>

                <a href="../kamar/kamar.php?id=<?= $idKamar ?>" class="btn btn-warning">Back</a>

            </div>
        </div>
    </div>
</div>