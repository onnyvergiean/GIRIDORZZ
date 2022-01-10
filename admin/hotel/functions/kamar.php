<?php
function validate($data)
{
    $data = trim($data);
    $data = strip_tags($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}

function add_kamar($conn, $data)
{
    $tipe = validate($data["tipe"]);
    $harga = validate($data["harga"]);
    $jumlah = validate($data["jumlah"]);
    $idHotel = validate($data["idHotel"]);
    $deskripsi = validate($data["deskripsi"]);
    $targetDir = "../../../Assets/Images/kamar/";
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'webp');
    $insertValuesSQL = '';
    $fileNames = array_filter($_FILES['files']['name']);
    if (!empty($fileNames) && $allowTypes) {
        $kamar = "INSERT INTO kamar (hotelId, tipeKamar, deskripsiKamar, hargaKamar, jumlahKamar) VALUES ('$idHotel','$tipe', '$deskripsi','$harga',$jumlah)";
        if ($conn->query($kamar) === TRUE) {
            $last_id = $conn->insert_id;
        }
        foreach ($_FILES['files']['name'] as $key => $val) {
            $fileName = microtime() . basename($_FILES['files']['name'][$key]);
            $targetFilePath = $targetDir . $fileName;
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
            if (in_array($fileType, $allowTypes)) {

                if (move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)) {

                    $insertValuesSQL .= "('" . $fileName . "','" . $last_id . "'),";
                } else {
                    echo "<script>alert('Error');window.history.go(-1);</script>";
                }
            } else {
                echo "<script>alert('Error');window.history.go(-1);</script>";
            }
        }

        if (!empty($insertValuesSQL)) {
            $insertValuesSQL = trim($insertValuesSQL, ',');
            $insert = $conn->query("INSERT INTO imgurl (imageUrl,kamarId) VALUES $insertValuesSQL");
            if ($insert) {
                echo
                "<script>alert('Data Berhasil Ditambahkan');location='kamar.php?id=$idHotel';</script>";
            } else {
                echo "<script>alert('Error');window.history.go(-1);</script>";
            }
        } else {
            echo "<script>alert('Error');window.history.go(-1);</script>";
        }
    } else {
        echo "<script>alert('Error');window.history.go(-1);</script>";
    }
}

function edit_kamar($conn, $data)
{
    $tipe = validate($data["tipe"]);
    $harga = validate($data["harga"]);
    $jumlah = validate($data["jumlah"]);
    $idHotel = validate($data["idHotel"]);
    $deskripsi = validate($data["deskripsi"]);
    $idKamar = validate($data['idKamar']);
    $targetDir = "../../../Assets/Images/kamar//";
    $insertValuesSQL = '';
    $fileNames = array_filter($_FILES['files']['name']);
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'webp');
    $image = mysqli_query($conn, "SELECT * from imgurl where kamarId = $idKamar");
    while ($data = mysqli_fetch_array($image)) {
        $rows[] = $data;
    }
    if (!empty($fileNames) && $allowTypes) {
        foreach ($rows as $row) {
            $imageUrl =  $row['imageUrl'];
            unlink("$targetDir/$imageUrl");
            $conn->query("DELETE from imgurl where kamarId='$idKamar'");
        }
        $conn->query("UPDATE kamar SET tipeKamar='$tipe', deskripsiKamar='$deskripsi', hargaKamar='$harga', jumlahKamar='$jumlah' where idkamar='$idKamar'");
        foreach ($_FILES['files']['name'] as $key => $val) {
            $fileName = microtime() . basename($_FILES['files']['name'][$key]);
            $targetFilePath = $targetDir . $fileName;
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
            if (in_array($fileType, $allowTypes)) {
                if (move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)) {

                    $insertValuesSQL .= "('" . $fileName . "','" . $idKamar . "'),";
                } else {
                    echo "<script>alert('Error');window.history.go(-1);</script>";
                }
            } else {
                echo "<script>alert('Error');window.history.go(-1);</script>";
            }
        }

        if (!empty($insertValuesSQL)) {
            $insertValuesSQL = trim($insertValuesSQL, ',');
            $insert = $conn->query("INSERT INTO imgurl (imageUrl,kamarId) VALUES $insertValuesSQL");
            if ($insert) {
                echo
                "<script>alert('Data Berhasil Ditambahkan');location='kamar.php?id=$idHotel';</script>";
            } else {
                echo "<script>alert('Error');window.history.go(-1);</script>";
            }
        } else {
            echo "<script>alert('Error');window.history.go(-1);</script>";
        }
    } else {
        $kamar = "UPDATE kamar SET tipeKamar='$tipe', deskripsiKamar='$deskripsi', hargaKamar='$harga', jumlahKamar='$jumlah' WHERE idkamar='$idKamar'";
        $queryEdit = mysqli_query($conn, $kamar);
        if ($queryEdit) {
            echo
            "<script>alert('Data Berhasil Diubah');location='kamar.php?id=$idHotel';</script>";
        } else {
            echo "<script>alert('Error');window.history.go(-1);</script>";
        }
    }
}

function delete_kamar($conn, $id, $idHotel)
{
    if (!empty($id)) {
        $result = mysqli_query($conn, "SELECT imageUrl from imgurl where kamarId='$id'");
        while ($data = mysqli_fetch_array($result)) {
            unlink("../../../Assets/Images/kamar/$data[imageUrl]");
        }
        $conn->query("DELETE from kamar where idKamar='$id'");
        echo
        "<script>alert('Data Berhasil Dihapus');location='kamar.php?id=$idHotel';</script>";
    } else {
        echo "<script>alert('Error');window.history.go(-1);</script>";
    }
}
