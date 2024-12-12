<?php
$login = false;
$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '_dbconnect.php';
    $username = $_POST["username"];
    $password = $_POST["password"];


    // $sql = "Select * from users where username='$username' AND password='$password'";
    $sql = "Select * from user where username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1) {
        $login = true;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("location: 1.php");
    } else {
        $showError = "Invalid Credentials";
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="./style1.css" />
</head>

<body>
    <?php require '_nav.php' ?>
    <?php
    if ($login) {
        echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> You are logged in
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    }
    if ($showError) {
        echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> ' . $showError . '
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    }
    ?>

    <div class="container my-4">
        <h1 class="text-center">Login to our website</h1>
        <form action="/crud/login.php" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">

            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>


            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
    </div>
    
    </div>
    <div class="image-container">
        <img class="footer-image" src="img/log.svg" alt="Footer Image">
</div>
<style>
    .image-container {
  display: flex;
  align-items: right;
  justify-content: right;
  height: 30vh; /* Set the height of the container to the viewport height */
 
}

.footer-image {
    
  width: 50%;
  height: 82vh; /* Adjust the height as needed */
  object-fit: cover;
  position: fixed;
  bottom: 0;
  z-index: 1;
  animation: moveRight 1s forwards; /* Add animation */
}
/* Animation keyframes */
@keyframes moveRight {
            0% {
                transform: translateX(-100%); /* Initial position, outside the left side */
            }
            100% {
                transform: translateX(0); /* Final position, fully visible */
            }
        }
  </style>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>