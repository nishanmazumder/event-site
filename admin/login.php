<?php
include '../lib/Session.php';
Session::loginCheck();
include '../lib/Database.php';
include '../config/config.php';
include '../helpers/formate.php';

$post_show = new Database();
$format = new Format();
?>

<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
    <div class="container">
        <section id="content">

            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $user = $format->validation($_POST['username']);
                $pass = $format->validation(md5($_POST['password']));

                $user = mysqli_real_escape_string($post_show->link, $user);
                $pass = mysqli_real_escape_string($post_show->link, $pass);

                $query = "SELECT * FROM eve_user WHERE nm_username='$user' AND nm_password = '$pass'";
                $result = $post_show->select($query);

                if ($result != FALSE) {
                    $value = mysqli_fetch_assoc($result);
                    
                    Session::set('login', TRUE);
                    Session::set("user", $value['nm_username']);
                    Session::set("userId", $value['id']);
                    Session::set("userRole", $value['role']);
                    header("Location: index.php");
                    
                } else {
                    echo '<p style="color: red;">User or Password dose not match</p>';
                }
            }
            ?>

            <form action="login.php" method="post">
                <h1>Admin Login</h1>
                <div>
                    <input type="text" placeholder="Username" required="" name="username"/>
                </div>
                <div>
                    <input type="password" placeholder="Password" required="" name="password"/>
                </div>
                <div>
                    <input type="submit" value="Log in" />
                </div>
            </form><!-- form -->
            <div class="button">
                <a href="login-forget.php">Forget Password</a>
            </div><!-- button -->
        </section><!-- content -->
    </div><!-- container -->
</body>
</html>