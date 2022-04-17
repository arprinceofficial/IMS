<?php 

$link = mysqli_connect("localhost", "root", "") or die(mysqli_error($link));
mysqli_select_db($link, "php_ims") or die(mysqli_error($link));
?>

<?php 

// $link = oci_connect("prince", "1234", "localhost/XE") or die(oci_error($link));
// oci_select_db($link, "orcl") or die(oci_error($link));
?>