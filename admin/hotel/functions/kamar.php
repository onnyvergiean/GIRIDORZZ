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
    $targetDir = "imagesKamar/";
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
    $insertValuesSQL = '';
    $fileNames = array_filter($_FILES['files']['name']);
    if (!empty($fileNames)) {
        $kamar = "INSERT INTO kamar (hotelId, tipeKamar, deskripsiKamar, hargaKamar, jumlahKamar) VALUES ('$idHotel','$tipe', '$deskripsi','$harga',$jumlah)";
        if ($conn->query($kamar) === TRUE) {
            $last_id = $conn->insert_id;
        }
        foreach ($_FILES['files']['name'] as $key => $val) {
            // File upload path 
            $fileName = basename($_FILES['files']['name'][$key]);
            $targetFilePath = $targetDir . $fileName;

            // Check whether file type is valid 
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
            if (in_array($fileType, $allowTypes)) {
                // Upload file to server 
                if (move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)) {
                    // Image db insert sql 
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
            // Insert image file name into database 
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


    $targetDir = "imagesKamar/";
    $insertValuesSQL = '';
    $fileNames = array_filter($_FILES['files']['name']);
    if (!empty($fileNames)) {



        $conn->query("UPDATE kamar SET hotelId='$idHotel', tipeKamar='$tipe', deskripsiKamar='$deskripsi', hargaKamar='$harga', jumlahKamar='$jumlah' where idkamar='$idKamar'");
        $conn->query("DELETE  FROM imgurl WHERE kamarId = $idKamar");
        foreach ($_FILES['files']['name'] as $key => $val) {

            $fileName = basename($_FILES['files']['name'][$key]);
            $targetFilePath = $targetDir . $fileName;

            move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath);


            $insertValuesSQL .= "('" . $fileName . "','" . $idKamar . "'),";
            $insertValuesSQL = trim($insertValuesSQL, ',');
            $conn->query("INSERT INTO imgurl (imageUrl,kamarId) VALUES $insertValuesSQL");
            echo
            "<script>alert('Data Berhasil Ditambahkan');location='kamar.php?id=$idHotel';</script>";
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
        $conn->query("DELETE FROM `kamar` WHERE idKamar=$id");


        header("location: ./kamar.php?id=$idHotel");
    }
}
