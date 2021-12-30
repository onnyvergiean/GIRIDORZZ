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
            echo "<script>alert('Data Berhasil Ditambahkan');location='next-step.php';</script>";
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
    $linkBukti = step2($_POST['linkBukti']);
    $namaBank = step2($_POST['namaBank']);
    $namaPengirim = step2($_POST['namaPengirim']);

    // membangun koneksi ke database
    $conn = mysqli_connect("localhost", "root", "", "reservationhotel");

    if (isset($_POST['submit'])) {

        // memasukkan data ke database
        $sql = "INSERT INTO bank (linkBukti, namaBank, namaPengirim) VALUES ('$linkBukti',  '$namaBank' , '$namaPengirim' )";

        $query = mysqli_query($conn, $sql);


        if ($query) {
            echo "<script>alert('Data Berhasil Ditambahkan');location='booking-status.htmll';</script>";
        } else {
            echo "<script>alert('Error');window.history.go(-1);</script>";
        }
    } 

}

?>