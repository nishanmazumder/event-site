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
    <title>Password Recovery</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
    <div class="container">
        <section id="content">

            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $email = $format->validation($_POST['email']);
                $email = mysqli_real_escape_string($post_show->link, $email);

                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    echo "Mail not valid";
                } else {
                    $mailCheck = "SELECT * FROM sb_user WHERE email = '$email' LIMIT 1";
                    $result = $post_show->select($mailCheck);

                    if ($result != FALSE) {
                        while ($value = $result->fetch_assoc()) {
                            $userId = $value['id'];
                            $userName = $value['username'];
                        }

                        
                        // New Password
                        $text = substr($email, 0, 3);
                        $rand = rand(10000, 99999);
                        $newpass = "$text$rand";
                        $password = md5($newpass);

                        $update_query = "UPDATE sb_user SET password = '$password' WHERE id = '$userId'";
                        
                        $updatePass = $post_show->update($update_query);
                        
                        // Mail send
                        $to = "$email";
                        $from = "arosh019@gmail.com";
                        $headers = "FROM : $from\n";
                        $headers .= 'MIME-Version: 1.0';
                        $headers .= 'Content-type: text/html; charset=iso-8859-1';
                        $subject = "Password Recovery";
                        $message = "Your User Name: .$userName. and Your Password: .$newpass. Please Visit website for login";
                        
                        $sendmail = mail($to, $subject, $message, $headers);
                        
                        if($sendmail){
                           echo '<p style="color: green;">Please check your mail</p>'; 
                        }else{
                            echo '<p style="color: red;">Mail not sent !</p>'; 
                        }
                        
                    }else{
                        echo '<p style="color: red;">Mail not exist</p>'; 
                    }
                }
            }
            ?>

            <form action="" method="post">
                <h1>Your Email</h1>
                <div>
                    <input type="email" placeholder="Your Mail" required="" name="email"/>
                </div>
                <div>
                    <input type="submit" value="SEND" />
                </div>
            </form><!-- form -->
        </section><!-- content -->
    </div><!-- container -->
</body>
</html>