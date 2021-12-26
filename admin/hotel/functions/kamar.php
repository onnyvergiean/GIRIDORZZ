<?php
function validate($data)
{
    $data = trim($data);
    $data = strip_tags($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}

function add_kamar($conn, $data)
{
    $tipe = validate($data["tipe"]);
    $harga = validate($data["harga"]);
    $jumlah = validate($data["jumlah"]);
    $idHotel = validate($data["idHotel"]);
    $deskripsi = validate($data["deskripsi"]);
    $targetDir = "imagesKamar/";
    $fileName = $_FILES["file"]["name"];
    $targetFilePath = $targetDir . $fileName;

    move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath);
    $insert = "INSERT into imgurl (imageUrl) VALUES ('" . $fileName . "')";
    if ($conn->query($insert) === TRUE) {
        $last_id = $conn->insert_id;

        echo
        "<script>alert('Data Berhasil Ditambahkan');location='../kamar/kamar.php?id=$idHotel';</script>";
    } else {
        echo "<script>alert('Error');window.history.go(-1);</script>";
    }
    $sql = $conn->query("INSERT INTO kamar (idFasilitas, idImageUrl, tipeKamar, deskripsiKamar, hargaKamar, jumlahKamar) VALUES (NULL,'$last_id','$tipe', '$deskripsi','$harga',$jumlah)");
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
