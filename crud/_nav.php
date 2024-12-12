<?php
     if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        $loggedin = true;
    } else {
        $loggedin = false;
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Bradley Hand', cursive;
            font-size: 18px;
        }

        nav {
            background-image: linear-gradient(-45deg, #191970 0%, #900C3F 100%);
            /* background-color: #900C3F; */
            color: white;
            padding: 10px 20px;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin-right: 20px;
        }

        nav a:hover {
            text-decoration: underline;
            color: #FF725E;
        }

        .container {
            width: 80%;
            margin: 0 auto;
        }

        .nav-list {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
        }

        .nav-item {
            margin-right: 20px;
        }

        .nav-item:last-child {
            margin-right: 0;
        }
    </style>
</head>
<body>
    

    <nav>
        <div class="container">
           
            <ul class="nav-list">
                
            <div class="logo">
            <img src="image-removebg-preview.png" alt="img" width="50" height="50">
        </div>
                <li class="nav-item"> <a href="/crud/login.php">E-notes</a></li>
                <li class="nav-item"><a href="/crud/1.php">Home</a></li>

                <?php
                if (!$loggedin) {
                    echo '<li class="nav-item"><a href="/crud/login.php">Login</a></li>';
                    echo '<li class="nav-item"><a href="/crud/signup.php">Signup</a></li>';
                }
                if ($loggedin) {
                    echo '<li class="nav-item"><a href="/crud/logout.php">Logout</a></li>';
                }
                ?>
            </ul>
        </div>
    </nav>

</body>
</html>
