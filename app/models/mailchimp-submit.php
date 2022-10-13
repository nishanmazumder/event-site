<?php

include('MailChimp.php');

use \DrewM\MailChimp\MailChimp;

$MailChimpApi = 'b8c18a33ad415883acc7680ddba9db08-us13';
$list_id = 'af59aa2891';
$MailChimp = new MailChimp($MailChimpApi);

if ($_POST) {
    $mail = $_POST['subscriberMail'];

    $result = $MailChimp->post("lists/$list_id/members", [
        'email_address' => $mail,
        'status' => 'subscribed',
    ]);

    if ($MailChimp->success()) {
        echo "<script>window.location='../index.php';</script>";
    } else {
        echo $MailChimp->getLastError();
    }
}


