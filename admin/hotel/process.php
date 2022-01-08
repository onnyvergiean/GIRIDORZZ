<?php
require_once('../../database/connection.php');
require_once('functions/hotel.php');

if (isset($_POST['submit'])) {
    $data = [
        "nama" => $_POST['nama'],
        "lokasi" => $_POST['lokasi'],
        "deskripsi" => $_POST['deskripsi'],
        "rating" => $_POST['rating'],
    ];

    add_hotel($conn, $data);
}

if (isset($_POST['edit'])) {
    $data = [
        "nama" => $_POST['namaHotel'],
        "lokasi" => $_POST['lokasiHotel'],
        "deskripsi" => $_POST['deskripsiHotel'],
        "rating" => $_POST['ratingHotel'],
        "idHotel" => $_POST['idHotel'],
    ];
    edit_hotel($conn, $data);
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    delete_hotel($conn, $id);
}