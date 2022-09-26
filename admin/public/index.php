<?php

/*
|--------------------------------------------------------------------------
| Load Auto Loader
|--------------------------------------------------------------------------
|
| Composer
|
*/
if (file_exists(__DIR__ . "/../../vendor/autoload.php")) {
    require_once __DIR__ . "/../../vendor/autoload.php";
} else {
    echo "Autoloader not found! " . basename(__FILE__);
}

/*
|--------------------------------------------------------------------------
| Load Models
|--------------------------------------------------------------------------
|
| Load all essential classes...
|
*/

use App\Model\Database;
use App\Model\Format;
use App\Model\UserLogin;

$db = new Database();
$fm = new Format();
//session_start();
// require_once '/../public/web/login.php';
// require_once '../helpers/formate.php';
// $fm = new Format();

$login_error = '';

if (isset($_POST['btnLogin'])) {
    $user_mail = $_POST['usermail'];
    $user_password = md5($_POST['userpass']);

    if (!empty($user_mail) === true) {
        if (!empty($_POST['userpass']) === true) {
            if (filter_var($user_mail, FILTER_VALIDATE_EMAIL)) {
                $login = new UserLogin();
                $login->user_login($user_mail, $user_password);
                header('Location:'.BASE_URL.'admin/admin.php');
                exit();
            } else {
                $login_error = 'Invalid email address!';
            }
        } else {
            $login_error = 'Password field is required!';
        }
    } else {
        $login_error = 'Mail field is required!';
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
    <link href="<?php echo BASE_URL; ?>admin/css/login/asset/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>admin/css/login/style.css" />
</head>

<body class="body-bg-black">
    <div class="container-fluid">
        <div class="row wapper">
            <div class="col-md-6">
                <div class="big-title">
                    <h1>Do you wanna <br />
                        <span class="red-text">try</span> anything<span class="red-text">?</span>
                    </h1>
                </div>
            </div>
            <div class="col-md-6">
                <div class="user-form-area">
                    <form class="test-form" action="" method="post">
                        <?php
                        if ($login_error != "") {
                            echo '<div class="alert alert-danger text-danger"><strong>Error: </strong> ' . $login_error . '</div>';
                        } elseif (isset($_GET['login_error'])) {
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
                        <a href="<?php echo BASE_URL; ?>admin/login-forget.php" class="nm-admin-login-for">Forget Password</a>

                        <button name="btnLogin" type="submit" id="" class="btn submit-button">Submit</button><br />

                    </form>

                </div>
            </div>
        </div>
    </div>

    <!--Bootstrap Js-->
    <script src="<?php echo BASE_URL; ?>admin/css/login/asset/js/bootstrap.min.js"></script>
</body>

</html>