<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="/Assets/Images/logo.png" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../../Assets/css/details.css">

    <title>GIRIDORZZ</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light container justify-content-center">
            <a href="/details.html" class="brand-text-wrapper">
                <span class="brand-text-icon">GIRIDORZZ</span>
            </a>
        </nav>
    </header>
    <main class="container my-5 booking-kamar px-5">
        <div class="row justify-content-center">
            <div style="position: relative;">
                <button class="progress-number active">1</button>
                <button class="progress-number">2</button>
                <button class="progress-number">3</button>
            </div>

            <div class="col-12 text-center my-5">
                <h4>Booking Information</h4>
                <h5>Stark House</h5>
            </div>

            <div class="row justify-content-center">
                <div class="col-6">
                    <img src="/Assets/Images/imgBedroom.png" alt="" class="img-wrapper">
                    <div class="row my-2 align-items-center">
                        <div class="col-6">
                            <b>Deluxe Room</b> <br>
                            Free Wifi, AC
                        </div>
                        <div class="col-6">
                            <b>Rp.2.500.000</b> per <b>2 malam</b>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <form action="proses.php" method="post">
                        <div class="mb-3">
                            <label for="full-name" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="full-name" name="nama">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Alamat Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="phone-number" class="form-label">Nomor Handphone</label>
                            <input type="number" class="form-control" id="phone-number" name="telphone">
                        </div>
                        <div class="mb-3">
                            <label for="booking-date" class="form-label">Tanggal Reservasi</label>
                            <input type="date" class="form-control" id="booking-date" name="tanggal">
                        </div>
                        <div>
                            <button class="btn btn-warning nav-link my-3" href="#" type="submit" name="submit">Lanjut Booking</button>
                            <button class="btn btn-light nav-link my-3" href="detail-kamar.html">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src=" https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>