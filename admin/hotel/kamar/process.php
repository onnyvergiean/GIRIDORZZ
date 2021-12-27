<?php

require('../../db_conn.php');
require('../functions/kamar.php');


if (isset($_POST['submit'])) {
    $data = [
        "tipe" => $_POST['tipe'],
        "harga" => $_POST['harga'],
        "jumlah" => $_POST['jumlah'],
        "deskripsi" => $_POST['deskripsi'],
        "idHotel" => $_POST['idHotel'],
    ];
    add_kamar($conn, $data);
}

if (isset($_POST['edit'])) {
    $data = [
        "tipe" => $_POST['tipe'],
        "jumlah" => $_POST['jumlah'],
        "idHotel" => $_POST['idHotel'],
        "deskripsi" => $_POST['deskripsi'],
        "idKamar" => $_POST['idKamar'],
        "harga" => $_POST['harga'],
    ];
    edit_kamar($conn, $data);
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $idHotel = $_GET['idHotel'];

    delete_kamar($conn, $id, $idHotel);
}
