<?php
function validate($data)
{
    $data = trim($data);
    $data = strip_tags($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}

function add_bank($conn, $data)
{
    $namaBank = validate($data['namaBank']);
    $namaPemilik = validate($data["namaPemilik"]);
    $noRekening = validate($data["noRekening"]);
    $targetDir = "../../../Assets/Images/bank/";
    $fileName = microtime() . $_FILES["file"]["name"];
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
    if (in_array($fileType, $allowTypes)) {
        move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath);
        $result = $conn->query("INSERT INTO bank (namaBank, namaPemilik,noRekening, imageUrl) VALUES ('" . $namaBank . "','" . $namaPemilik . "','" . $noRekening . "','" . $fileName . "')");
        if ($result) {
            echo
            "<script>alert('Data Berhasil Ditambahkan');location='bank.php';</script>";
        } else {
            echo "<script>alert('Error');window.history.go(-1);</script>";
        }
    } else {
        echo "<script>alert('Error');window.history.go(-1);</script>";
    }
}

function edit_bank($conn, $data)
{
    $namaBank = validate($data["namaBank"]);
    $namaPemilik = validate($data["namaPemilik"]);
    $noRekening = validate($data["noRekening"]);
    $oldImage = validate($data['oldImage']);
    $idBank = validate($data['idBank']);
    $targetDir = "../../../Assets/Images/bank/";
    $fileName = microtime() . $_FILES["file"]["name"];
    $targetFilePath =  $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif');

    if (!empty($fileName) && in_array($fileType, $allowTypes)) {
        unlink("$targetDir/$oldImage");
        move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath);
        $update = $conn->query("UPDATE bank SET imageUrl ='$fileName' , namaBank='$namaBank', namaPemilik = '$namaPemilik',noRekening = '$noRekening' WHERE idBank ='$idBank'");
        if ($update) {
            echo
            "<script>alert('Data Berhasil Diubah');location='bank.php';</script>";
        } else {
            echo "<script>alert('Error');window.history.go(-1);</script>";
        }
    } else {
        $edit = $conn->query("UPDATE fasilitas SET namaBank='$namaBank', namaPemilik = '$namaPemilik',noRekening = '$noRekening' WHERE idBank='$idBank'");
        if ($edit) {
            echo
            "<script>alert('Data Berhasil Diubah');location='bank.php';</script>";
        } else {
            echo "<script>alert('Error');window.history.go(-1);</script>";
        }
    }
}
function delete_bank($conn, $idBank)
{
    if (!empty($idBank)) {
        $result = mysqli_query($conn, "SELECT imageUrl from bank where idBank='$idBank'");
        while ($data = mysqli_fetch_array($result)) {
            unlink("../../../Assets/Images/bank/$data[imageUrl]");
        }
        $conn->query("DELETE from bank where idBank='$idBank'");
        echo
        "<script>alert('Data Berhasil Dihapus');location='bank.php';</script>";
    } else {
        echo "<script>alert('Error');window.history.go(-1);</script>";
    }
}
