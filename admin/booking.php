<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="./Assets/Images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="./Assets/css/details.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>booking</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light container">
            <h2>Booking</h2>
        </nav>
        <nav class="navbar navbar-expand-lg navbar-light container">

            <table border="1" class="table">
                <thead>
                    <tr class="table-secondary">
                        <th scope="col">No</th>
                        <th scope="col">Date-Time</th>
                        <th scope="col">Nama Hotel</th>
                        <th scope="col">Name Member</th>
                        <th scope="col">Name Bank</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($rows as $row) : ?>
                        <tr>
                            <td><?= $row['idTransaksi'] ?></td>
                            <td><?= $row['tanggal'] ?></td>
                            <td><?= $row['namaHotel'] ?></td>
                            <td><?= $row['nama'] ?></td>
                            <td><?= $row['nama'] ?></td>
                            <td><?= $row['proses'] ?></td>

                            <td>
                                <a href="edit.php?branchNo=<?= $row['branchNo'] ?>">Terima</a>
                                <a onclick="return confirm('Yakin mau menghapus data ini ?')" href="proses.php?action=hapus&branchNo=<?= $row['branchNo'] ?>">Tolak</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </nav>
    </header>

</body>

</html>