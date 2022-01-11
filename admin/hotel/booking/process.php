<?php

require('../../db_conn.php');


if (isset($_POST['confirm'])) {
    $idTransaksi = $_GET['confirm'];
    if ($idTransaksi) {
        $edit = $conn->query("UPDATE transaksi SET status = 'Confirm' WHERE idTransaksi = '$idTransaksi'");

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
    $idTransaksi = $_GET['reject'];
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
}
