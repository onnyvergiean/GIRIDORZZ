<?php
require '../../db_conn.php';


$result = mysqli_query($conn, "SELECT * FROM bank")
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
                            <th>Nama Bank</th>
                            <th>Nama Pemilik</th>
                            <th>No Rekening</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php if (!empty($rows)) {

                            foreach ($rows as $row) :  ?>
                                <tr>
                                    <td><?= $row['namaBank'] ?></td>
                                    <td><?= $row['namaPemilik'] ?></td>
                                    <td><?= $row['noRekening'] ?></td>
                                    <td><img src="imagesBank/<?= $row['imageUrl'] ?>" width="50px" height="50px"></td>
                                    <td>
                                        <a href="show_edit_bank.php?idBank=<?= $row['idBank'] ?>" class="btn btn-warning btn-circle btn-sm "><i class="fas fa-edit"></i></a>
                                        <a href="process.php?delete=<?= $row['idBank']  ?> " class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                        <?php endforeach;
                        } ?>

                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>