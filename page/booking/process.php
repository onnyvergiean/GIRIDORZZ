<?php
session_start();
require("../../database/connection.php");
$nama = '';
$email = '';
if (isset($_SESSION['logged_in'])) {
    $nama = $_SESSION['nama'];
    $email = $_SESSION['email'];
}

if (isset($_POST['submit'])) {

    $fullName = $_SESSION['fullName'];
    $emailUser = $_SESSION['emailUser'];
    $telphone = $_SESSION['telphone'];
    $startDate = $_SESSION['startDate'];
    $endDate = $_SESSION['endDate'];
    $namaBank = $_POST['namaBank'];
    $namaPengirim = $_POST['namaPengirim'];
    $invoice = $_POST['invoice'];
    $totalHarga = $_POST['totalHarga'];
    $idKamar = $_POST['idKamar'];
    $idHotel = $_POST['idHotel'];
    $idUser = $_POST['idUser'];

    $targetDir = "../../Assets/Images/booking/";
    $fileName = microtime() . $_FILES["file"]["name"];
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif');


    if (in_array($fileType, $allowTypes)) {
        move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath);
        $result = $conn->query("INSERT INTO transaksi ( idUser,idHotel, idKamar, status, tglCheckin, namaLengkap, email, noTelp, tglCheckout, invoice, totalHarga, namaBank, buktiTransfer) 
        VALUES ('$idUser ','$idHotel ', '$idKamar','Proses', '$startDate','$fullName' ,  '$emailUser' , '$telphone' ,'$endDate' ,'$invoice' ,'$totalHarga' ,'$namaBank ','$fileName')");
        if ($result) {
            header("Location: booking-status.php?inv=$invoice");
        } else {
            echo "<script>alert('Error');window.history.go(-1);</script>";
        }
    } else {
        echo "<script>alert('Format file harus jpg,png,jpeg,gif');window.history.go(-1);</script>";
    }
}
