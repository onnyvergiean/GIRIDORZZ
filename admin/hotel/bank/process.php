<?php

require('./../../db_conn.php');
require('../functions/bank.php');


if (isset($_POST['submit'])) {
    $data = [
        "namaBank" => $_POST['namaBank'],
        "namaPemilik" => $_POST['namaPemilik'],
        "noRekening" => $_POST['noRekening'],
    ];
    add_bank($conn, $data);
}


if (isset($_POST['edit'])) {
    $data = [
        "namaBank" => $_POST['namaBank'],
        "namaPemilik" => $_POST['namaPemilik'],
        "noRekening" => $_POST['noRekening'],
        "idBank" => $_POST['idBank'],
        "oldImage" => $_POST['oldImage'],
    ];
    edit_bank($conn, $data);
}

if (isset($_GET['delete'])) {
    $idBank = $_GET['delete'];

    delete_bank($conn, $idBank);
}
