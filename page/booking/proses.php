<?php
// memasukkan data ke database

function coba($data)
{
    $data = trim($data); // " String   " -> "String"
    $data = stripslashes($data); // " \n \fsaf" -> "n fsaf"
    $data = htmlspecialchars($data); // "<a>Link</a>" -> "&lt;a&gt;Link&lt;/a&gt;"
    return $data;
}

if (!empty($_POST)) {
    // memasukkan data dari user ke dalam variabel
    $nama = coba($_POST['nama']);
    $email = coba($_POST['email']);
    $telphone = coba($_POST['telphone']);
    $tanggal = coba($_POST['tanggal']);

    // membangun koneksi ke database
    $conn = mysqli_connect("localhost", "root", "", "reservationhotel");

    if (isset($_POST['submit'])) {

        // memasukkan data ke database
        $sql = "INSERT INTO konsumen (nama, email, telphone, tanggal) VALUES ('$nama',  '$email' , '$telphone', '$tanggal' )";

        $query = mysqli_query($conn, $sql);


        if ($query) {
            echo "<script>alert('Data berhasil ditambahkan');location='next-step.php';</script>";
        } else {
            echo "<script>alert('Error');window.history.go(-1);</script>";
        }
    }
}

function step2($data)
{
    $data = trim($data); // " String   " -> "String"
    $data = stripslashes($data); // " \n \fsaf" -> "n fsaf"
    $data = htmlspecialchars($data); // "<a>Link</a>" -> "&lt;a&gt;Link&lt;/a&gt;"
    return $data;
}

if (!empty($_POST)) {
    // memasukkan data dari user ke dalam variabel
    $namaBank = step2($_POST['namaBank']);
    $namaPemilik = step2($_POST['namaPemilik']);
    $noRekening = step2($_POST['noRekening']);
    $imageUrl = step2($_POST['imageUrl']);
    // membangun koneksi ke database
    $conn = mysqli_connect("localhost", "root", "", "reservationhotel");

    if (isset($_POST['submit'])) {

        // memasukkan data ke database
        $sql = "INSERT INTO bank (namaBank, namaPemilik, noRekening, imageUrl) VALUES ('$namaBank','$namaPemilik','$noRekening','$imageUrl')";

        $query = mysqli_query($conn, $sql);


        if ($query) {
            echo "<script>alert('Data berhasil ditambahkan');location='booking-status.php';</script>";
        } else {
            echo "<script>alert('Error');window.history.go(-1);</script>";
        }
    }
}
