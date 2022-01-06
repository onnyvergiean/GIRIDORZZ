<?php

function validate($data){
    $data = trim($data);
    $data = strip_tags($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}

function add_diskon($conn, $data)
{
    $nama = validate($data["namaDiskon"]);
     $idKamar = validate($data["idKamar"]);
    $deskripsi = validate($data["deskripsi"]);
    
        $conn->query("INSERT INTO diskon (`namaDiskon` ,`idKamar`, `deskripsi`) VALUES ('$nama', '$idKamar', '$deskripsi')");

  
}
function edit_diskon($conn, $data)
{
    $namaDiskon = validate($data["namaDiskon"]);
    $idKamar = validate($data["idKamar"]);
    $deskripsi = validate($data["deskripsi"]);

        $conn->query("UPDATE diskon SET namaDiskon='$namaDiskon', idKamar='$idKamar', deskripsi='$deskripsi'");

function delete_diskon($conn, $idDiskon)
{
        $conn->query ("DELETE FROM `diskon`");

            header("location:./news/diskon.php?id=$idDiskon");
        }
    }
