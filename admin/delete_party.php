<?php
include "../connection.php";
// ------------------------------------------------------------- MySqli Connection Setup Start------------------------------------------------------------

// $id = $_GET["ID"]; 
// mysqli_query($link, "DELETE FROM user_registration WHERE ID='$id'");

// ------------------------------------------------------------- MySqli Connection Setup END--------------------------------------------------------------

// ------------------------------------------------------------ Oracle Connection Setup Start-------------------------------------------------------------

$id = $_GET["ID"];
$query = "DELETE FROM PARTY_INFO WHERE ID='$id'";
$result = oci_parse($conn, $query);
oci_execute($result);

// ------------------------------------------------------------ Oracle Connection Setup End---------------------------------------------------------------

?>

<script type="text/javascript">
    window.location = "add_new_party.php";
</script>