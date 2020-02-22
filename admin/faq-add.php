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
            <?php
            if (isset($_POST['nm_submit'])) {
                $question = $_POST['nm_faq_que'];
                $answer = $_POST['nm_faq_ans'];

                $query = "INSERT INTO nm_faq (ques, ans) VALUES ('$question', '$answer')";
                $result = $db->insert($query);

                if ($result) {
                    echo '<span class="text-success" style="margin-bottom: 10px;">Information Inserted successfully !</span>';
                } else {
                    echo '<span class="text-success" style="margin-bottom: 10px;">Opps someting wrong!</span>';
                }
            }
            ?>

            <?php
            if (isset($_GET['id'])) {
                $faqId = $_GET['id'];

                if (isset($_POST['nm_update'])) {
                    $question = $_POST['nm_faq_que'];
                    $answer = $_POST['nm_faq_ans'];

                    $query = "UPDATE nm_faq SET ques = '$question', ans = '$answer' WHERE id = '$faqId'";
                    $result = $db->update($query);

                    if ($result) {
                        echo '<span class="text-success" style="margin-bottom: 10px;">Information Updated successfully !</span>';
                    } else {
                        echo '<span class="text-success" style="margin-bottom: 10px;">Opps someting wrong!</span>';
                    }
                }
            }
            ?>

            <!--Content-->
            <?php
            if (isset($_GET['id'])) {
                $faqId = $_GET['id'];

                $query = "SELECT * FROM nm_faq WHERE id = '$faqId'";
                $result = $db->select($query);

                if ($result) {
                    while ($data = $result->fetch_assoc()) {
                        ?>
                        <form method="post" action="" enctype="">

                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Question</label>
                                <div class="col-sm-10">
                                    <input name="nm_faq_que" type="text" value="<?php echo $data['ques']; ?>" class="form-control" id="" placeholder="">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12 no-gutters">
                                    <label name="" class="col-sm-12 col-form-label">Answer</label>
                                    <div class="col-sm-12">
                                        <textarea class="form-control" name="nm_faq_ans" id="summernote" cols="" rows="">
                                            <?php echo $data['ans']; ?>
                                        </textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <button name="nm_update" type="submit" class="btn btn-primary align-right">Update</button>
                                </div>
                            </div>
                        </form>
                        <?php
                    }
                } else {
                    echo 'No data found';
                }
            } else {
                ?>
                <form method="post" action="" enctype="">

                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Question</label>
                        <div class="col-sm-10">
                            <input name="nm_faq_que" type="text" class="form-control" id="" placeholder="">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12 no-gutters">
                            <label name="" class="col-sm-12 col-form-label">Answer</label>
                            <div class="col-sm-12">
                                <textarea class="form-control" name="nm_faq_ans" id="summernote" cols="" rows=""></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button name="nm_submit" type="submit" class="btn btn-primary align-right">Done</button>
                        </div>
                    </div>
                </form> 
            <?php } ?>



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