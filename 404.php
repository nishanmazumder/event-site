<?php include __DIR__. '/public/web/inc/header.php'; ?>

<div class="container nm-section">
    <div class="row">
        <h1 class="text-danger text-center" style="margin: 0px auto; font-size: 70px; margin-top: 50px;">
            Error: 404 !
        </h1>
        <h1 class="text-center" style="margin: 0px auto;">Opps! Something went wrong. Please check again.</h1>
    </div>
</div>

<?php
if (file_exists(DIR . "/public/web/inc/footer.php")) {
    include DIR . "/public/web/inc/footer.php";
} else {
    echo "Footer not found from Login page!";
}
?>
