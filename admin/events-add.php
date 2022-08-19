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
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                $token = $fm->random_token(10);
                
                $eveTitle = mysqli_real_escape_string($db->link, $_POST['nm_eve_title']);
                $eveSubTitle = mysqli_real_escape_string($db->link, $_POST['nm_eve_sub_title']);
                $eveDes = mysqli_real_escape_string($db->link, $_POST['nm_eve_des']);
                $eveAuth = mysqli_real_escape_string($db->link, $_POST['nm_eve_auth']);
                //$eve_date = mysqli_real_escape_string($db->link, $_POST['nm_eve_date']);
                $eve_price = mysqli_real_escape_string($db->link, $_POST['nm_eve_price'] * 100);
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

                if ($eveTitle == '' || $eveSubTitle == '' || $eve_time == '' || $eveDes == '' || $eveAuth == '' || $eveLoc == '' || $upload_auth_img == '' || $upload_eve_img == '') {
                    echo "<span class='error'>Field not be empty</span>";
                } elseif ($auth_size > 1048567 && $eve_size > 1048567) {
                    echo "<span class='error'>Image Size should be less then 1MB! </span>";
                } elseif (in_array($file_ext_auth, $permited) === false && in_array($file_ext_eve, $permited) === false) {
                    echo "<span class='error'>You can upload only:-" . implode(', ', $permited) . "</span>";
                } else {
                    move_uploaded_file($auth_tmp, $upload_auth_img);
                    move_uploaded_file($eve_tmp, $upload_eve_img);

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

                            $query_gal = "INSERT INTO nm_event_rec(eve_img_gal, token) VALUES ('$file_gal', '$token')";

                            $result = $db->insert($query_gal);
                        }
                    }

                    $query = "INSERT INTO nm_event_up(eve_img, eve_price, eve_time, eve_dur, title, subtitle, eve_des, location, map_loc, eve_category, host_img, host_name, token) "
                            . "VALUES('$upload_eve_img','$eve_price', '$eve_time', '$eve_duration', '$eveTitle', '$eveSubTitle', '$eveDes', '$eveLoc','$eveLocMap', '$eveCategory', '$upload_auth_img', '$eveAuth', '$token')";

                    $post = $db->insert($query);

                    if ($post) {
                        echo '<span class="text-success" style="display:block; margin-bottom:10px;">Post Inserted Successfully !</span>';
                    } else {
                        echo "Problem";
                    }
                }
            }
            ?>



            <form method="post" action="" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="" class="col-form-label">Events title</label>
                        <div class="">
                            <input name="nm_eve_title" type="text" class="form-control" id="" placeholder="">
                        </div>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="" class="col-form-label">Events Subtitle</label>
                        <div class="">
                            <input name="nm_eve_sub_title" type="text" class="form-control" id="" placeholder="">
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="" class="col-form-label">Price/Currency: USD ($)</label>
                        <input type="number" name="nm_eve_price" min="1" class="form-control" placeholder="$">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="" class="col-form-label">Time</label>
                        <input type="datetime-local" name="nm_eve_time" min="1" class="form-control">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="" class="col-form-label">Duration</label>
                        <input type="number" name="nm_eve_duration" class="form-control" placeholder="2 days">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="" class="col-form-label">Events Image</label>
                        <div class="">
                            <input name="nm_eve_img" type="file" class="" id="" aria-describedby="">
                        </div>
                        <img src="" style="width: 200px;" alt="">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="" class="col-form-label">Events Location</label>
                        <input name="nm_eve_loc" type="text" class="form-control" id="" placeholder="">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="" class="col-form-label">Google <a target="_blank" href="https://www.google.com/maps">Map</a> Indicate</label>
                        <input name="nm_eve_map" type="text" class="form-control" id="" placeholder="Place a <iframe>">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="" class="col-form-label">Events Category</label>
                        <select name="nm_eve_category" class="form-control" style="height: calc(1.7rem + 2px);">
                            <?php
                            $sql = "SELECT * FROM nm_eve_category";
                            $query = $db->select($sql);
                            while ($data = $query->fetch_assoc()) {
                                ?>
                                <option value="<?php echo $data['cat_id'] ?>"><?php echo $data['category'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="" class="col-form-label">Events Author</label>
                        <input name="nm_eve_auth" type="text" class="form-control" id="" placeholder="Ex: Nishan M">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="" class="col-form-label">Author Image</label>
                        <div class="">
                            <input name="nm_eve_auth_img" type="file" class="" id="" aria-describedby="">
                            <img src="" style="width: 100px;" alt="">
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-12 no-gutters">
                        <label for="" class="col-form-label">Events Description</label>
                        <textarea class="form-control tinymce" name="nm_eve_des" id="summernote" cols="" rows=""></textarea>
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
                        <button name="nm_submit" type="submit" class="btn nm-btn-admin">Add</button>
                    </div>
                </div>
            </form>
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