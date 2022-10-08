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
                $pageTitle = mysqli_real_escape_string($db->link, $_POST['nm_page_title']);
                $pageDes = mysqli_real_escape_string($db->link, $_POST['nm_page_des']);
                $pageStatus = mysqli_real_escape_string($db->link, $_POST['nm_page_status']);
                $pageLoc = mysqli_real_escape_string($db->link, $_POST['nm_page_location']);

                $query = "INSERT INTO nm_page (page_title, page_des, status, page_loc) VALUES ('$pageTitle', '$pageDes', '$pageStatus', '$pageLoc')";
                $result = $db->insert($query);

                if ($result) {
                    echo '<span class="text-success" style="display:block; margin-bottom: 10px;">Page Created successfully !</span>';
                } else {
                    echo '<span class="text-success" style="display:block; margin-bottom: 10px;">Opps someting wrong!</span>';
                }
            }
            ?>

            <?php
            if (isset($_GET['id'])) {
                $pageId = $_GET['id'];

                if (isset($_POST['nm_update'])) {
                    $pageTitle = mysqli_real_escape_string($db->link, $_POST['nm_page_title']);
                    $pageDes = mysqli_real_escape_string($db->link, $_POST['nm_page_des']);
                    $pageStatus = mysqli_real_escape_string($db->link, $_POST['nm_page_status']);
                    $pageLoc = mysqli_real_escape_string($db->link, $_POST['nm_page_location']);

                    $query = "UPDATE nm_page SET "
                            . "page_title = '$pageTitle', "
                            . "page_des = '$pageDes', "
                            . "status = '$pageStatus', "
                            . "page_loc = '$pageLoc' "
                            . "WHERE id = '$pageId'";
                    $result = $db->update($query);

                    if ($result) {
                        echo '<span class="text-success" style="display:block; margin-bottom: 10px;">Information Updated successfully !</span>';
                    } else {
                        echo '<span class="text-success" style="display:block; margin-bottom: 10px;">Opps someting wrong!</span>';
                    }
                }
            }
            ?>

            <!--Content-->

            <?php
            if (isset($_GET['id'])) {
                $pageId = $_GET['id'];

                $query = "SELECT * FROM nm_page WHERE id = '$pageId'";
                $result = $db->select($query);

                if ($result) {
                    while ($data = $result->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                        <form method="post" action="" enctype="">

                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Page Title</label>
                                <div class="col-md-12">
                                    <input name="nm_page_title" type="text" value="<?php echo $data['page_title']; ?>" class="form-control" id="" placeholder="">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12 no-gutters">
                                    <label name="" class="col-sm-12 col-form-label">Description</label>
                                    <div class="col-md-12">
                                        <textarea class="form-control" name="nm_page_des" id="summernote" cols="" rows="">
                                            <?php echo $data['page_des']; ?>
                                        </textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="" class="col-form-label">Page Status</label>
                                    <select name="nm_page_status" id="" class="form-control">
                                        <?php if ($data['status'] == 0) { ?>
                                            <option value="0" selected="selected">Unpublish</option>
                                            <option value="1">Publish</option>
                                        <?php } else {
                                            ?>
                                            <option value="0">Unpublish</option>
                                            <option value="1" selected="selected">Publish</option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="col-form-label">Page Location</label>
                                    <select name="nm_page_location" id="" class="form-control">
                                        <?php if ($data['page_loc'] == 0) { ?>
                                            <option value="0" selected="selected">Header</option>
                                            <option value="1">Footer</option>
                                        <?php } else {
                                            ?>
                                            <option value="0">Header</option>
                                            <option value="1" selected="selected">Footer</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <button name="nm_update" type="submit" class="nm-btn nm-btn-admin float-right">Update</button>
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
                        <label for="" class="col-sm-2 col-form-label">Page Title</label>
                        <div class="col-md-12">
                            <input name="nm_page_title" type="text" class="form-control" id="" placeholder="">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12 no-gutters">
                            <label name="" class="col-md-12 col-form-label">Description</label>
                            <div class="col-md-12">
                                <textarea class="form-control" name="nm_page_des" id="summernote" cols="" rows=""></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="" class="col-form-label">Page Status</label>
                            <select name="nm_page_status" id="" class="form-control">
                                <option value="0">Unpublish</option>
                                <option value="1">Publish</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="" class="col-form-label">Page Status</label>
                            <select name="nm_page_location" id="" class="form-control">
                                <option value="0">Header</option>
                                <option value="1">Footer</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <button name="nm_submit" type="submit" class="nm-btn nm-btn-admin float-right">Done</button>
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