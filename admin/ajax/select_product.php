<?php 
include "../../connection.php";
$company_name = $_GET['COMPANY_NAME'];
$sql = "SELECT * FROM PRODUCTS WHERE COMPANY_NAME='$company_name'";
$result = oci_parse($conn, $sql);
oci_execute($result);
?>

<select class="span11" name="product_name" id="product_name" onchange="select_product(this.value, '<?php echo ($company_name) ?>')">
    <option>Select</option>
    <?php
    while ($row = oci_fetch_array($result)) {
        echo "<option>";
        echo $row['PRODUCT_NAME'];
        echo "</option>";
    }
    ?>
</select>

