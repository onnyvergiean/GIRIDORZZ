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
    $idBank = validate($data['idBank']);
    $nama = validate($data["nama"]);
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
                $sql = "INSERT INTO bank (idBank,  namaBank, idimageUrl) VALUES (NULL,'$idBank','$last_id','$nama',)";
                
    }
}
    }
}
function edit_bank($conn, $data)
{
    $nama = validate($data["nama"]);
    $idimgUrl = validate($data['idimgUrl']);
    $old_image = validate($data['oldImage']);
    $idBank = validate($data['idBank']);
    $targetDir = "images/";
    $fileName = $_FILES["file"]["name"];
    $targetFilePath = $targetDir . $fileName;

    if (!empty($fileName)) {
        move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath);
        unlink("images/$old_image");
        $update = "UPDATE imgurl SET imageUrl ='$fileName' WHERE imageId = '$idimgUrl' ";

        if ($conn->query($update) === TRUE) {
            $last_id = $conn->insert_id;
            $sql = $conn->query("UPDATE bank SET idimgUrl ='$last_id' , namaBank='$nama' WHERE idBank ='$idBank'");
            echo
            "<script>alert('Data Berhasil Diubah');location='show_bank.php?id=$idBank;</script>";
        } else {
            echo "<script>alert('Error');window.history.go(-1);</script>";
        }
    } else {
        $edit = "UPDATE bank SET namaBank='$nama' WHERE idBank='$idBank'";
        $queryEdit = mysqli_query($conn, $edit);
        if ($queryEdit) {
            echo
            "<script>alert('Data Berhasil Diubah');location='show_bank.php?id=$idBank;</script>";
        } else {
            echo "<script>alert('Error');window.history.go(-1);</script>";
        }
    }
}
function delete_bank($conn, $idBank)
{
    if (!empty($idBank)) {

        $conn->query("DELETE from fasilitas where idBank='$idBank'");

        echo
        "<script>alert('Data Berhasil Dihapus');location='show_bank.php?id=$idBank;</script>";
    }
}
