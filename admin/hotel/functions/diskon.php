<?php

function validate($data)
{
    $data = trim($data);
    $data = strip_tags($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}

function add_diskon($conn, $data)
{
    $namaDiskon = validate($data["namaDiskon"]);
    $idKamar = validate($data["idKamar"]);
    $jmlDiskon = validate($data["jmlDiskon"]);
    $deskripsi = validate($data["deskripsi"]);


    $insert = "INSERT INTO diskon (`namaDiskon` ,`idKamar`,`jmlhDiskon`, `deskripsiDiskon`) VALUES ('$namaDiskon', '$idKamar','$jmlDiskon', '$deskripsi')";
    if ($conn->query($insert) === TRUE) {
        $last_id = $conn->insert_id;
        echo
        "<script>alert('Data Berhasil Ditambahkan');location='news.php';</script>";
    } else {
        "<script>alert('Maaf Data Tidak Berhasil Ditambahkan');location='news.php';</script>";
    }
}
function edit_diskon($conn, $data)
{
    $namaDiskon = validate($data["namaDiskon"]);
    $jmlDiskon = validate($data["jmlDiskon"]);
    $deskripsi = validate($data["deskripsi"]);
    $idDiskon = validate($data["idDiskon"]);

    $edit = $conn->query("UPDATE diskon SET namaDiskon='$namaDiskon',jmlhDiskon='$jmlDiskon', deskripsiDiskon ='$deskripsi' WHERE idDiskon = '$idDiskon' ");

    if ($edit) {
        echo
        "<script>alert('Data Berhasil Diedit');location='news.php';</script>";
    } else {
        "<script>alert('Maaf Data Tidak Berhasil Diedit');location='news.php';</script>";
    }
}

function delete_diskon($conn, $id)
{
    if (!empty($id)) {

        $delete = $conn->query("DELETE from diskon where idDiskon ='$id'");

        if ($delete) {
            echo
            "<script>alert('Data Berhasil Dihapus');location='news.php';</script>";
        } else {
            "<script>alert('Maaf Data Tidak Berhasil Dihapus');location='news.php';</script>";
        }
    }
}
