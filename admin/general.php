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
            // General
            if (isset($_POST['nm_general'])) {
                $permited = array('jpg', 'jpeg', 'png', 'gif', 'mp4');

                $eve_img = $_FILES['nm_eve_logo']['name'];
                $eve_size = $_FILES['nm_eve_logo']['size'];
                $eve_tmp = $_FILES['nm_eve_logo']['tmp_name'];

                $div_eve = explode('.', $eve_img);
                $file_ext_eve = strtolower(end($div_eve));
                $unique_image_eve = substr(md5(time()), 0, 10) . '.' . $file_ext_eve;

                $auth_img = $_FILES['nm_eve_video']['name'];
                $auth_size = $_FILES['nm_eve_video']['size'];
                $auth_tmp = $_FILES['nm_eve_video']['tmp_name'];

                $div_auth = explode('.', $auth_img);
                $file_ext_auth = strtolower(end($div_auth));
                $unique_image_auth = substr(md5(time()), 0, 9) . '.' . $file_ext_auth;

                $upload_site_logo = "uploads/" . $unique_image_eve;
                $upload_header_video = "uploads/video/" . $unique_image_auth;

                if ($auth_size > 20485670 && $eve_size > 1048567) {
                    echo "<span class='error'>Image Size should be less then 1MB! </span>";
                } elseif (in_array($file_ext_auth, $permited) === false && in_array($file_ext_eve, $permited) === false) {
                    echo "<span class='error'>You can upload only:-" . implode(', ', $permited) . "</span>";
                } else {
                    move_uploaded_file($eve_tmp, $upload_site_logo);
                    move_uploaded_file($auth_tmp, $upload_header_video);

                    $query = "UPDATE nm_general SET "
                        . "nm_logo = '$upload_site_logo', "
                        . "nm_header_video = '$upload_header_video' WHERE id = 1";
                    $result = $db->update($query);

                    if ($result) {
                        echo '<span class="text-success" style="display:block; margin-bottom: 10px;">Information Updated successfully !</span>';
                    } else {
                        echo '<span class="text-success" style="display:block; margin-bottom: 10px;">Opps someting wrong!</span>';
                    }
                }
            }

            // Theme Color / #D94249
            if (isset($_POST['nm_theme_color'])) {
                $color = $_POST['nm_eve_theme_color'];

                $query = "UPDATE nm_eve_color SET eve_color = '$color' WHERE id = 1";
                $result = $db->update($query);

                if ($result) {
                    echo '<span class="text-success" style="margin-bottom: 10px;display: block;">Color Updated Successfully !</span>';
                } else {
                    echo '<span class="text-success" style="margin-bottom: 10px;display: block;">Opps Something wrong !</span>';
                }
            }

            // Socail
            if (isset($_POST['nm_sbt_social'])) {

                $face = $_POST['nm_face_link'];
                $twt = $_POST['nm_twt_link'];
                $gog = $_POST['nm_gog_link'];
                $ytb = $_POST['nm_you_link'];

                $query = "UPDATE nm_social SET nm_face = '$face', nm_twt = '$twt', nm_gog = '$gog', nm_ytb = '$ytb' WHERE id = 1";
                $result = $db->update($query);

                if ($result) {
                    echo '<span class="text-success" style="margin-bottom: 10px;display: block;">Updated Successfully !</span>';
                } else {
                    echo '<span class="text-success" style="margin-bottom: 10px;display: block;">Opps Something wrong !</span>';
                }
            }


            // Contact
            if (isset($_POST['nm_sbt_map_loc'])) {
                $conLocation = $_POST['nm_con_loc'];
                $conPhone = $_POST['nm_con_phone'];
                $conEmail = $_POST['nm_con_email'];
                $conLocMap = $_POST['nm_con_map'];

                $query = "UPDATE nm_map SET "
                    . "location = '$conLocation',"
                    . "phone = '$conPhone',"
                    . "email = '$conEmail',"
                    . "map_loc = '$conLocMap' "
                    . "WHERE id = 1";
                $result = $db->update($query);

                if ($result) {
                    echo '<span class="text-success" style="margin-bottom: 10px;display: block;">Updated Successfully !</span>';
                } else {
                    echo '<span class="text-success" style="margin-bottom: 10px;display: block;">Opps Something wrong !</span>';
                }
            }

            // Copyright
            if (isset($_POST['nm_copyright'])) {
                $copy_text = $_POST['nm_copy'];

                $query = "UPDATE nm_eve_copyright SET nm_copy = '$copy_text' WHERE id = 1";
                $result = $db->update($query);

                if ($result) {
                    echo '<span class="text-success" style="margin-bottom: 10px;display: block;">Updated Successfully !</span>';
                } else {
                    echo '<span class="text-success" style="margin-bottom: 10px;display: block;">Opps Something wrong !</span>';
                }
            }
            ?>

            <!--Content-->
            <div class="row nm-general-option">
                <div class="col-3">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="nm-option-general-tab" data-toggle="pill" href="#nm-option-general" role="tab" aria-controls="nm-option-general" aria-selected="true">General</a>
                        <a class="nav-link" id="nm-option-color-tab" data-toggle="pill" href="#nm-option-color" role="tab" aria-controls="nm-option-color" aria-selected="false">Color</a>
                        <a class="nav-link" id="nm-option-social-tab" data-toggle="pill" href="#nm-option-social" role="tab" aria-controls="nm-option-social" aria-selected="false">Social</a>
                        <a class="nav-link" id="nm-option-contact-tab" data-toggle="pill" href="#nm-option-contact" role="tab" aria-controls="nm-option-contact" aria-selected="false">Contact</a>
                        <a class="nav-link" id="nm-option-copyright-tab" data-toggle="pill" href="#nm-option-copyright" role="tab" aria-controls="nm-option-copyright" aria-selected="false">Copyright</a>
                    </div>
                </div>
                <div class="col-9">
                    <div class="tab-content" id="v-pills-tabContent">
                        <!----General---->
                        <div class="tab-pane fade show active" id="nm-option-general" role="tabpanel" aria-labelledby="nm-option-general-tab">
                            <?php
                            $query_general = "SELECT * FROM nm_general WHERE id = 1";
                            $result_general = $db->select($query_general);

                            if ($result_general) {
                                while ($data_g = $result_general->fetch(PDO::FETCH_ASSOC)) {
                            ?>

                                    <form method="post" action="" enctype="multipart/form-data">
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="" class="col-form-label">Site Logo</label><br />
                                                <img src="<?php echo $data_g['nm_logo']; ?>" style="width: 40%;background: #ddd;" alt="Site Logo" /><br />
                                                <input type="file" name="nm_eve_logo" value="<?php echo $data_g['nm_logo']; ?>" class="" placeholder="#D94249">
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="" class="col-form-label">Header Video</label><br />
                                                <video playsinline="playsinline" muted="muted" loop="loop" controls style="width: 60%;">
                                                    <source src="<?php echo $data_g['nm_header_video']; ?>" type="video/mp4">
                                                </video><br />
                                                <input type="file" name="nm_eve_video" value="<?php echo $data_g['nm_header_video']; ?>" class="" placeholder="">
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <button name="nm_general" type="submit" class="btn nm-btn-admin float-right">Done</button>
                                            </div>
                                        </div>

                                    </form>
                            <?php
                                }
                            } else {
                                echo '<span class="text-danger">No Data available !</span>';
                            }
                            ?>
                        </div>

                        <!----Color---->
                        <div class="tab-pane fade" id="nm-option-color" role="tabpanel" aria-labelledby="nm-option-color-tab">
                            <?php
                            $query = "SELECT * FROM nm_eve_color WHERE id = 1";
                            $result = $db->select($query);

                            if ($result) {
                                while ($data = $result->fetch(PDO::FETCH_ASSOC)) {
                            ?>

                                    <form method="post" action="" enctype="multipart/form-data">
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="" class="col-form-label">Theme Color</label>
                                                <input type="text" name="nm_eve_theme_color" value="<?php echo $data['eve_color']; ?>" class="form-control" placeholder="#D94249">
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <button name="nm_theme_color" type="submit" class="btn nm-btn-admin float-right">Done</button>
                                            </div>
                                        </div>

                                    </form>
                            <?php
                                }
                            } else {
                                echo '<span class="text-danger">Opps Something wrong !</span>';
                            }
                            ?>
                        </div>

                        <!----Social---->
                        <div class="tab-pane fade" id="nm-option-social" role="tabpanel" aria-labelledby="nm-option-social-tab">
                            <?php
                            $query_social = "SELECT * FROM nm_social WHERE id = 1";
                            $result_social = $db->select($query_social);

                            if ($result_social) {
                                while ($data_social = $result_social->fetch(PDO::FETCH_ASSOC)) {
                            ?>

                                    <form method="post" action="">

                                        <div class="form-row">
                                            <div class="form-group col-md-12 no-gutters">
                                                <label for="" class="col-sm-12 col-form-label">Facebook</label>
                                                <input type="text" name="nm_face_link" class="form-control" value="<?php echo $data_social['nm_face']; ?>" placeholder="" />
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-12 no-gutters">
                                                <label for="" class="col-sm-12 col-form-label">Twitter</label>
                                                <input type="text" name="nm_twt_link" class="form-control" value="<?php echo $data_social['nm_twt']; ?>" placeholder="" />
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-12 no-gutters">
                                                <label for="" class="col-sm-12 col-form-label">Google</label>
                                                <input type="text" name="nm_gog_link" class="form-control" value="<?php echo $data_social['nm_gog']; ?>" placeholder="" />
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-12 no-gutters">
                                                <label for="" class="col-sm-12 col-form-label">Youtube</label>
                                                <input type="text" name="nm_you_link" class="form-control" value="<?php echo $data_social['nm_ytb']; ?>" placeholder="" />
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <button name="nm_sbt_social" type="submit" class="btn nm-btn-admin float-right">Done</button>
                                            </div>
                                        </div>
                                    </form>
                            <?php
                                }
                            } else {
                                echo '<span class="text-danger">Opps Something wrong !</span>';
                            }
                            ?>
                        </div>

                        <!----Contact---->
                        <div class="tab-pane fade" id="nm-option-contact" role="tabpanel" aria-labelledby="nm-option-contact-tab">
                            <?php
                            $query_contact = "SELECT * FROM nm_map WHERE id = 1";
                            $result_contact = $db->select($query_contact);

                            if ($result_contact) {
                                while ($data_con = $result_contact->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                                    <form method="post" action="" enctype="">

                                        <div class="form-group col-md-12">
                                            <label for="" class="col-form-label">Location</label>
                                            <input name="nm_con_loc" type="text" value="<?php echo $data_con['location']; ?>" class="form-control" id="" placeholder="">
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label for="" class="col-form-label">Phone</label>
                                            <input name="nm_con_phone" type="text" value="<?php echo $data_con['phone']; ?>" class="form-control" id="" placeholder="">
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label for="" class="col-form-label">Email</label>
                                            <input name="nm_con_email" type="email" value="<?php echo $data_con['email']; ?>" class="form-control" id="" placeholder="">
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label for="" class="col-form-label">Google <a target="_blank" href="https://www.google.com/maps">Map</a> Indicate</label>
                                            <input name="nm_con_map" type="text" value='<?php echo $data_con['map_loc']; ?>' class="form-control" id="" placeholder="Place a <iframe>">
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <button name="nm_sbt_map_loc" type="submit" class="btn nm-btn-admin float-right">Done</button>
                                            </div>
                                        </div>
                                    </form>
                            <?php
                                }
                            } else {
                                echo '<span class="text-danger">Opps Something wrong !</span>';
                            }
                            ?>
                        </div>

                        <!----Copyright---->
                        <div class="tab-pane fade" id="nm-option-copyright" role="tabpanel" aria-labelledby="nm-option-copyright-tab">
                            <?php
                            $query_copy = "SELECT * FROM nm_eve_copyright WHERE id = 1";
                            $result_copy = $db->select($query_copy);

                            if ($result_copy) {
                                while ($data_copy = $result_copy->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                                    <form method="post" action="" enctype="multipart/form-data">

                                        <div class="form-row">
                                            <div class="form-group col-md-12 no-gutters">
                                                <label for="inputEmail3" class="col-sm-12 col-form-label">Copy Right</label>
                                                <div class="col-md-12">
                                                    <textarea class="form-control" name="nm_copy" id="summernote" cols="" rows=""><?php echo $data_copy['nm_copy']; ?></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <button name="nm_copyright" type="submit" class="btn nm-btn-admin float-right">Done</button>
                                            </div>
                                        </div>
                                    </form>
                            <?php
                                }
                            } else {
                                echo '<span class="text-danger">Opps Something wrong !</span>';
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
            <!--Content-->
        </div>
    </div>
</div>
<!-----end------>

</div>
</div>
</section>
<!--Main section end-->

<div class="clearfix"></div>

<!--Footer section strat-->
<?php include("inc/footer.php"); ?>