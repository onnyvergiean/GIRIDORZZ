<?php
function validate($data)
{
    $data = trim($data);
    $data = strip_tags($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}

function add_booking($conn, $data)
{
    $idTransaksi = validate($data["idTransaksi"]);
    $idUser = validate($data["idUser"]);
    $idHotel = validate($data["idHotel"]);
    $idKamar = validate($data["idKamar"]);
    $tglCheckin = validate($data["tglCheckin"]);
    $tglCheckout = validate($data["tglCheckout"]);
    $Status = validate($data["Status"]);
    $invoice = validate($data["invoice"]);
    $totalHarga = validate($data["totalHarga"]);


    $insert = $conn->query("INSERT INTO transaksi (`idTransaksi` ,`idUser`,`idHotel`, `idKamar`, `tglCheckin`, `tglCheckout`, `Status`, `invoice`, `totalHarga`) VALUES ('$idTransaksi', '$idUser','$idHotel', '$idKamar', '$tglCheckin', '$tglCheckout', '$Status', '$invoice', '$totalHarga')");
    if ($insert) {
        echo
        "<script>alert('Data Berhasil Ditambahkan');location='booking.php';</script>";
    } else {
        "<script>alert('Maaf Data Tidak Berhasil Ditambahkan');location='booking.php';</script>";
    }
}
function edit_booking($conn, $data)
{
    $idTransaksi = validate($data["idTransaksi"]);
    $idUser = validate($data["idUser"]);
    $idHotel = validate($data["idHotel"]);
    $idKamar = validate($data["idKamar"]);
    $tglCheckin = validate($data["tglCheckin"]);
    $tglCheckout = validate($data["tglCheckout"]);
    $Status = validate($data["Status"]);
    $invoice = validate($data["invoice"]);
    $totalHarga = validate($data["totalHarga"]);

    $edit = $conn->query("UPDATE transaksi SET idTransaksi='$idTransaksi',idUser='$idUser', idHotel ='$idHotel', idKamar ='$idKamar', tglCheckin ='$tglCheckin', tglCheckout ='$tglCheckout', invoice ='$invoice', Status ='$Status', totalHarga ='$totalHarga' WHERE idTransaksi = '$idTransaksi' ");

    if ($edit) {
        echo
        "<script>alert('Data Berhasil Diedit');location='news.php';</script>";
    } else {
        "<script>alert('Maaf Data Tidak Berhasil Diedit');location='news.php';</script>";
    }
}
function delete_booking($conn, $idTransaksi)
{
    if (!empty($idTransaksi)) {

        $conn->query("DELETE from transaksi where idTransaksi='$idTransaksi'");

        echo
        "<script>alert('Data Berhasil Dihapus');location='show_booking.php?id=$idTransaksi;</script>";
    }
}
