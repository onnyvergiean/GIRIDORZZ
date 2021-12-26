<?php

function validate($data)
{
    $data = trim($data);
    $data = strip_tags($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}

function add_hotel($conn, $data)
{
    $nama = validate($data["nama"]);
    $lokasi = validate($data["lokasi"]);
    $harga = validate($data["harga"]);
    $deskripsi = validate($data["deskripsi"]);
    $rating = validate($data["rating"]);

    if (!empty($nama) && !empty($harga) && !empty($lokasi) && !empty($deskripsi) && !empty($rating)) {
        $query = "INSERT INTO `hotel` (`idFasilitas`, `idKamar`, `idImageUrl`, `namaHotel`, `kotaHotel`, `deskripsiHotel`, `ratingHotel`) VALUES ( NULL, NULL, NULL, '$nama', '$lokasi', '$deskripsi', '$rating')";

        $result = mysqli_query($conn, $query);

        if ($result) {
            print_r($deskripsi);
            header("location: ./hotel.php");
        }
    }
}

function delete_hotel($conn, $id)
{
    if (!empty($id)) {
        $query = "DELETE FROM `hotel` WHERE idHotel=$id";
        $result = mysqli_query($conn, $query);

        if ($result) {
            header("location: ./hotel.php");
        }
    }
}
