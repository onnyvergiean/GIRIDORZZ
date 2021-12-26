<?php

require '../../db_conn.php';


if (!empty($_POST)) {

    $tipe = $_POST['tipe'];
    $tipe = $_POST['harga'];
    $jumlah = $_POST['jumlah'];
    $deskripsi = $_POST['deskripsi'];
    $targetDir = "images/";
    $fileName = $_FILES["file"]["name"];
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    if (isset($_POST['submit'])) {
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
        if (in_array($fileType, $allowTypes)) {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
                $insert = "INSERT into imgurl (imageUrl) VALUES ('" . $fileName . "')";
                if ($conn->query($insert) === TRUE) {
                    $last_id = $conn->insert_id;
                    $sql = $conn->query("INSERT INTO kamar (idImageUrl, tipeKamar, deskripsiKamar, hargaKamar, jumlahKamar) VALUES ('$last_id','$tipe', '$deskripsi','$harga',$jumlah)");
                    echo
                    "<script>alert('Data Berhasil Ditambahkan');location='kamar.php';</script>";
                } else {
                    echo "<script>alert('Error');window.history.go(-1);</script>";
                }
            } else {
                echo "<script>alert('Error');window.history.go(-1);</script>";
            }
        }
    } else if (isset($_POST['edit'])) {

        if (!empty($fileName)) {
            move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath);
            unlink("images/$old_image");
            $update = "UPDATE imgurl SET imageUrl ='$fileName' WHERE imageId = '$idImage' ";

            if ($conn->query($update) === TRUE) {
                $last_id = $conn->insert_id;
                $sql = $conn->query("UPDATE fasilitas SET idImageUrl ='$last_id' , namaFasilitas='$nama', jumlahFasilitas = '$jumlah' WHERE idFasilitas ='$idFasilitas'");
                echo
                "<script>alert('Data Berhasil Diubah');location='show_fasilitas.php';</script>";
            } else {
                echo "<script>alert('Error');window.history.go(-1);</script>";
            }
        } else {
            $edit = "UPDATE fasilitas SET namaFasilitas='$nama', jumlahFasilitas='$jumlah' WHERE idFasilitas='$idFasilitas'";
            $queryEdit = mysqli_query($conn, $edit);
            if ($queryEdit) {
                echo
                "<script>alert('Data Berhasil Diubah');location='show_fasilitas.php';</script>";
            } else {
                echo "<script>alert('Error');window.history.go(-1);</script>";
            }
        }
    }
} else if (!empty($_GET)) {
    if ($_GET['action'] == 'hapus') {
        $idFasilitas = $_GET['id'];

        mysqli_query($conn, "DELETE from fasilitas where idFasilitas='$idFasilitas'");

        header('location:show_fasilitas.php');
    }
}
