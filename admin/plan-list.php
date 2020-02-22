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
            <input class="nm-search-table" type="text" id="nmSearchInput" onkeyup="tableSearch()" placeholder="Search Item">
            <table class="table table-fixed" id="myTable">
                <!--Table head-->
                <thead class="header nm_mamin_tbl_hdr" id="header">
                    <tr class="sticky-row">
                        <th scope="col">Sl.</th>
                        <th scope="col">Plan</th>
                        <th scope="col">Price</th>
                        <th scope="col">Item</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>

                <tbody class="nm_tbl_body scrollable-area">

                    <?php
                    if (isset($_GET['id'])) {
                        $planDel = $_GET['id'];

                        $eveDelQuery = "DELETE FROM nm_event_up WHERE id = '$planDel'";
                        $DelResult = $db->delete($eveDelQuery);

                        if ($DelResult) {
                            echo '<span class="text-success">Events Deleted Successfully !</span>';
                        } else {
                            echo '<span class="text-success">Problem !</span>';
                        }
                    }
                    ?>

                    <?php
                    $query = "SELECT * FROM nm_eve_plan ORDER BY id DESC";
                    $result = $db->select($query);
                    $i = 1;
                    if ($result) {
                        while ($data = $result->fetch_assoc()) {
                            ?>
                            <tr class="nm_deep">
                                <th scope="row"><?php echo $i++; ?></th>
                                <td><?php echo $data['plan_title']; ?></td>
                                <td><?php echo $data['plan_price']/100; ?></td>
                                <td><?php echo $data['plan_item']; ?></td>
                                <td><a href="plan-update.php?id=<?php echo $data['id']; ?>">Edit</a> || <a href="?id=<?php echo $data['id']; ?>">Delete</a></td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </tbody>

            </table>
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