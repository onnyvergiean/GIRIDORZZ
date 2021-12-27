<?php
function validate($data)
{
    $data = trim($data);
    $data = strip_tags($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}

function add_fasilitas($conn, $data)
{
    $nama = validate($data["nama"]);
    $jumlah = validate($data["jumlah"]);
    $idHotel = validate($data['idHotel']);
    $idKamar = validate($data['idKamar']);
    $targetDir = "images/";
    $fileName = $_FILES["file"]["name"];
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
    if (in_array($fileType, $allowTypes)) {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
            $insert = "INSERT into imgurl (imageUrl) VALUES ('" . $fileName . "')";
            if ($conn->query($insert) === TRUE) {
                $last_id = $conn->insert_id;
                $sql = "INSERT INTO fasilitas (hotelId, kamarId,idImageUrl, namaFasilitas, jumlahFasilitas) VALUES (NULL,'$idKamar','$last_id','$nama', '$jumlah')";
                if ($conn->query($sql) === TRUE) {
                    $newIdfasilitas = $conn->insert_id;
                    $conn->query("UPDATE kamar SET idFasilitas = '$newIdfasilitas' WHERE idKamar = '$idKamar'");
                }
                echo
                "<script>alert('Data Berhasil Ditambahkan');location='show_fasilitas.php?id=$idKamar&idHotel=$idHotel';</script>";
            } else {
                echo "<script>alert('Error');window.history.go(-1);</script>";
            }
        } else {
            echo "<script>alert('Error');window.history.go(-1);</script>";
        }
    }
}
function edit_fasilitas($conn, $data)
{
    $nama = validate($data["nama"]);
    $jumlah = validate($data["jumlah"]);
    $idImage = validate($data['idImage']);
    $old_image = validate($data['oldImage']);
    $idFasilitas = validate($data['id']);
    $idHotel = validate($data['idHotel']);
    $idKamar = validate($data['idKamar']);
    $targetDir = "images/";
    $fileName = $_FILES["file"]["name"];
    $targetFilePath = $targetDir . $fileName;

    if (!empty($fileName)) {
        move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath);
        unlink("images/$old_image");
        $update = "UPDATE imgurl SET imageUrl ='$fileName' WHERE imageId = '$idImage' ";

        if ($conn->query($update) === TRUE) {
            $last_id = $conn->insert_id;
            $sql = $conn->query("UPDATE fasilitas SET idImageUrl ='$last_id' , namaFasilitas='$nama', jumlahFasilitas = '$jumlah' WHERE idFasilitas ='$idFasilitas'");
            echo
            "<script>alert('Data Berhasil Diubah');location='show_fasilitas.php?id=$idKamar&idHotel=$idHotel';</script>";
        } else {
            echo "<script>alert('Error');window.history.go(-1);</script>";
        }
    } else {
        $edit = "UPDATE fasilitas SET namaFasilitas='$nama', jumlahFasilitas='$jumlah' WHERE idFasilitas='$idFasilitas'";
        $queryEdit = mysqli_query($conn, $edit);
        if ($queryEdit) {
            echo
            "<script>alert('Data Berhasil Diubah');location='show_fasilitas.php?id=$idKamar&idHotel=$idHotel';</script>";
        } else {
            echo "<script>alert('Error');window.history.go(-1);</script>";
        }
    }
}
function delete_fasilitas($conn, $id, $idKamar, $idHotel)
{
    if (!empty($id)) {

        $conn->query("DELETE from fasilitas where idFasilitas='$id'");

        echo
        "<script>alert('Data Berhasil Dihapus');location='show_fasilitas.php?id=$idKamar&idHotel=$idHotel';</script>";
    }
}
