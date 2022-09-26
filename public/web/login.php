<?php

if (file_exists(__DIR__ . "/../../vendor/autoload.php")) {
    require_once __DIR__ . "/../../vendor/autoload.php";
} else {
    echo "Autoloader not found! - login.php";
}

if (file_exists(DIR . "/public/web/inc/header.php")) {
    include DIR . "/public/web/inc/header.php";
} else {
    echo "Header not found from Login page!";
}

use App\Model\Session;
use App\Model\Database;
use App\Model\Format;

Session::init();
$db = new Database();
$fm = new Format();
?>

<div class="container nm-section-single nm-checkout">
    <div class="row no-gutters justify-content-center">
        <div class="col-md-6 nm-check-form-section">

            <div class="nm-check-form">

                <?php
                if (isset($_POST['nm_forget_pass'])) {
                    $email = $fm->validation($_POST['nm_email']);
                    $email = mysqli_real_escape_string($db->link, $email);

                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        echo "Mail not valid";
                    } else {
                        $mailCheck = "SELECT * FROM eve_user WHERE nm_email = '$email' LIMIT 1";
                        $result = $db->select($mailCheck);

                        if ($result != FALSE) {
                            while ($value = $result->fetch_assoc()) {
                                $userId = $value['id'];
                                $userName = $value['nm_username'];
                            }

                            // New Password
                            $text = substr($email, 0, 3);
                            $rand = rand(10000, 99999);
                            $newpass = "$text$rand";
                            $password = md5($newpass);

                            $update_query = "UPDATE eve_user SET nm_password = '$password' WHERE id = '$userId'";

                            $updatePass = $db->update($update_query);

                            // Mail send
                            $to = "$email";
                            $from = "arosh019@gmail.com";
                            $headers = "FROM : $from\n";
                            $headers .= 'MIME-Version: 1.0';
                            $headers .= 'Content-type: text/html; charset=iso-8859-1';
                            $subject = "Password Recovery";
                            $message = "Your User Name: .$userName. and Your Password: .$newpass. Please Visit website for login";

                            $sendmail = mail($to, $subject, $message, $headers);

                            if ($sendmail) {
                                echo "<script>window.location = 'notification.php';</script>";
                                $_SESSION["Msg"] = "Please check your mail";
                            } else {
                                echo '<p style="color: red;">Mail not sent !</p>';
                            }
                        } else {
                            echo '<p class="text-center" style="color: red;">Mail not exist</p>';
                        }
                    }
                }
                ?>

                <?php
                if (isset($_POST['nm_login'])) {
                    $email = $fm->validation($_POST['nm_email']);
                    $pass = $fm->validation(md5($_POST['nm_password']));

                    $query = "SELECT * FROM eve_user WHERE nm_email = '$email' AND nm_password = '$pass'";
                    $result = $db->select($query);

                    if ($result != FALSE) {
                        $value = $result->fetch(PDO::FETCH_ASSOC);

                        //echo $value['nm_username'];

                        Session::set('login', TRUE);
                        Session::set("user", $value['nm_username']);
                        Session::set("userId", $value['id']);
                        Session::set("userRole", $value['role']);

                        header('Location: profile.php');
                        exit;
                    } else {
                        echo '<p style="color: red;">User or Password dose not match</p>';
                    }
                }
                ?>

                <?php
                if (isset($_POST['nm_singup'])) {
                    $username = $fm->validation($_POST['nm_username']);
                    $pass = $fm->validation(md5($_POST['nm_password']));
                    $email = $fm->validation($_POST['nm_email']);
                    $phone = $fm->validation($_POST['nm_phone']);
                    $address = $fm->validation($_POST['nm_address']);

                    // $username = mysqli_real_escape_string($db->link, $username);
                    // $pass = mysqli_real_escape_string($db->link, $pass);
                    // $email = mysqli_real_escape_string($db->link, $email);
                    // $phone = mysqli_real_escape_string($db->link, $phone);
                    // $address = mysqli_real_escape_string($db->link, $address);

                    $query = "INSERT INTO eve_user (nm_username, nm_password, nm_email, nm_phone, nm_address, role)"
                        . "VALUES ('$username', '$pass', '$email', '$phone', '$address', 4)";

                    $result = $db->insert($query);

                    if ($result) {
                        echo "<script>window.location = 'notification.php';</script>";
                        $_SESSION["Msg"] = "Thanks For registration. We will back to u soon";
                    } else {
                        echo "<script>window.location = 'notification.php';</script>";
                        $_SESSION["Msg"] = "Opps, Something wrong!";
                    }
                }
                ?>


                <?php if (!isset($_GET['login'])) { ?>
                    <h3 class="text-center mb-3">Sing Up</h3>

                    <form action="" method="post" id="">
                        <div class="form-row no-gutters">
                            <input type="text" name="nm_username" class="form-control mb-3 nm-input" placeholder="User Name">
                            <input type="email" name="nm_email" class="form-control mb-3 nm-input" placeholder="Email">
                            <input type="text" name="nm_phone" class="form-control mb-3 nm-input" placeholder="Phone">
                            <input type="text" name="nm_address" class="form-control mb-3 nm-input" placeholder="Address">
                            <input type="password" name="nm_password" class="form-control mb-3 nm-input" placeholder="Password">
                        </div>

                        <button type="submit" name="nm_singup" class="nm-btn nm-btn-color-block" style="margin: 10px auto;display: block;">Sing Up</button>
                    </form>
                    <p class="text-center">Already a user. Please <a href="login.php?login=login">login</a></p>
                <?php } elseif ($_GET['login'] == "forget") { ?>
                    <h3 class="text-center mb-3">Your Mail</h3>
                    <form action="" method="post" id="">
                        <div class="form-row no-gutters">
                            <input type="email" name="nm_email" class="form-control mb-3 nm-input" placeholder="Email">
                        </div>

                        <button type="submit" name="nm_forget_pass" class="nm-btn nm-btn-color-block" style="margin: 10px auto;display: block;">Submit</button>
                    </form>
                <?php } else { ?>
                    <h3 class="text-center mb-3">Login</h3>

                    <form action="" method="post" id="">
                        <div class="form-row no-gutters">
                            <input type="email" name="nm_email" class="form-control mb-3 nm-input" placeholder="Email">
                            <input type="password" name="nm_password" class="form-control mb-3 nm-input" placeholder="Password">
                        </div>

                        <button type="submit" name="nm_login" class="nm-btn nm-btn-color-block" style="margin: 10px auto;display: block;">Login</button>
                    </form>
                    <p class="text-center"><a href="login.php?login=forget">Forget Password?</a></p>
                <?php }
                ?>

            </div>


        </div>
    </div>
</div>


<?php

if (file_exists(DIR . "/public/web/inc/footer.php")) {
    include DIR . "/public/web/inc/footer.php";
} else {
    echo "Footer not found from Login page!";
}
