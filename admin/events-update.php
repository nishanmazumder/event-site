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
            if (!isset($_GET['id'])) {
                echo "Problem";
            } else {
                $eveId = $_GET['id'];
            }
            ?>

            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $token = $_POST['eve_token'];
                $eveTitle = mysqli_real_escape_string($db->link, $_POST['nm_eve_title']);
                $eveSubTitle = mysqli_real_escape_string($db->link, $_POST['nm_eve_sub_title']);
                $eveDes = mysqli_real_escape_string($db->link, $_POST['nm_eve_des']);
                $eveAuth = mysqli_real_escape_string($db->link, $_POST['nm_eve_auth']);
                //$eve_date = mysqli_real_escape_string($db->link, $_POST['nm_eve_date']);
                $eve_price = mysqli_real_escape_string($db->link, $_POST['nm_eve_price']);
                $eve_time = mysqli_real_escape_string($db->link, $_POST['nm_eve_time']);
                $eve_duration = mysqli_real_escape_string($db->link, $_POST['nm_eve_duration']);
                //$eve_day_time = mysqli_real_escape_string($db->link, $_POST['nm_eve_day_time']);
                $eveLoc = mysqli_real_escape_string($db->link, $_POST['nm_eve_loc']);
                $eveLocMap = mysqli_real_escape_string($db->link, $_POST['nm_eve_map']);
                $eveCategory = mysqli_real_escape_string($db->link, $_POST['nm_eve_category']);

                $permited = array('jpg', 'jpeg', 'png', 'gif');

                $eve_img = $_FILES['nm_eve_img']['name'];
                $eve_size = $_FILES['nm_eve_img']['size'];
                $eve_tmp = $_FILES['nm_eve_img']['tmp_name'];

                $div_eve = explode('.', $eve_img);
                $file_ext_eve = strtolower(end($div_eve));
                $unique_image_eve = substr(md5(time()), 0, 10) . '.' . $file_ext_eve;


                $auth_img = $_FILES['nm_eve_auth_img']['name'];
                $auth_size = $_FILES['nm_eve_auth_img']['size'];
                $auth_tmp = $_FILES['nm_eve_auth_img']['tmp_name'];

                $div_auth = explode('.', $auth_img);
                $file_ext_auth = strtolower(end($div_auth));
                $unique_image_auth = substr(md5(time()), 0, 9) . '.' . $file_ext_auth;

                $upload_auth_img = "uploads/" . $unique_image_auth;
                $upload_eve_img = "uploads/" . $unique_image_eve;

                if ($auth_size > 1048567 && $eve_size > 1048567) {
                    echo "<span class='error'>Image Size should be less then 1MB! </span>";
                } elseif (in_array($file_ext_auth, $permited) === false && in_array($file_ext_eve, $permited) === false) {
                    echo "<span class='error'>You can upload only:-" . implode(', ', $permited) . "</span>";
                } else {

                    move_uploaded_file($auth_tmp, $upload_auth_img);
                    move_uploaded_file($eve_tmp, $upload_eve_img);

                    $query = "UPDATE nm_event_up SET "
                            . "eve_img = '$upload_eve_img',"
                            . "eve_price = '$eve_price',"
                            . "eve_time = '$eve_time',"
                            . "eve_dur = '$eve_duration',"
                            . "title = '$eveTitle',"
                            . "subtitle = '$eveSubTitle',"
                            . "eve_des = '$eveDes',"
                            . "location = '$eveLoc',"
                            . "map_loc = '$eveLocMap',"
                            . "eve_category = '$eveCategory',"
                            . "host_img = '$upload_auth_img',"
                            . "host_name ='$eveAuth',"
                            . "token = '$token' WHERE id = '$eveId'";

                    $post = $db->update($query);

                    // Get Token From Events
                    $select_token = "SELECT token FROM nm_event_up WHERE id = '$eveId'";
                    $token_result = $db->select($select_token);
                    while ($match_token = $token_result->fetch(PDO::FETCH_ASSOC)) {
                        $getToken = $match_token['token'];
                    }

                    // Insert Images & Set token
                    foreach ($_FILES['img']['tmp_name'] as $key => $tmp_name) {

                        //$nmTitle = $_POST['nmTitle'];
                        $ext = array('jpg', 'jpeg', 'gif', 'png');

                        $img_name = $_FILES['img']['name'][$key];
                        $img_size = $_FILES['img']['size'][$key];
                        $img_type = $_FILES['img']['type'][$key];
                        $img_tmp = $_FILES['img']['tmp_name'][$key];

                        $img_ex = explode('.', $img_name);
                        $img_name_current = current($img_ex);
                        $img_ext = end($img_ex);

                        $file_gal = $img_name = "uploads/" . $img_name_current . '-' . date("Y-m-d-H-i-s") . rand(100, 1000) . '.' . $img_ext;

                        if ($img_name == '') {
                            echo "<span class='text-danger'>Field not be empty</span>";
                        } elseif ($img_size > 2048567) {
                            echo "<span class='text-danger'>Image Size should be less then 1MB!
                          </span>";
                        } elseif (in_array($img_ext, $ext) === false) {
                            echo "<span class='text-danger'>You can upload only:-"
                            . implode(', ', $ext) . "</span>";
                        } else {
                            move_uploaded_file($img_tmp, $file_gal);

                            //$query_gal = "UPDATE nm_event_rec SET eve_img_gal = '$file_gal', token = '$token' WHERE token = '$getToken'";
                            $query_gal = "INSERT INTO nm_event_rec (eve_img_gal, token) VALUES ('$file_gal','$getToken')";
                            $result = $db->update($query_gal);
                        }
                    }

                    if ($post) {
                        echo '<span class="text-success">Post Updated Successfully !</span>';
                    } else {
                        echo "Problem";
                    }
                }
            }
            ?>

            <?php
            $query = "SELECT * FROM nm_event_up WHERE id = '$eveId'";
            $result = $db->select($query);

            if ($result) {
                while ($data = $result->fetch(PDO::FETCH_ASSOC)) {
                    ?>

                    <form method="post" action="" enctype="multipart/form-data">
                        <input name="eve_token" type="hidden" value="<?php echo $fm->random_token(10); ?>" />
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="" class="col-form-label">Events title</label>
                                <div class="">
                                    <input name="nm_eve_title" value="<?php echo $data['title']; ?>" type="text" class="form-control" id="">
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="" class="col-form-label">Events Subtitle</label>
                                <div class="">
                                    <input name="nm_eve_sub_title" value="<?php echo $data['subtitle']; ?>" type="text" class="form-control" id="">
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="" class="col-form-label">Price/Currency: USD ($)</label>
                                <input type="number" name="nm_eve_price" value="<?php echo $data['eve_price']; ?>" min="1" class="form-control">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="" class="col-form-label">Time : <?php echo $data['eve_time']; ?></label>
                                <input type="datetime-local" name="nm_eve_time" value="<?php echo $data['eve_time']; ?>" min="1" class="form-control">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="" class="col-form-label">Duration</label>
                                <input type="number" name="nm_eve_duration" value="<?php echo $data['eve_dur']; ?>" class="form-control">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="" class="col-form-label">Events Image</label>
                                <div class="">
                                    <input name="nm_eve_img" value="<?php echo $data['eve_img']; ?>" type="file" class="" id="" aria-describedby="">
                                </div>
                                <img src="" style="width: 200px;" alt="">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="" class="col-form-label">Events Location</label>
                                <input name="nm_eve_loc" value="<?php echo $data['location']; ?>" type="text" class="form-control" id="">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="" class="col-form-label">Google <a target="_blank" href="https://www.google.com/maps">Map</a> Indicate</label>
                                <input name="nm_eve_map" value='<?php echo $data['map_loc']; ?>' type="text" class="form-control" id="">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="" class="col-form-label">Events Category</label>
                                <select name="nm_eve_category" class="form-control" style="height: calc(1.7rem + 2px);">
                                    <?php
                                    $sql = "SELECT * FROM nm_eve_category";
                                    $query = $db->select($sql);
                                    while ($category = $query->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                        <option <?php if ($data['eve_category'] == $category['cat_id']) { ?> selected="selected" <?php } ?>  value="<?php echo $category['cat_id'] ?>"><?php echo $category['category'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="" class="col-form-label">Events Author</label>
                                <input name="nm_eve_auth" value="<?php echo $data['host_name']; ?>" type="text" class="form-control" id="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="" class="col-form-label">Author Image</label>
                                <div class="">
                                    <input name="nm_eve_auth_img" value="<?php echo $data['host_img']; ?>" type="file" class="" id="" aria-describedby="">
                                    <img src="" style="width: 100px;" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12 no-gutters">
                                <label for="" class="col-form-label">Events Description</label>
                                <textarea class="form-control" name="nm_eve_des" id="summernote" cols="" rows=""><?php echo $data['eve_des']; ?></textarea>
                            </div>
                            <div class="form-group col-md-12 no-gutters">
                                <label for="" class="col-form-label">Events Gallery</label>
                                <div>
                                    <input id="" name="img[]" type="file" multiple="">
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-12 text-right">
                                <button name="nm_submit" type="submit" class="btn nm-btn-admin">Update</button>
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
<?php include("inc/footer.php"); ?>