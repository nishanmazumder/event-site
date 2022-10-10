<?php
/*
|--------------------------------------------------------------------------
| Notification
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

<div class="container nm-section">
    <div class="row">
        <h1 class="text-success text-center" style="margin: 0px auto; margin-top: 50px;">
            <?php
            if(isset($_SESSION["Msg"])){
                echo $_SESSION["Msg"];
            }else{
                echo "<script>window.location = 'index.php';</script>";
            }
            //unset($_SESSION["Msg"]);
            ?>
        </h1>
    </div>
</div>

<?php
// Footer

if (file_exists(__DIR__ . "/inc/footer.php")) {
    include __DIR__ . "/inc/footer.php";
} else {
    echo "Footer not found " . basename(__FILE__);
}
?>
