<?php

if (file_exists(__DIR__ . "/../../vendor/autoload.php")) {
	require_once __DIR__ . "/../../vendor/autoload.php";
} else {
	echo "Autoloader not found! - notification.php";
}



?>

<?php include DIR.'/public/web/inc/header.php'; ?>

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

<?php include DIR.'/public/web/inc/footer.php'; ?>
