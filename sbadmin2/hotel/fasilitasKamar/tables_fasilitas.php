<?php
require '../../db_conn.php';

$result = mysqli_query($conn, "SELECT * FROM fasilitas ORDER BY idFasilitas") or die(mysqli_error($conn));
$image = mysqli_query($conn, "SELECT imgurl.imageUrl FROM  imgurl INNER JOIN fasilitas ON imgurl.imageId = fasilitas.idImageUrl")
    or die(mysqli_error($conn));
while ($data = mysqli_fetch_array($result)) {
    $rows[] = $data;
}
while ($dataImage = mysqli_fetch_array($image)) {
    $images[] = $dataImage;
}
?>
<div class="tab-pane fade show active" id="show-item" role="tabpanel" aria-labelledby="home-tab">
    <div class="card shadow mb-4 mt-2">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jumlah</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($rows)) {
                            foreach ($rows as $row) : ?>
                                <tr>
                                    <td><?= $row['idFasilitas'] ?></td>
                                    <td><?= $row['namaFasilitas'] ?></td>
                                    <td><?= $row['jumlahFasilitas'] ?></td>
                                    <?php foreach ($images as $images) : ?>
                                        <td><img src="images/<?= $images['imageUrl'] ?>" width="50px" height="50px"></td>
                                    <?php endforeach ?>
                                    <td>
                                        <a href="show_edit_fasilitas.php?id=<?= $row['idFasilitas'] ?>" class="btn btn-warning btn-circle btn-sm "><i class="fas fa-edit"></i></a>
                                        <a href="process.php?action=hapus&id=<?= $row['idFasilitas'] ?>" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i>
                                        </a>

                                    </td>
                                </tr>
                        <?php endforeach;
                        }  ?>
                    </tbody>
                </table>
                <form action="../kamar.php">
                    <button type="submit" class="btn btn-warning">Back</button>
                </form>
            </div>
        </div>
    </div>
</div>