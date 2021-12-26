<?php
    require_once('../../database/connection.php');
    require_once('functions/hotel.php');

    if (isset($_POST['save'])) {
        $data = [
            "nama" => $_POST['nama'],
            "harga" => $_POST['harga'],
            "lokasi" => $_POST['lokasi'],
            "deskripsi" => $_POST['deskripsi'],
            "rating" => $_POST['rating'],
        ];

        add_hotel($conn, $data);
    }

    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        delete_hotel($conn, $id);
    }
