<?php
require_once('database/connection.php');
session_start();
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = mysqli_query($conn, "SELECT * FROM user WHERE email='$email' AND password='$password'");

    if (mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_array($query);
        $_SESSION['email'] = $data['email'];
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['logged_in'] = true;
        $message = '';
        header('location: index.php');
    } else {
        $message = '<p class="my-3 text-danger">Login Gagal</p>';
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Login Form User</title>
    <link rel="stylesheet" href="Assets/css/details.css">
</head>

<body style="background-color: rgb(238, 238, 238);">
    <div class="container">
        <div class="row my-4 mx-4" style="background: white; border-radius: 30px;">
            <div class="col-6">
                <img src="./Assets/Images/hero.png" class="img-fluid" alt="">
                <a href="#"><img src="./Assets/Images/Standard Collection 15.png" class="img-logo" alt=""></a>
                <div class="welcome-text">
                    <p style="color:#ffffff;">WELCOME <br>TO <span style="color: #f0b828; ">GIRIDORZZ</span></p>
                </div>
            </div>
            <!-- form login -->
            <div class="col-6 px-5">
                <div class=" w-100">
                    <h3 class="fw-bold mt-5 my-4">Sign In</h3>
                </div>
                <form class="row g-3" method="POST" action="">
                    <p>If you don't have an account register<br>
                        You can <a href="register.php" class="link-warning" style="text-decoration:none">register here
                            !</a></p>

                    <div class="col-12">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="email">
                    </div>
                    <div class="col-12">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                    </div>

                    <div class="d-grid">
                        <button name="submit" type="submit" class="btn btn-warning btn-lg text-white fw-bold">Login</button>
                    </div>
                </form>
                <?php
                if (!empty($message)) {
                    echo $message;
                    $message = '';
                }
                ?>
            </div>
            <!-- end form login -->
        </div>
    </div>





    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>