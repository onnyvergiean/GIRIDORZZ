<?php
session_start();
require("../../database/connection.php");

if (isset($_POST['submit'])) {

    $fullName = $_SESSION['fullName'];
    $email = $_SESSION['email'];
    $telphone = $_SESSION['telphone'];
    $startDate = $_SESSION['startDate'];
    $endDate = $_SESSION['endDate'];
    $namaBank = $_POST['namaBank'];
    $namaPengirim = $_POST['namaPengirim'];
    $invoice = $_POST['invoice'];
    $totalHarga = $_POST['totalHarga'];
    $idKamar = $_POST['idKamar'];
    $idHotel = $_POST['idHotel'];

    $targetDir = "../../Assets/Images/booking/";
    $fileName = microtime() . $_FILES["file"]["name"];
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif');


    if (in_array($fileType, $allowTypes)) {
        move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath);
        $result = $conn->query("INSERT INTO transaksi ( idHotel, idKamar, status, tglCheckin, namaLengkap, email, noTelp, tglCheckout, invoice, totalHarga, namaBank, buktiTransfer) 
        VALUES ('$idHotel ', '$idKamar','Proses', '$startDate','$fullName' ,  '$email' , '$telphone' ,'$endDate' ,'$invoice' ,'$totalHarga' ,'$namaBank ','$fileName')");
    } else {
        echo "<script>alert('Format file harus jpg,png,jpeg,gif');window.history.go(-1);</script>";
    }
}
