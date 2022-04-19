<?php
include "../connection.php";

// ------------------------------------------------------------- MySqli Connection Setup Start------------------------------------------------------------

$id= $_GET["ID"]; 
mysqli_query($link, "DELETE FROM UNITS WHERE ID='$id'");

// ------------------------------------------------------------- MySqli Connection Setup END--------------------------------------------------------------

// ------------------------------------------------------------ Oracle Connection Setup Start-------------------------------------------------------------

// $id= $_GET["ID"]; 
// $query = "DELETE FROM UNITS WHERE ID='$id'";
// $result = oci_parse($conn, $query);
// oci_execute($result);

// ------------------------------------------------------------ Oracle Connection Setup End---------------------------------------------------------------

?>

<script type="text/javascript">
    window.location = "add_new_unit.php";
</script>