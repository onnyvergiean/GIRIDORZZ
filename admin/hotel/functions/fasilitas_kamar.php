<?php
function validate($data)
{
    $data = trim($data);
    $data = strip_tags($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}

function add_fasilitas($conn, $data)
{
    $nama = validate($data["nama"]);
    $jumlah = validate($data["jumlah"]);
    $idHotel = validate($data['idHotel']);
    $idKamar = validate($data['idKamar']);
    $targetDir = "images/";
    $fileName = microtime() . $_FILES["file"]["name"];
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
    if (in_array($fileType, $allowTypes)) {
        move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath);
        $result = $conn->query("INSERT INTO fasilitas (hotelId, kamarId,namaFasilitas, jumlahFasilitas,imageUrl) VALUES ('" . $idHotel . "','" . $idKamar . "','" . $nama . "', '" . $jumlah . "','" . $fileName . "')");
        if ($result) {
            echo
            "<script>alert('Data Berhasil Ditambahkan');location='show_fasilitas.php?id=$idKamar&idHotel=$idHotel';</script>";
        } else {
            echo "<script>alert('Error');window.history.go(-1);</script>";
        }
    } else {
        echo "<script>alert('Format file harus jpg,png,jpeg,gif');window.history.go(-1);</script>";
    }
}
function edit_fasilitas($conn, $data)
{
    $nama = validate($data["nama"]);
    $jumlah = validate($data["jumlah"]);
    $old_image = validate($data['oldImage']);
    $idFasilitas = validate($data['id']);
    $idHotel = validate($data['idHotel']);
    $idKamar = validate($data['idKamar']);
    $targetDir = "images/";
    $fileName = microtime() . $_FILES["file"]["name"];
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif');

    if (!empty($fileName) && in_array($fileType, $allowTypes)) {
        unlink("images/$old_image");
        move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath);
        $update = $conn->query("UPDATE fasilitas SET imageUrl ='$fileName' , namaFasilitas='$nama', jumlahFasilitas = '$jumlah' WHERE idFasilitas ='$idFasilitas'");
        if ($update) {
            echo
            "<script>alert('Data Berhasil Diubah');location='show_fasilitas.php?id=$idKamar&idHotel=$idHotel';</script>";
        } else {
            echo "<script>alert('Error');window.history.go(-1);</script>";
        }
    } else {
        $edit = $conn->query("UPDATE fasilitas SET namaFasilitas='$nama', jumlahFasilitas='$jumlah' WHERE idFasilitas='$idFasilitas'");
        if ($edit) {
            echo
            "<script>alert('Data Berhasil Diubah');location='show_fasilitas.php?id=$idKamar&idHotel=$idHotel';</script>";
        } else {
            echo "<script>alert('Error');window.history.go(-1);</script>";
        }
    }
}
function delete_fasilitas($conn, $id, $idKamar, $idHotel)
{
    if (!empty($id)) {
        $result = mysqli_query($conn, "SELECT imageUrl from fasilitas where idFasilitas='$id'");
        while ($data = mysqli_fetch_array($result)) {
            unlink("images/$data[imageUrl]");
        }
        $conn->query("DELETE from fasilitas where idFasilitas='$id'");
        echo
        "<script>alert('Data Berhasil Dihapus');location='show_fasilitas.php?id=$idKamar&idHotel=$idHotel';</script>";
    } else {
        echo "<script>alert('Error');window.history.go(-1);</script>";
    }
}
