<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Register Form User</title>
    <link rel="stylesheet" href="./Assets/css/details.css">
</head>

<body style="background-color: rgb(238, 238, 238);">
    <div class="container">
        <div class="row my-4 mx-4" style="background: white; border-radius: 30px;">
            <div class="col">
                <img src="./Assets/Images/hero.png" class="img-fluid" alt="">
                <a href="#"><img src="./Assets/Images/Standard Collection 15.png" class="img-logo" alt=""></a>
                <div class="welcome-text">
                    <p style="color:#ffffff;">WELCOME <br>TO <span style="color: #f0b828; ">GIRIDORZZ</span></p>
                </div>
            </div>
            <!-- form register -->
            <div class="col-md-6 px-5">
                <div class="w-100">
                    <h3 class="fw-bold mt-5 my-4">Sign Up</h3>
                </div>
                <form class="row g-3">
                    <p>If you already have an account register<br>
                        You can <a href="login.php" class="link-warning" style="text-decoration:none">login here !</a></p>

                    <div class="col-12">
                        <label for="exampleInputUsername1" class="form-label">Username</label>
                        <input type="text" class="form-control" id="exampleInputUsername1">
                    </div>
                    <div class="col-12">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="col-6">
                        <label for="exampleInputPhone1" class="form-label">Phone</label>
                        <input type="number" class="form-control" id="exampleInputPhone1">
                    </div>
                    <div class="col-6">
                        <label for="exampleInputAddress1" class="form-label">Address</label>
                        <input type="number" class="form-control" id="exampleInputAddress1">
                    </div>
                    <div class="col-12">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <p>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-warning btn-lg text-white fw-bold">Register</button>
                    </div>
                </form>
            </div>
            <!-- end form register -->
        </div>
    </div>





    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>