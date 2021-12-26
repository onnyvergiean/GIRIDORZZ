<?php

$conn = mysqli_connect("localhost", "root", "", "reservationhotel");

if (!$conn) {
    die("Koneksi gagal : " . mysqli_connect_error());
}
