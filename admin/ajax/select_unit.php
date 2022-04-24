<?php 
include "../../connection.php";
$company_name = $_GET['COMPANY_NAME'];
$product_name = $_GET['PRODUCT_NAME'];
$sql = "SELECT * FROM PRODUCTS WHERE COMPANY_NAME='$company_name' AND PRODUCT_NAME='$product_name'";
$result = oci_parse($conn, $sql);
oci_execute($result);
?>

<select class="span11" name="unit" id="unit" >
    <option>Select</option>
    <?php
        while ($row = oci_fetch_array($result)) {
            echo "<option>";
            echo $row['UNIT'];
            echo "</option>";
        }
    ?>
</select>

