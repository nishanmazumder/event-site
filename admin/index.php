<?php
//session_start();
require_once '../lib/login.php';
require_once '../helpers/formate.php';
$fm = new Format();

$login_error = '';

if (isset($_POST['btnLogin'])) {
    $user_mail = $fm->validation($_POST['usermail']);
    $user_password = $fm->validation(md5($_POST['userpass']));

    if ($user_mail == "") {
        $login_error = 'Mail field is required!';
    } else if ($user_password == "") {
        $login_error = 'Password field is required!';
    } else if (!filter_var($user_mail, FILTER_VALIDATE_EMAIL)) {
        $login_error = 'Invalid email address!';
    } else {
        $login = new UserLogin();
        $login->user_login($user_mail, $user_password);
    }
}
?>

<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <title>Admin Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!--Bootstrap min css-->
        <link  href="css/login/asset/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
        <link rel="stylesheet" href="css/login/style.css" />
    </head>
    <body class="body-bg-black">
        <div class="container-fluid">
            <div class="row wapper">
                <div class="col-md-6">
                    <div class="big-title">
                        <h1>Do you wanna <br /> 
                            <span class="red-text">try</span> anything<span class="red-text">?</span></h1>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="user-form-area">
                        <form class="test-form" action="" method="post">
                            <?php
                            if ($login_error != "") {
                                echo '<div class="alert alert-danger text-danger"><strong>Error: </strong> ' . $login_error . '</div>';
                            } elseif (isset($_GET['login_error'])){
                                $_GET['login_error'] = 'Invalid Login';
                                echo '<div class="alert alert-danger text-danger"><strong>Error: </strong> ' . $_GET['login_error'] . '</div>';
                            }
                            
                            ?>
                            <div class="form-group">
                                <input name="usermail" type="email" class="form-control" id="" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input name="userpass" type="password" class="form-control" id="" placeholder="Password">
                            </div>
                            <a href="login-forget.php" class="nm-admin-login-for">Forget Password</a>
                            <button name="btnLogin" type="submit" id="" class="btn submit-button">Submit</button><br />

                        </form>

                    </div>
                </div>
            </div>
        </div>

        <!--Bootstrap Js-->
        <script src="css/login/asset/js/bootstrap.min.js"></script>
    </body>
</html>