<?php
require '../../db_conn.php';

$idHotel = $_GET['id'];
$result = mysqli_query($conn, "SELECT * from fasilitas WHERE hotelId = '$idHotel'")
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

                            <th>Nama</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php if (!empty($rows)) {
                            foreach ($rows as $row) :  ?>
                                <tr>
                                    <td><?= $row['namaFasilitas'] ?></td>

                                    <td><img src="../../../Assets/Images/fasilitasHotel/<?= $row['imageUrl'] ?>" width="50px" height="50px"></td>
                                    <td>
                                        <a href="show_edit_fasilitas.php?id=<?= $row['idFasilitas'] ?>&idHotel=<?= $idHotel ?>" class="btn btn-warning btn-circle btn-sm "><i class="fas fa-edit"></i></a>
                                        <a href="process.php?delete=<?= $row['idFasilitas']  ?>&id=<?= $idHotel ?>" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                        <?php endforeach;
                        } ?>
                    </tbody>
                </table>

                <a href="../hotel.php" class="btn btn-warning">Back</a>

            </div>
        </div>
    </div>
</div>