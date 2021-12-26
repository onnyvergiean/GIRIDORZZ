<?php

require('./../../db_conn.php');
require('../functions/fasilitas_kamar.php');


if (isset($_POST['submit'])) {
    $data = [
        "nama" => $_POST['nama'],
        "jumlah" => $_POST['jumlah'],
        "idKamar" => $_POST['idKamar'],
    ];
    add_fasilitas($conn, $data);
}


if (isset($_POST['edit'])) {
    $data = [
        "nama" => $_POST['nama'],
        "jumlah" => $_POST['jumlah'],
        "idImage" => $_POST['idImage'],
        "oldImage" => $_POST['oldImage'],
        "id" => $_POST['id'],
        "idKamar" => $_POST['idKamar'],
    ];
    edit_fasilitas($conn, $data);
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $idKamar = $_GET['id'];

    delete_fasilitas($conn, $id, $idKamar);
}
