<?php
function validate($data)
{
    $data = trim($data);
    $data = strip_tags($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}

function add_hotel($conn, $data)
{
    $nama = validate($data["nama"]);
    $lokasi = validate($data["lokasi"]);
    $rating = validate($data["rating"]);
    $deskripsi = validate($data["deskripsi"]);
    $targetDir = "../../Assets/Images/hotel/";
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
    $insertValuesSQL = '';
    $fileNames = array_filter($_FILES['files']['name']);
    if (!empty($fileNames)) {
        $hotel = "INSERT INTO hotel ( namaHotel, kotaHotel, deskripsiHotel, ratingHotel) VALUES ('$nama', '$lokasi', '$deskripsi', $rating)";
        if ($conn->query($hotel) === TRUE) {
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
                    // echo "<script>alert('Error');window.history.go(-1);</script>";
                }
            } else {
                // echo "<script>alert('Error');window.history.go(-1);</script>";
            }
        }

        if (!empty($insertValuesSQL)) {
            $insertValuesSQL = trim($insertValuesSQL, ',');
            $insert = $conn->query("INSERT INTO imgurl (imageUrl,hotelId) VALUES $insertValuesSQL");
            if ($insert) {
                echo "<script>alert('Data Berhasil Ditambahkan');location='hotel.php';</script>";
            } else {
                // echo "<script>alert('Error');window.history.go(-1);</script>";
            }
        } else {
            // echo "<script>alert('Error');window.history.go(-1);</script>";
        }
    } else {
        // echo "<script>alert('Error');window.history.go(-1);</script>";
    }
}

function edit_hotel($conn, $data)
{
    $nama = validate($data["nama"]);
    $lokasi = validate($data["lokasi"]);
    $deskripsi = validate($data["deskripsi"]);
    $rating = validate($data["rating"]);
    $idHotel = validate($data["idHotel"]);
    $targetDir = "imagesHotel/";
    $insertValuesSQL = '';
    $fileNames = array_filter($_FILES['files']['name']);
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
    $image = mysqli_query($conn, "SELECT * from imgurl where hotelId = $idHotel");
    while ($data = mysqli_fetch_array($image)) {
        $rows[] = $data;
    }
    if (!empty($fileNames) && $allowTypes) {
        if(!empty($rows)) {
            foreach ($rows as $row) {
                $imageUrl =  $row['imageUrl'];
                unlink("imagesHotel/$imageUrl");
                $conn->query("DELETE from imgurl where hotelId='$idHotel'");
            }
        }
        $conn->query("UPDATE hotel SET namaHotel='$nama', deskripsiHotel='$deskripsi', kotaHotel='$lokasi', ratingHotel='$rating' where idHotel='$idHotel'");
        foreach ($_FILES['files']['name'] as $key => $val) {
            $fileName = microtime() . basename($_FILES['files']['name'][$key]);
            $targetFilePath = $targetDir . $fileName;
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
            if (in_array($fileType, $allowTypes)) {
                if (move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)) {

                    $insertValuesSQL .= "('" . $fileName . "','" . $idHotel . "'),";
                } else {
                    echo "<script>alert('Error');window.history.go(-1);</script>";
                }
            } else {
                echo "<script>alert('Error');window.history.go(-1);</script>";
            }
        }

        if (!empty($insertValuesSQL)) {
            $insertValuesSQL = trim($insertValuesSQL, ',');
            $insert = $conn->query("INSERT INTO imgurl (imageUrl,hotelId) VALUES $insertValuesSQL");
            if ($insert) {
                echo
                "<script>alert('Data Berhasil Ditambahkan');location='hotel.php';</script>";
            } else {
                echo "<script>alert('Error');window.history.go(-1);</script>";
            }
        } else {
            echo "<script>alert('Error');window.history.go(-1);</script>";
        }
    } else {
        $kamar = "UPDATE hotel SET namaHotel='$nama', deskripsiHotel='$deskripsi', kotaHotel='$lokasi', ratingHotel='$rating' where idHotel='$idHotel'";
        $queryEdit = mysqli_query($conn, $kamar);
        if ($queryEdit) {
            echo
            "<script>alert('Data Berhasil Diubah');location='hotel.php';</script>";
        } else {
            echo "<script>alert('Error');window.history.go(-1);</script>";
        }
    }
}

function delete_hotel($conn, $id)
{
    if (!empty($id)) {
        $result = mysqli_query($conn, "SELECT imageUrl from imgurl where kamarId='$id'");
        while ($data = mysqli_fetch_array($result)) {
            unlink("imagesHotel/$data[imageUrl]");
        }
        $conn->query("DELETE from hotel where idHotel='$id'");
        echo
        "<script>alert('Data Berhasil Dihapus');location='hotel.php';</script>";
    } else {
        echo "<script>alert('Error');window.history.go(-1);</script>";
    }
}
