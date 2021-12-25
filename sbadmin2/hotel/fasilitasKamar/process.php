<?php

require '../../db_conn.php';

if (!empty($_POST)) {
    $idFasilitas = $_POST['id'];
    $nama = $_POST['nama'];
    $jumlah = $_POST['jumlah'];
    $image = $_POST['image'];
    if (isset($_POST['submit'])) {
        if (!$conn) {
            die("Connection failed:" . mysqli_connect_error());
        }
        $sqlImage =
            "INSERT INTO imgurl (imageUrl) VALUES ('$image')";
        $sql = "INSERT INTO fasilitas (namaFasilitas, jumlahFasilitas) VALUES ('$nama', '$jumlah')";

        $query = mysqli_query($conn, $sql, $sqlImage);
        if ($query && $sqlImage) {
            echo "<script>alert('Data Berhasil Ditambahkan');location='show_fasilitas.php';</script>";
        } else {
            echo "<script>alert('Error');window.history.go(-1);</script>";
        }
    } else if (isset($_POST['edit'])) {
        $edit = "UPDATE fasilitas SET namaFasilitas='$nama', jumlahFasilitas='$jumlah' WHERE idFasilitas='$idFasilitas'";
        $queryEdit = mysqli_query($conn, $edit);

        if ($queryEdit) {
            echo
            "<script>alert('Data Berhasil Diubah');location='show_fasilitas.php';</script>";
        } else {
            echo "<script>alert('Error');window.history.go(-1);</script>";
        }
    }
} else if (!empty($_GET)) {
    if ($_GET['action'] == 'hapus') {
        $idFasilitas = $_GET['id'];

        mysqli_query($conn, "DELETE from fasilitas where idFasilitas='$idFasilitas'");

        header('location:show_fasilitas.php');
    }
}
