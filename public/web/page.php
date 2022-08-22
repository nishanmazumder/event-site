<?php include 'inc/header.php'; ?>
<?php
if (isset($_GET['id'])) {
    $pageId = $_GET['id'];
}

$query = "SELECT * FROM nm_page WHERE id = '$pageId'";
$result = $db->select($query);

if ($result) {
    while ($data = $result->fetch_assoc()) {
        ?>
        <div class="container nm-page">
            <div class="row no-gutters align-items-center">
                <div class="col-md-12 text-center">
                    <h1><?php echo $data['page_title']; ?></h1>
                    <div class="nm-line-middle"></div>
                </div>
                <div class="col-md-12">
                    <?= $data['page_des']; ?>
                </div>
            </div>
        </div>

        <?php
    }
}
?>

<div class="nm-clerfix"></div>

<?php include 'inc/footer.php'; ?>