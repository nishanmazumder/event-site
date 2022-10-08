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
                        <th scope="col">Company</th>
                        <th scope="col">Image</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody class="nm_tbl_body scrollable-area">
                    <?php
                    if (isset($_GET['id'])) {
                        $brandId = $_GET['id'];

                        $query = "DELETE FROM nm_brand WHERE id = '$brandId'";
                        $result = $db->delete($query);

                        if ($result) {
                            echo '<span class="text-success" style="display: block; margin-bottom: 10px;">Brand deleted successfully !</span>';
                            //echo "<script>windows.location = 'faq-list.php'</script>";
                        } else {
                            echo '<span class="text-success" style="display: block; margin-bottom: 10px;">Opps there have something wrong!</span>';
                            //echo "<script>windows.location = 'faq-list.php'</script>";
                        }
                    }
                    ?>
                    <?php
                    $per_page_post = 10;
                    if (isset($_GET['page'])) {
                        $page = $_GET['page'];
                    } else {
                        $page = 1;
                    }
                    $start_page = ($page - 1) * $per_page_post;

                    $query = "SELECT * FROM nm_brand ORDER BY id DESC LIMIT $start_page, $per_page_post";
                    $result = $db->select($query);
                    $i = 1;
                    if ($result) {
                        while ($data = $result->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                            <tr class="nm_deep">
                                <th scope="row">1</th>
                                <td><?php echo $data['company_title']; ?></td>
                                <td><img src="<?php echo $data['img']; ?>" alt="" style="width: 20%;"/></td>
                                <td><a href="partner-add.php?id=<?php echo $data['id']; ?>">Edit</a> || <a href="?id=<?php echo $data['id']; ?>">Delete</a></td>
                            </tr>
                            <?php
                        }
                    } else {
                        echo "Data not found";
                    }
                    ?>
                </tbody>
            </table>
            <!--Content-->
        </div>
    </div>

    <?php
    $p_query = "SELECT id FROM nm_brand";
    $q_result = $db->select($p_query);
    $total_rows = $q_result->rowCount();
    $total_pages = ceil($total_rows / $per_page_post);

    if ($total_rows <= $per_page_post) {
        ?>
        <span class="text-center" style="display: block; margin: 0px auto;">No more data</span>
    <?php } else { ?>

        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" href="partner-list.php?page=1" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php for ($i = 1; $i < $total_pages; $i++) { ?>
                    <li class="page-item"><a class="page-link" href="partner-list.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                    <?php
                }
                ?>
                <li class="page-item">
                    <a class="page-link" href="partner-list.php?page=<?php echo $total_pages; ?>" aria-label="Next">
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