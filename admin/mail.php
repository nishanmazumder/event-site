<!--Header section start-->
<?php include("inc/header.php"); ?>
<!--Header section end-->

<div class="clearfix"></div>

<!--Left navigation-->
<?php include("inc/navigation.php"); ?>
<!--Left navigation-->


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
            if (isset($_GET['mailid'])) {
                $mailId = $_GET['mailid'];
                if (isset($mailId)) {
                    $query = "UPDATE nm_contact SET status = 1 WHERE id = '$mailId'";
                    $result = $db->update($query);
                }
            }else{
                echo "Data not found";
            }
            ?>

            <?php
            $query = "SELECT * FROM nm_contact WHERE id = '$mailId'";
            $result = $db->select($query);

            if ($result != NULL) {
                while ($data = $result->fetch(PDO::FETCH_ASSOC)) {
                    ?>

                    <form method="post" action="" enctype="">

                        <div class="form-row align-items-center">
                            <div class="form-group col-md-12">
                                <label for="" class="col-form-label">Name</label>
                                <div class="">
                                    <input class="nm-input form-control" id="" name="nmUserName" type="text" value="<?php echo $data['name']; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="" class="col-form-label">Email</label>
                                <div class="">
                                    <input class="nm-input form-control" id="" name="nmUserMail" type="email" value="<?php echo $data['email']; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="" class="col-form-label">Message</label>
                                <textarea class="nm-input form-control" name="nmUserMsg" readonly><?php echo $data['msg']; ?>"</textarea>
                            </div>
                            <div class="form-group col-md-3">
                                <a href="mail-replay.php?mailid=<?php echo $data['id']; ?>" name="nmMailReplay" class="btn nm-btn-admin">Replay</a>
                            </div>
                        </div>

                    </form>

        <?php
    }
} else {
    echo "Data not found";
}
?>
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