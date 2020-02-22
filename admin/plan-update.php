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
            if (isset($_GET['id'])) {
                $plan_id = $_GET['id'];
            }
            ?>
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $plan_title = mysqli_real_escape_string($db->link, $_POST['nm_plan_titel']);
                $plan_price = mysqli_real_escape_string($db->link, $_POST['nm_plan_price'])*100;
                $nm_pln_item = mysqli_real_escape_string($db->link, $_POST['nm_pln_item']);

                $query = "UPDATE nm_eve_plan SET "
                        . "plan_title = '$plan_title',"
                        . "plan_price = '$plan_price',"
                        . "plan_item = '$nm_pln_item'"
                        . "WHERE id = '$plan_id'";

                $result = $db->update($query);

                if ($result) {
                    echo '<span class="text-success" style="margin-bottom: 10px;">Information Updated successfully !</span>';
                } else {
                    echo "Problem";
                }
            }
            ?>


            <?php
            $query = "SELECT * from nm_eve_plan WHERE id = '$plan_id'";
            $result = $db->select($query);

            if ($result) {
                while ($data = $result->fetch_assoc()) {
                    ?>
                    <form method="post" action="" enctype="multipart/form-data">

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Plan Title</label>
                            <div class="col-sm-10">
                                <input name="nm_plan_titel" type="text" class="form-control" id="" value="<?php echo $data['plan_title']; ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Price/m</label>
                            <div class="col-sm-10">
                                <input name="nm_plan_price" type="text" class="form-control" id="" value="<?php $planPrice = $data['plan_price']/100; echo $planPrice; ?>" placeholder="$">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Plan Item</label>
                            <div class="col-sm-10">
                                <textarea name="nm_pln_item" id="" cols="" rows=""><?php echo $data['plan_item']; ?></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button name="nm_submit" type="submit" class="btn btn-primary align-right">Update</button>
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