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
            if (isset($_POST['file_upload'])) {

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

                    $file = $img_name = "uploads/" . $img_name_current . '-' . date("Y-m-d-H-i-s") . rand(100, 1000) . '.' . $img_ext;

                    if ($img_name == '') {
                        echo "<span class='error'>Field not be empty</span>";
                    } elseif ($img_size > 2048567) {
                        echo "<span class='error'>Image Size should be less then 1MB!
                          </span>";
                    } elseif (in_array($img_ext, $ext) === false) {
                        echo "<span class='error'>You can upload only:-"
                        . implode(', ', $ext) . "</span>";
                    } else {
                        move_uploaded_file($img_tmp, $file);

                        $query = "INSERT INTO nm_event_rec(eve_img) VALUES ('$file')";

                        $result = $db->insert($query);
                    }
                }

                if ($result) {
                    echo '<span class="text-success">Post Inserted Successfully !</span>';
                } else {
                    echo '<span class="text-success">Problem</span>';
                    echo "";
                }
            }
            ?>

            <?php
            if (isset($_GET['title'])) {
                $eveSelect = $_GET['title'];

                //$query = "UPDATE nm_event_rec SET eve_title = '$eveSelect' WHERE id = '$eveId'";
                //$result = $db->update($query);
            }

            if (isset($_GET['id'])) {
                $eveId = $_GET['id'];

                $eveDelQuery = "DELETE FROM nm_event_rec WHERE id = '$eveId'";
                $DelResult = $db->delete($eveDelQuery);

                if ($DelResult) {
                    echo '<span class="text-success">Events Deleted Successfully !</span>';
                } else {
                    echo '<span class="text-success">Problem !</span>';
                }
            }
            ?>

            <form method="post" action="" enctype="multipart/form-data">
                <div class="form-row align-items-center">
                    <!--                    <div class="form-group col-md-6">
                                            <label for="" class="col-form-label">Title</label>
                                            <div class="">
                                                <div id="queue"></div>
                                                <input class="nm-input form-control" id="" name="nmTitle" type="text">
                                            </div>
                                        </div>-->
                    <div class="form-group col-md-3">
                        <label for="" class="col-form-label">Images</label>
                        <div class="">
                            <div id="queue"></div>
                            <input id="" name="img[]" type="file" multiple="">
                        </div>
                    </div>
                    <div class="form-group col-md-3 align-self-md-end">
                        <button name="file_upload" class="btn nm-btn-admin">Upload</button>
                    </div>

                </div>
            </form>

            <div class="row">
                <!--Content-->

                <?php
                $per_page_post = 12;
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                } else {
                    $page = 1;
                }
                $start_page = ($page - 1) * $per_page_post;

                $query = "SELECT * FROM nm_event_rec ORDER BY id DESC LIMIT $start_page, $per_page_post";
                $result = $db->select($query);

                if ($result) {
                    while ($data = $result->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                        <div class="col-md-3">
                            <img src="<?php echo $data['eve_img_gal']; ?>" style="width: 100%;" alt=""></td>
                        </div>
                        <?php
                    }
                } else {
                    echo "Data not found";
                }
                ?>

                <!--Content-->
            </div>
            <!--Content-->
        </div>
    </div>

    <!---pagination--->
    <?php
    $p_query = "SELECT * FROM nm_event_rec ORDER BY id DESC";
    $q_result = $db->select($p_query);
    $total_rows = mysqli_num_rows($q_result);
    $total_pages = ceil($total_rows / $per_page_post);

    if ($total_rows <= $per_page_post) {
        ?>
        <span class="text-center" style="display: block; margin: 0px auto;">No more data</span>
    <?php } else { ?>

        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" href="media.php?page=1" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php for ($i = 1; $i < $total_pages; $i++) { ?>
                    <li class="page-item"><a class="page-link" href="media.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                    <?php
                }
                ?>
                <li class="page-item">
                    <a class="page-link" href="media.php?page=<?php echo $total_pages; ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    <?php } ?>
    <!---pagination--->

</div><!-----end------>

</div>
</div>
</section>
<!--Main section end-->

<div class="clearfix"></div>

<!--Footer section strat-->
<?php include("inc/footer.php"); ?>