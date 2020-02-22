<!--Header section start-->
<?php include("inc/header.php"); ?>
<!--Header section end-->

<div class="clearfix"></div>

<!--Left navigation-->
<?php include("inc/navigation.php"); ?>
<!--Left navigation-->

<?php
if (isset($_GET['mailid'])) {
    $mailId = $_GET['mailid'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $to = $fm->validation($_POST['nmUserMail']);
    $from = $fm->validation($_POST['nmMailFrom']);
    $subject = $fm->validation($_POST['nmMailSub']);
    $msg = $fm->validation($_POST['nmUserMsg']);

    $sendmail = mail($to, $subject, $msg, $from);

    if ($sendmail) {
        echo "Message Send successfully";
        unset($_SESSION['userMail']);
    } else {
        echo "Problem";
    }
}
?>

<!--Main section start-->
<div class="col-lg-10 col-md-10 col-sm-10 nm_content_bg">
    <nav aria-label="breadcrumb nm-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Library</li>
        </ol>
    </nav>
    <!--Content main area-->
    <div class="nm_main_content_area">
        <div class="nm_main_content">
            <!--Content-->
            <?php
            $query = "SELECT email FROM nm_contact WHERE id = '$mailId'";
            $result = $db->select($query);

            if($result){
            while ($data = $result->fetch_assoc()) {
                ?>
                <form method="post" action="" enctype="">

                    <div class="form-row align-items-center">
                        <div class="form-group col-md-12">
                            <label for="" class="col-form-label">To</label>
                            <div class="">
                                <input class="nm-input form-control" id="" name="nmUserMail" type="email" value="<?php echo $data['email']; ?>" readonly="">
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="" class="col-form-label">From</label>
                            <div class="">
                                <input class="nm-input form-control" id="" name="nmMailFrom" type="email" value="">
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="" class="col-form-label">Subject</label>
                            <div class="">
                                <input class="nm-input form-control" id="" name="nmMailSub" type="text" value="">
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="" class="col-form-label">Message</label>
                            <textarea name="nmUserMsg"></textarea>
                        </div>
                        <div class="form-group col-md-3">
                            <button name="nmMailReplay" class="btn btn-primary">Send</button>
                        </div>
                    </div>

                </form>
            <?php }} ?>
            <!--Content-->
        </div>
    </div>
</div><!-----end------>

</div>
</div>
</section>
<!--Main section end-->

<div class="clearfix"></div>

<!--Footer section strat-->
<?php include("inc/footer.php"); ?>