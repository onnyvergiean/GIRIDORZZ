<?php

require('./../../db_conn.php');
require('../functions/fasilitas_kamar.php');


if (isset($_POST['submit'])) {
    $data = [
        "nama" => $_POST['nama'],
        "idimgUrl" => $_POST['idimgUrl'],
    ];
    add_bank($conn, $data);
}


if (isset($_POST['edit'])) {
    $data = [
        "nama" => $_POST['nama'],
        "idImage" => $_POST['idImage'],
        "oldImage" => $_POST['oldImage'],
    ];
    edit_bank($conn, $data);
}

if (isset($_GET['delete'])) {
    $idBank = $_GET['delete'];

    delete_bank($conn, $idBank);
}
