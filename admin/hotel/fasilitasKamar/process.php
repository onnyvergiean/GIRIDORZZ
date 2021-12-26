<?php

require '../../db_conn.php';

$statusMsg = '';
if (!empty($_POST)) {

    $nama = $_POST['nama'];
    $jumlah = $_POST['jumlah'];
    $targetDir = "images/";
    $fileName = basename($_FILES["file"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    if (isset($_POST['submit'])) {

        $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
        if (in_array($fileType, $allowTypes)) {
            // Upload file to server
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
                // Insert image file name into database
                $insert = "INSERT into imgurl (imageUrl) VALUES ('" . $fileName . "')";
                // if ($insert) {
                //     $statusMsg = "The file " . $fileName . " has been uploaded successfully.";
                // } else {
                //     $statusMsg = "File upload failed, please try again.";
                // }
                if ($conn->query($insert) === TRUE) {
                    $last_id = $conn->insert_id;
                    $sql = $conn->query("INSERT INTO fasilitas (idImageUrl, namaFasilitas, jumlahFasilitas) VALUES ('$last_id','$nama', '$jumlah')");
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                $statusMsg = "Sorry, there was an error uploading your file.";
            }
        }




        // if ($sql) {
        //     echo
        //     "<script>alert('Data Berhasil Ditambahkan');location='show_fasilitas.php';</script>";
        // } else {
        //     echo "<script>alert('Error');window.history.go(-1);</script>";
        // }
        echo $statusMsg;
    } else if (isset($_POST['edit'])) {
        $idFasilitas = $_POST['id'];
        $edit = "UPDATE fasilitas SET namaFasilitas='$nama', jumlahFasilitas='$jumlah' WHERE idFasilitas='$idFasilitas'";
        $queryEdit = mysqli_query($conn, $edit);

        if ($queryEdit) {
            echo
            "<script>alert('Data Berhasil Diubah');location='show_fasilitas.php';</script>";
        } else {
            echo "<script>alert('Error');window.history.go(-1);</script>";
        }
    }
} else if (!empty($_GET)) {
    if ($_GET['action'] == 'hapus') {
        $idFasilitas = $_GET['id'];

        mysqli_query($conn, "DELETE from fasilitas where idFasilitas='$idFasilitas'");

        header('location:show_fasilitas.php');
    }
}
