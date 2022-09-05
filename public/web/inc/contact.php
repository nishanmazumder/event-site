<?php
if (file_exists(__DIR__ . "/../../../vendor/autoload.php")) {
	require_once __DIR__ . "/../../../vendor/autoload.php";
} else {
	echo "Autoloader not found!";
}
use App\Model\Database;
use App\Model\Format;
$db = new Database();
$fm = new Format();


?>


<!-- Contact Start -->

<?php
if (isset($_POST['nmMailSend'])) {

    $userName = $fm->validation($_POST['nmUserName']);
    $userEmail = $fm->validation($_POST['nmUserMail']);
    $userMsg = $fm->validation($_POST['nmUserMsg']);

    // $userName = mysqli_real_escape_string($db->link, $userName);
    // $userEmail = mysqli_real_escape_string($db->link, $userEmail);
    // $userMsg = mysqli_real_escape_string($db->link, $userMsg);

    if (empty($userName)) {
        $error = "Name not be empty !";
    } elseif (empty($userEmail)) {
        $error = "Email not be empty !";
    } elseif (!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
        $error = "Email not validated !";
    } elseif (empty($userMsg)) {
        $error = "Message not be empty !";
    } else {
        $mailquery = "INSERT INTO nm_contact (name, email, msg) VALUES ('$userName', '$userEmail', '$userMsg')";
        $result = $db->insert($mailquery);

        echo $result;

        if ($result) {
            //include DIR. "notification.php";
            $_SESSION["Msg"] = "Message Send Successfully.";
            echo "<script>window.location = ".DIR."'/public/web/notification.php';</script>";

            echo "<script>confirmMsg(){alert('Message Send Successfully !');}</scrip>";
        } else {
            echo "<script>window.location = 'notification.php';</script>";
            $_SESSION["Msg"] = "OPSS! Message not send. Try again Later.";
            //echo "<script>alert('Please try again later !');</scrip>";
        }
    }
}
?>

<?php
$query = "SELECT * FROM nm_map WHERE id = 1";
$result = $db->select($query);

while ($data = $result->fetch(PDO::FETCH_ASSOC)) {
    ?>

    <div id="nmContact" class="container-fluid nm-contact">
        <div class="row no-gutters  wow fadeIn">
            <div class="nm-contact-details nm-bg">
                <div class="nm-title">
                    <h1>Contact Information</h1>
                </div>

                <ul>
                    <li><i class="fas fa-map-marker-alt"></i></li>
                    <li>Location: <br /> <?php echo $data['location']; ?></li>
                </ul>

                <ul>
                    <li><i class="fas fa-phone nm-con-ex-pad"></i></li>
                    <li>Phone: <br /> <?php echo $data['phone']; ?></li>
                </ul>

                <ul>
                    <li><i class="fas fa-envelope nm-con-ex-pad"></i></li>
                    <li>Email: <br /> <?php echo $data['email']; ?></li>
                </ul>

                <!-- Button Contact Form -->
                <button type="button" class="nm-btn nm-btn-color-block" data-toggle="modal" data-target="#nmContactForm">
                    Contact Us
                </button>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="nmContactForm" tabindex="-1" role="dialog" aria-labelledby="nmContactForrmTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" class="nm-contact-form-close">&times;</span>
                            </button>
                            <div class="nm-form nm-bg">
                                <div class="nm-title">
                                    <h1>Contact Us</h1>
                                    <div class="nm-line"></div>
                                </div>

                                <form method="post" action="">
                                    <div class="form-group">
                                        <input type="text" class="form-control nm-input" name="nmUserName" id="" placeholder="Your Name">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control nm-input" name="nmUserMail" id="" aria-describedby="" placeholder="Your Mail">
                                    </div>
                                    <div class="form-group">
                                        <textarea class="nm-input" name="nmUserMsg" id="" rows="5" placeholder="Drop Something..."></textarea>
                                    </div>
                                    <button type="submit" name="nmMailSend" class="nm-btn nm-btn-color-block float-right" onclick="confirmMsg()">Send</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nm-map">
                <?php
                $iframe = str_replace(array('600', '450'), array('100%', '250'), $data['map_loc']);
                echo $iframe;
                ?>
            </div>
        </div>
    </div>
<?php } ?>
<!-- Contact End -->
</main>