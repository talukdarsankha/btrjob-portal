<?php
if (isset($_SERVER['HTTP_REFERER'])) {
    $referer = $_SERVER['HTTP_REFERER'];
    include('company-kyc-submit.php');
} else {
    include('403_error.php');
}
?>