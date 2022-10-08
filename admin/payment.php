<!--Header section start-->
<?php
include("inc/header.php");
?>

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
                        <th scope="col">Product</th>
                        <th scope="col">Amount</th>
                        <th scope="col">C. Name</th>
                        <th scope="col">C. Mail</th>
                        <th scope="col">C. Phone</th>
                        <th scope="col">C. Address</th>
                        <th scope="col">C. ID</th>
                        <th scope="col">T. ID</th>
                        <th scope="col">Date</th>
                    </tr>
                </thead>
                <tbody class="nm_tbl_body scrollable-area">

                    <?php
                    $per_page_post = 8;
                    if (isset($_GET['page'])) {
                        $page = $_GET['page'];
                    } else {
                        $page = 1;
                    }
                    $start_page = ($page - 1) * $per_page_post;

                    $query = "SELECT customers.*, transactions.* "
                            . "FROM customers INNER JOIN transactions "
                            . "WHERE customers.id = transactions.customer_id "
                            . "ORDER BY transactions.created_at DESC LIMIT $start_page, $per_page_post";
                    $result = $db->select($query);
                    $i = 1;
                    if ($result) {
                        while ($data = $result->fetch(PDO::FETCH_ASSOC)) {
                            ?>

                            <tr class="">
                                <th scope="row"><?php echo $i++; ?></th>
                                <td><?php echo $data['product']; ?></td>
                                <td><?php echo $data['amount']; ?></td>
                                <td><?php echo $data['first_name'] . ' ' . $data['last_name']; ?></td>
                                <td><?php echo $data['email']; ?></td>
                                <td><?php echo $data['phone']; ?></td>
                                <td><?php echo $data['address']; ?></td>
                                <td><?php echo $data['customer_id']; ?></td>
                                <td><?php echo $data['id']; ?></td>
                                <td><?php echo $data['created_at']; ?></td>
                            </tr>

                            <?php
                        }
                    } else {
                        echo "Data Not Found";
                    }
                    ?>
                </tbody>
            </table>

            <!--Content-->
        </div>
    </div>

    <!---pagination--->
    <?php
    $p_query = "SELECT customers.*, transactions.* "
            . "FROM customers INNER JOIN transactions "
            . "WHERE customers.id = transactions.customer_id "
            . "ORDER BY transactions.created_at DESC";
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
                    <a class="page-link" href="payment.php?page=1" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php for ($i = 1; $i < $total_pages; $i++) { ?>
                    <li class="page-item"><a class="page-link" href="payment.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                    <?php
                }
                ?>
                <li class="page-item">
                    <a class="page-link" href="payment.php?page=<?php echo $total_pages; ?>" aria-label="Next">
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