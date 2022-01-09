<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="./Assets/Images/logo.png" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./Assets/css/details.css">

    <title>GIRIDORZZ</title>
</head>

<body>
    <?php
    require_once('header.php');

    $hotel = [];
    $rooms = [];
    $fasilities = [];

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = mysqli_query($conn, "SELECT imgurl.imageUrl, hotel.*, (SELECT MIN(kamar.hargaKamar) FROM kamar WHERE kamar.hotelId=hotel.idHotel) as harga FROM imgUrl JOIN hotel ON imgUrl.hotelId=hotel.idHotel WHERE hotelId=$id");
        $hotel = mysqli_fetch_array($query);

        $query = mysqli_query($conn, "SELECT kamar.*, imgurl.imageUrl FROM `kamar` INNER JOIN imgurl ON imgurl.kamarId=kamar.idKamar WHERE kamar.hotelId=$id");
        while ($data = mysqli_fetch_array($query)) {
            $rooms[] =  $data;
        }

        $query = mysqli_query($conn, "SELECT * FROM `fasilitas` WHERE fasilitas.hotelId=$id");
        while ($data = mysqli_fetch_array($query)) {
            $fasilities[] =  $data;
        }
    }

    ?>

    <section class="container">
        <div class="row">
            <div class="col-4">
                <ol class="breadcrumb ml-auto">
                    <li class="breadcrumb-item"><a href="#">History</a></li>
                    <li class="breadcrumb-item active"><a href="#">History Transaksi</a></li>
                </ol>
            </div>
            <div class="col-4 text-center justify-content-center">
                <h1 class="h2">History Transaksi</h1>
                <span style="color: #605858;">
                    Indonesia
                </span>
            </div>
        </div>
    </section><br>

    <header>
        <nav>
            <section class="container">
                <div class="row">
                    <div>
                        <span style="color: #1789e660;" class="list-text-icon">Best Prize</span>
                    </div>
                    <div class="card-hotel">
                        <div class="rating">4.5</div>
                        <div class="price">Rp. 200.000/malam</div>
                        <img src="Assets/Images/imgBedroom.png" alt="">
                        <div class="layer-shadow">
                            <h5>Ocean Land</h5>
                            <h7>Bandung, Indonesia</h7>
                        </div>
                    </div>
                </div><br><br>
            </section>
        </nav>
        <nav class="navbar navbar-expand-lg navbar-light container">
            <section class="container">
                <div>
                    <table>
                        <tr>
                            <td>
                                <span style="color: #804040;" class="list-text-icon">Deluxe Room</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span style="color: #000000;" class="history-text-icon">20 dec - 23 dec 1 orang</span>
                            </td>
                        </tr>
                    </table>
                </div>
            </section>
        </nav>
        <nav class="navbar navbar-expand-lg navbar-light container">
            <section class="container">
                <div>
                    <span style="color: #000000;" class="history-text-icon">Asyraf Rizqullah</span>
                </div>
            </section>
        </nav>
    </header>

    <header>
        <nav>
            <section class="container">
                <div class="row">
                    <div>
                        <span style="color: #1789e660;" class="list-text-icon">Best Prize</span>
                    </div>
                    <div class="card-hotel">
                        <div class="rating">4.5</div>
                        <div class="price">Rp. 200.000/malam</div>
                        <img src="Assets/Images/imgBedroom.png" alt="">
                        <div class="layer-shadow">
                            <h5>Ocean Land</h5>
                            <h7>Bandung, Indonesia</h7>
                        </div>
                    </div>
                </div><br><br>
            </section>
        </nav>
        <nav class="navbar navbar-expand-lg navbar-light container">
            <section class="container">
                <div>
                    <table>
                        <tr>
                            <td>
                                <span style="color: #804040;" class="list-text-icon">Deluxe Room</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span style="color: #000000;" class="history-text-icon">20 dec - 23 dec 1 orang</span>
                            </td>
                        </tr>
                    </table>
                </div>
            </section>
        </nav>
        <nav class="navbar navbar-expand-lg navbar-light container">
            <section class="container">
                <div>
                    <span style="color: #000000;" class="history-text-icon">Asyraf Rizqullah</span>
                </div>
            </section>
        </nav>
    </header>

    <header>
        <nav>
            <section class="container">
                <div class="row">
                    <div>
                        <span style="color: #1789e660;" class="list-text-icon">Best Prize</span>
                    </div>
                    <div class="card-hotel">
                        <div class="rating">4.5</div>
                        <div class="price">Rp. 200.000/malam</div>
                        <img src="Assets/Images/imgBedroom.png" alt="">
                        <div class="layer-shadow">
                            <h5>Ocean Land</h5>
                            <h7>Bandung, Indonesia</h7>
                        </div>
                    </div>
                </div><br><br>
            </section>
        </nav>
        <nav class="navbar navbar-expand-lg navbar-light container">
            <section class="container">
                <div>
                    <table>
                        <tr>
                            <td>
                                <span style="color: #804040;" class="list-text-icon">Deluxe Room</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span style="color: #000000;" class="history-text-icon">20 dec - 23 dec 1 orang</span>
                            </td>
                        </tr>
                    </table>
                </div>
            </section>
        </nav>
        <nav class="navbar navbar-expand-lg navbar-light container">
            <section class="container">
                <div>
                    <span style="color: #000000;" class="history-text-icon">Asyraf Rizqullah</span>
                </div>
            </section>
        </nav>
    </header>

<<<<<<< HEAD
    <?php require_once('footer.php')?>
=======
    <?php
    require_once('footer.php');
    ?>
</body>

</html>
>>>>>>> a4adcde0a36c36a36eea278fa129f03e7a4329d5
