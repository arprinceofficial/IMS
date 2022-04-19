<?php
include "../connection.php";
// ------------------------------------------------------------- MySqli Connection Setup Start------------------------------------------------------------

$username = $_GET["USERNAME"]; 
mysqli_query($link, "DELETE FROM user_registration WHERE USERNAME='$username'");

// ------------------------------------------------------------- MySqli Connection Setup END--------------------------------------------------------------

// ------------------------------------------------------------ Oracle Connection Setup Start-------------------------------------------------------------

// $username = $_GET["USERNAME"];
// $query = "DELETE FROM user_registration WHERE USERNAME='$username'";
// $result = oci_parse($conn, $query);
// oci_execute($result);

// ------------------------------------------------------------ Oracle Connection Setup End---------------------------------------------------------------

?>

<script type="text/javascript">
    window.location = "add_new_user.php";
</script>