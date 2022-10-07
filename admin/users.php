<!--Header section start-->
<?php include("inc/header.php"); ?>
<!--Header section end-->

<div class="clearfix"></div>

<!--Left navigation-->
<?php include("inc/navigation.php"); ?>
<!--Left navigation-->

<?php
if (isset($_GET['mailDraft'])) {
    $mailId = $_GET['mailDraft'];

    $query = "UPDATE nm_contact SET status = 2 WHERE id = '$mailId'";
    $result = $db->update($query);

    if ($result) {
        $_SESSION['msg'] = "<span class='text-success'>Message save to " . " <a href='mail-draft.php'>Draft</a></span>";
    } else {
        $_SESSION['msg'] = "<span class='text-danger'>Unable to send</span>";
    }
}

if (isset($_GET['mailid'])) {
    $mailId = $_GET['mailid'];

    $query = "DELETE FROM nm_contact WHERE id = '$mailId'";
    $result = $db->delete($query);

    if ($result) {
        $_SESSION['msg'] = "<span class='text-success'>Data deleted sussefully !</span>";
    } else {
        $_SESSION['msg'] = "<span class='text-danger'>Problem !</span>";
    }
}
?>


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
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Address</th>
                        <th scope="col">Role</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody class="nm_tbl_body scrollable-area">
                    <?php
                    $query = "SELECT * FROM eve_user";
                    $result = $db->select($query);
                    $i = 1;

                    if ($result) {
                        while ($data = $result->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                    <tr class="<?php if($data['role'] == 4){echo "nm_deep";}?>">
                                <th scope="row"><?php echo $i++; ?></th>
                                <td><?php echo $data['nm_username']; ?></td>
                                <td><?php echo $data['nm_email']; ?></td>
                                <td><?php echo $data['nm_phone']; ?></td>
                                <td><?php echo $data['nm_address']; ?></td>
                                <td><?php echo $fm->userRole($data['role']); ?></td>
                                <td><a href="<?php echo $data['id']; ?>">View</a> || <a href="<?php echo $data['id']; ?>"  onclick="confirm('Are u sure want to delete?')">Delete</a></td>
                            </tr>

                            <?php
                        }
                    } else {
                        echo '<span class="text-danger">Data not found</span>';
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