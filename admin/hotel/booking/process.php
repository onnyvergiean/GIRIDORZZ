<?php

require('../../db_conn.php');


if (isset($_POST['confirm'])) {
    $idTransaksi = $_GET['confirm'];
    $idKamar = $_GET['idKamar'];
    if ($idTransaksi) {
        $edit = $conn->query("UPDATE transaksi SET status = 'Confirm' WHERE idTransaksi = '$idTransaksi'");

        if ($edit) {
            $conn->query("UPDATE kamar SET jumlahKamar = jumlahKamar - 1 WHERE idKamar = '$idKamar'");
            echo
            "<script>alert('Data Berhasil Diubah');location='booking.php';</script>";
        } else {
            "<script>alert('Maaf Data Tidak Berhasil Diubah');location='booking.php';</script>";
        }
    } else {
        "<script>alert('Maaf Data Tidak Berhasil Diubah');location='booking.php';</script>";
    }
} else if (isset($_POST['reject'])) {
    $idTransaksi = $_GET['reject'];
    $idKamar = $_GET['idKamar'];
    if ($idTransaksi) {
        $edit = $conn->query("UPDATE transaksi SET status ='Reject' WHERE idTransaksi = '$idTransaksi' ");

        if ($edit) {
            echo
            "<script>alert('Data Berhasil Diubah');location='booking.php';</script>";
        } else {
            "<script>alert('Maaf Data Tidak Berhasil Diubah');location='booking.php';</script>";
        }
    } else {
        "<script>alert('Maaf Data Tidak Berhasil Diubah');location='booking.php';</script>";
    }
} else {
    $idTransaksi = $_GET['selesai'];
    $idKamar = $_GET['idKamar'];
    if ($idTransaksi) {
        $edit = $conn->query("UPDATE transaksi SET status ='Selesai' WHERE idTransaksi = '$idTransaksi' ");
        $conn->query("UPDATE kamar SET jumlahKamar = jumlahKamar + 1 WHERE idKamar = '$idKamar'");
        if ($edit) {
            echo
            "<script>alert('Data Berhasil Diubah');location='booking.php';</script>";
        } else {
            "<script>alert('Maaf Data Tidak Berhasil Diubah');location='booking.php';</script>";
        }
    } else {
        "<script>alert('Maaf Data Tidak Berhasil Diubah');location='booking.php';</script>";
    }
}
