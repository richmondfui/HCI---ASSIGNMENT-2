<?php

$host = "localhost";
$user = "root";
$password = "";
$dbName = "loginpage_db";

$conn = mysqli_connect($host, $user, $password, $dbName);

if (!$conn) {
    die("Connection Failed" . mysqli_error($conn));
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $user_password = $_POST['password'];

    if (!empty($username) && !empty($user_password)) {
        $query = "SELECT * from users WHERE username = '{$username}'";

        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) === 1) {

            while ($row = mysqli_fetch_array($result)) {

                $db_user_id        = $row['id'];
                $db_username       = $row['username'];
                $db_user_password  = $row['password'];


                if ($db_user_password === $user_password) {
                    echo "You have been successfuly logged in!";
                    exit();
                } else {
                    echo "Your password is incorrect!";
                    exit();
                }
            }

        } else {
                echo "Your details can't be found in our database.";
                exit();
        }

    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="background">
        <div class="blue"></div>

        <div id="formContainer">
            <div class="form-header">
                <h3>WELCOME !</h3>
                <p>Login to continue</p>
            </div>
            <form action="" method="post" autocomplete="on">
                <div class="input-group focused">
                    <label for="username"><span class="fa fa-user fa-2x"></span></label>
                    <input type="text"  class="form-input" placeholder="Username" name="username" id="" required>
                </div>
                <div class="input-group">
                    <label for="password"><span alt="Icon" class="fa fa-lock fa-2x"></span></label>
                    <input type="password" class="form-input" placeholder="Password" name="password" id="" required>
                </div>
                <div class="input-group">
                    <input type="checkbox" name="" id=""> Remember me
                </div>
                <div class="input-group">
                    <button class="loginbtn" class="form-input" name="login" type="submit">LOGIN</button>
                </div>
                <div class="input-group">
                    <span>Don't have an account?</span><a class="link" href="#">create a new account</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>