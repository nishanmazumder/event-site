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
                $title = mysqli_real_escape_string($db->link, $_POST['nm_brand_title']);

                $permited = array('jpg', 'jpeg', 'png', 'gif');

                $eve_img = $_FILES['nm_eve_img']['name'];
                $eve_size = $_FILES['nm_eve_img']['size'];
                $eve_tmp = $_FILES['nm_eve_img']['tmp_name'];

                $div_eve = explode('.', $eve_img);
                $file_ext_eve = strtolower(end($div_eve));
                $unique_image_eve = substr(md5(time()), 0, 10) . '.' . $file_ext_eve;

                $upload_eve_img = "uploads/" . $unique_image_eve;

                if ($eve_size > 1048567) {
                    echo "<span class='error'>Image Size should be less then 1MB! </span>";
                } elseif (in_array($file_ext_eve, $permited) === false) {
                    echo "<span class='error'>You can upload only:-" . implode(', ', $permited) . "</span>";
                } else {
                    move_uploaded_file($eve_tmp, $upload_eve_img);

                    $query = "INSERT INTO nm_brand(company_title, img) "
                            . "VALUES('$title','$upload_eve_img')";

                    $post = $db->insert($query);

                    if ($post) {
                        echo '<span class="text-success" style="display:block; margin-bottom:10px;">Brand Inserted Successfully !</span>';
                    } else {
                        echo "Problem";
                    }
                }
            }
            ?>

            <?php
            if (isset($_GET['id'])) {
                $brandId = $_GET['id'];

                if (isset($_POST['nm_update'])) {
                    $title = mysqli_real_escape_string($db->link, $_POST['nm_brand_title']);

                    $permited = array('jpg', 'jpeg', 'png', 'gif');

                    $eve_img = $_FILES['nm_eve_img']['name'];
                    $eve_size = $_FILES['nm_eve_img']['size'];
                    $eve_tmp = $_FILES['nm_eve_img']['tmp_name'];

                    $div_eve = explode('.', $eve_img);
                    $file_ext_eve = strtolower(end($div_eve));
                    $unique_image_eve = substr(md5(time()), 0, 10) . '.' . $file_ext_eve;

                    $upload_eve_img = "uploads/" . $unique_image_eve;

                    if ($eve_size > 1048567) {
                        echo "<span class='error'>Image Size should be less then 1MB! </span>";
                    } elseif (in_array($file_ext_eve, $permited) === false) {
                        echo "<span class='error'>You can upload only:-" . implode(', ', $permited) . "</span>";
                    } else {
                        move_uploaded_file($eve_tmp, $upload_eve_img);

                        $query = "UPDATE nm_brand SET company_title = '$title', img = '$upload_eve_img' WHERE id = '$brandId'";
                        $result = $db->update($query);

                        if ($result) {
                            echo '<span class="text-success" style="margin-bottom: 10px;">Information Updated successfully !</span>';
                        } else {
                            echo '<span class="text-success" style="margin-bottom: 10px;">Opps someting wrong!</span>';
                        }
                    }
                }
            }
            ?>

            <!--Content-->
            <?php
            if (isset($_GET['id'])) {
                $brandId = $_GET['id'];

                $query = "SELECT * FROM nm_brand WHERE id = '$brandId'";
                $result = $db->select($query);

                if ($result) {
                    while ($data = $result->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                        <form method="post" action="" enctype="multipart/form-data">

                            <div class="form-group row">
                                <label for="" class="col-sm-2">Company</label>
                                <div class="col-md-10">
                                    <input name="nm_brand_title" type="text" value="<?php echo $data['company_title']; ?>" class="form-control" id="" placeholder="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-10">
                                    <input type="file" name="nm_eve_img" value="<?php echo $data['img']; ?>" class="" id="" aria-describedby="">
                                </div>

                            </div>

                            <div class="form-group row">
                                <div class="col-sm-12 text-right">
                                    <button name="nm_update" type="submit" class="nm-btn nm-btn-admin float-right">Add</button>
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
                <form method="post" action="" enctype="multipart/form-data">

                    <div class="form-group row">
                        <label for="" class="col-sm-2">Company</label>
                        <div class="col-md-10">
                            <input name="nm_brand_title" type="text" class="form-control" id="" placeholder="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="file" name="nm_eve_img" class="" id="" aria-describedby="">
                        </div>

                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12 text-right">
                            <button name="nm_submit" type="submit" class="nm-btn nm-btn-admin float-right">Add</button>
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