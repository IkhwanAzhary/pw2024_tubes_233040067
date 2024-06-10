<?php 
session_start();
require 'functions.php';

if( isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    $result = mysqli_query($conn, "SELECT username FROM user WHERE id = $id");
    $row = mysqli_fetch_assoc($result);

    if( $key === hash('sha256', $row['username'])) {
        $_SESSION['login'] = true;
    }
}

if( isset($_SESSION["login"])) {
    header("Location: ../index.php");
    exit;
}


    if( isset($_POST["login"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

        if( mysqli_num_rows($result) === 1 ) {
            $row = mysqli_fetch_assoc($result);
            if(password_verify($password, $row["password"]) ){
                $_SESSION["login"] = true;

                if( isset($_POST['remember'])) {
                    setcookie('id', $row['id'], time() + 60);
                    setcookie('key', hash('sha256', $row['username']), time()+60);
                }

                header("Location: admin.php");
                exit;
            }
        }

        $error = true;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link rel="stylesheet" href="../css/style-login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

    <?php if( isset($error)): ?>
        <p  style="color: red; font-style: italic;">username / password salah</p>
    <?php endif; ?>

    <form action="" method="post">
        <div class="login-box">
            <div class="login-header">
                <header style="color: black">Login</header>
            </div>
            <div class="input-box">
                <input type="text" class="input-field" name="username" id="username" placeholder="username">
            </div>
            <div class="input-box">
                <input type="password" class="input-field" name="password" id="password" placeholder="password">
            </div>
            <div class="forgot">
                <section>
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember" class="remem">Remember me</label>
                    <a href="registrasi.php">Register</a>
                </section>
            </div>
            <div class="input-submit">
                <button class="submit-btn" type="submit" name="login">Login</button>
            </div>
            <div class="col-6 mx-auto">
                <a href="../index.php" class="btn btn-danger d-flex justify-content-center">Back</a>
            </div>
        </div>

    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>