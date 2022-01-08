<?php
require_once('header.php');
$idHotel = $_GET['id'];
$result = mysqli_query($conn, "SELECT  imgurl.*,hotel.* FROM imgurl INNER JOIN hotel ON hotel.idHotel=imgurl.hotelId WHERE imgurl.hotelId = $idHotel")
    or die(mysqli_error($conn));

while ($data = mysqli_fetch_array($result)) {
    $rows[] = $data;
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Image Kamar</h1>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <tbody>
            <?php if (!empty($rows)) {
                foreach ($rows as $row) : $idHotel = $row['hotelId'];  ?>
                    <tr>
                        <td><img src="../../Assets/Images/hotel/<?= $row['imageUrl'] ?>" style="max-width: 400px;max-height: 400px"></td>

                    </tr>
            <?php endforeach;
            } ?>
        </tbody>

    </table>
    <a href="hotel.php" class="btn btn-warning">Back</a>
</div>
<!-- /.container-fluid -->

</div>
<?php
include('footer.php')
?>