<?php
/*
|--------------------------------------------------------------------------
| Page
|--------------------------------------------------------------------------
|
| @package event-site
|
*/

// Header

if (file_exists(__DIR__ . "/inc/header.php")) {
    include __DIR__ . "/inc/header.php";
} else {
    echo "Header not found " . basename(__FILE__);
}
?>
<?php
if (isset($_GET['id'])) {
    $pageId = $_GET['id'];
}

$query = "SELECT * FROM nm_page WHERE id = '$pageId'";
$result = $db->select($query);

if ($result) {
    while ($data = $result->fetch(PDO::FETCH_ASSOC)) {
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

<?php
// Footer

if (file_exists(__DIR__ . "/inc/footer.php")) {
    include __DIR__ . "/inc/footer.php";
} else {
    echo "Footer not found " . basename(__FILE__);
}
?>