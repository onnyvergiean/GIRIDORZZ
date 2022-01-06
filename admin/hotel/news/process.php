<?php

require('../../db_conn.php');
require('../functions/diskon.php');


if (isset($_POST['submit'])) {
    $data = [
        "namaDiskon" => $_POST['namaDiskon'],
        "idKamar" => $_POST['idKamar'],
        "jmlDiskon" => $_POST['jmlDiskon'],
        "deskripsi" => $_POST['deskripsi'],

    ];
    add_diskon($conn, $data);
}

if (isset($_POST['edit'])) {
    $data = [
        "namaDiskon" => $_POST['namaDiskon'],
        "jmlDiskon" => $_POST['jmlDiskon'],
        "deskripsi" => $_POST['deskripsi'],
        "idDiskon" => $_POST['idDiskon'],
    ];
    edit_diskon($conn, $data);
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    delete_diskon($conn, $id);
}
