<?php

require('./../../db_conn.php');
require('../functions/diskon.php');


if (isset($_POST['submit'])) {
    $data = [
        "namaDiskon" => $_POST['namaDiskon'],
        "idKamar" => $_POST['idKamar'],
        "deskripsi" => $_POST['deskripsi'],

    ];
    add_diskon($conn, $data);
}

if (isset($_POST['edit'])) {
    $data = [
        "namaDiskon" => $_POST['namaDiskon'],
        "idKamar" => $_POST['idKamar'],
        "deskripsi" => $_POST['deskripsi'],
    ];
    edit_diskon($conn, $data);
}

if (isset($_GET['delete'])) {
    $idDiskon = $_GET['delete'];

    delete_diskon($conn, $idDiskon);
}
