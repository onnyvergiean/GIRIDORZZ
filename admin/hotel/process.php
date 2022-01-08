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
