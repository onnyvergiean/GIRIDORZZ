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
