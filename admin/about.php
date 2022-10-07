<!--Header section start-->
<?php include __DIR__."/inc/header.php"; ?>
<!--Header section end-->

<div class="clearfix"></div>

<!--Left navigation-->
<?php include __DIR__."/inc/navigation.php"; ?>
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
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $title = mysqli_real_escape_string($db->link, $_POST['nm_about_title']);
                $subtitle = mysqli_real_escape_string($db->link, $_POST['nm_about_sub']);
                $buttonlink = mysqli_real_escape_string($db->link, $_POST['nm_btn_link']);
                $description = mysqli_real_escape_string($db->link, $_POST['nm_des']);

                $permited = array('jpg', 'jpeg', 'png', 'gif');

                $eve_img = $_FILES['nm_eve_img']['name'];
                $eve_size = $_FILES['nm_eve_img']['size'];
                $eve_tmp = $_FILES['nm_eve_img']['tmp_name'];

                $div_eve = explode('.', $eve_img);
                $file_ext_eve = strtolower(end($div_eve));
                $unique_image_eve = substr(md5(time()), 0, 10) . '.' . $file_ext_eve;

                $auth_img = $_FILES['nm_eve_video']['name'];
                $auth_size = $_FILES['nm_eve_video']['size'];
                $auth_tmp = $_FILES['nm_eve_video']['tmp_name'];

                $div_auth = explode('.', $auth_img);
                $file_ext_auth = strtolower(end($div_auth));
                $unique_image_auth = substr(md5(time()), 0, 9) . '.' . $file_ext_auth;

                $aboud_video_img = "uploads/" . $unique_image_eve;
                $upload_header_video = "uploads/video/" . $unique_image_auth;

                if ($auth_size > 20485670 && $eve_size > 1048567) {
                    echo "<span class='error'>Image Size should be less then 1MB! </span>";
                } elseif (in_array($file_ext_auth, $permited) === false && in_array($file_ext_eve, $permited) === false) {
                    echo "<span class='error'>You can upload only:-" . implode(', ', $permited) . "</span>";
                } else {
                    move_uploaded_file($eve_tmp, $aboud_video_img);
                    move_uploaded_file($auth_tmp, $upload_header_video);

                    $query = "UPDATE nm_about SET "
                            . "title = '$title',"
                            . "sub_title = '$subtitle',"
                            . " btn_link = '$buttonlink',"
                            . " about_video = '$upload_header_video',"
                            . " image = '$aboud_video_img',"
                            . " description = '$description'";

                    $result = $db->update($query);

                    if ($result) {
                        echo '<span class="text-success" style="display:block; margin-bottom:10px;">Information Updated successfully !</span>';
                    } else {
                        echo "Problem";
                    }
                }
            }
            ?>

            <?php
            $query = "SELECT * from nm_about WHERE id = 1";
            $result = $db->select($query);

            if ($result) {
                while ($data = $result->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <form method="post" action="" enctype="multipart/form-data">

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input name="nm_about_title" type="text" class="form-control" id="" value="<?php echo $data['title']; ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Subtitle</label>
                            <div class="col-sm-10">
                                <input name="nm_about_sub" type="text" class="form-control" id="" value="<?php echo $data['sub_title']; ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Button Link</label>
                            <div class="col-sm-10">
                                <input name="nm_btn_link" type="text" class="form-control" id="" value="<?php echo $data['btn_link']; ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Video</label>
                            <div class="col-sm-10">
                                <video playsinline="playsinline" muted="muted" loop="loop" controls style="width: 60%;">
                                    <source src="<?php echo $data['about_video']; ?>" type="video/mp4">
                                </video><br />
                                <input type="file" name="nm_eve_video" value="<?php echo $data['about_video']; ?>" class="" placeholder="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Video Background image</label>
                            <div class="col-sm-10">
                                <img src="<?php echo $data['image']; ?>" style="width: 40%;" alt="About Image" /><br />
                                <input name="nm_eve_img" type="file" class="" id="" value="<?php echo $data['image']; ?>">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12 no-gutters">
                                <label for="inputEmail3" class="col-sm-12 col-form-label">Description</label>
                                <div class="col-sm-12">
                                    <textarea class="form-control" name="nm_des" id="summernote" cols="" rows=""><?php echo $data['description']; ?></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-12">
                                <button name="nm_submit" type="submit" class="nm-btn nm-btn-admin float-right">Update</button>
                            </div>
                        </div>
                    </form>

                    <?php
                }
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
<?php include __DIR__."/inc/footer.php"; ?>