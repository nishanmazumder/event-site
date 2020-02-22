<?php include 'inc/header.php'; ?>

<div class="container nm-section">
    <div class="row">
        <h1 class="text-success text-center" style="margin: 0px auto; margin-top: 50px;">
            <?php
            if(isset($_SESSION["Msg"])){
                echo $_SESSION["Msg"];
            }else{
                echo "<script>window.location = 'index.php';</script>";
            }
            unset($_SESSION["Msg"]);
            ?>
        </h1>
    </div>
</div>

<?php include 'inc/footer.php'; ?>
