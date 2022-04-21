<?php 
include_once "header.php";
include "../connection.php";

$id = $_GET['id'];
$company_name = "";
$product_name = "";
$unit = "";
$pack_size = "";

$query = "SELECT * FROM PRODUCTS WHERE PRODUCT_ID='$id'";
$result = oci_parse($link, $query);
oci_execute($result);
while($row = oci_fetch_array($result, OCI_RETURN_NULLS+OCI_ASSOC)){
    $company_name = $row["COMPANY_NAME"];
    $product_name = $row["PRODUCT_NAME"];
    $unit = $row["UNIT"];
    $pack_size = $row["PACK_SIZE"];
}
?>

    <div id="content">
        <!--breadcrumbs-->
        <div id="content-header">
            <div id="breadcrumb"><a href="index.html" class="tip-bottom"><i class="icon-home"></i>
            Edit Products</a></div>
        </div>
        <!--End-breadcrumbs-->

        <!--Action boxes-->
        <div class="container-fluid">

            <div class="row-fluid" style="background-color: white;  padding:10px;">
                <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                            <h5>Edit Products</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form action="" name="form1" method="POST" class="form-horizontal">

                                <div class="control-group">
                                    <label class="control-label">Select Company</label>

                                    <div class="controls">
                                       <select class="span11" name="company_name">
                                            <option>Select Company</option>
                                            <?php
                                                $sql = "SELECT * FROM COMPANY_NAME";
                                                $result = oci_parse($conn, $sql);
                                                oci_execute($result);
                                                while ($row = oci_fetch_array($result)) {
                                                    // echo "<option value='" . $row['ID'] . "'>" . $row['COMPANY_NAME'] . "</option>";
                                                    echo "<option>";
                                                    echo $row['COMPANY_NAME'];
                                                    echo "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Enter Product Name</label>

                                    <div class="controls">
                                       <input type="text" class="span11" name="product_name" placeholder="Enter Product Name" />
                                    </div>
                                </div>

                                
                                <div class="control-group">
                                    <label class="control-label">Select Units</label>

                                    <div class="controls">
                                        <select class="span11" name="unit">
                                            <option value="">Select Unit</option>
                                            <?php
                                            $sql = "SELECT * FROM UNITS";
                                            $result = oci_parse($conn, $sql);
                                            oci_execute($result);
                                            while ($row = oci_fetch_array($result)) {
                                                // echo "<option value='" . $row['ID'] . "'>" . $row['COMPANY_NAME'] . "</option>";
                                                echo "<option>";
                                                echo $row['UNIT'];
                                                echo "</option>";
                                            }
                                            ?>
                                            </select>
                                    </div>
                                </div>




                                <div class="control-group">
                                    <label class="control-label">Enter Packing Size</label>

                                    <div class="controls">
                                       <input type="text" class="span11" name="packing_name" placeholder="Enter Packing Size" />
                                    </div>
                                </div>
                                
                                <div  class="alert alert-danger" role="alert" id="error" style="text-align: center; display:none;">
                                    This Product is already exists. Please try another one.
                                </div>
                                
                                <div class="form-actions">
                                    <button type="submit" name="sumbit1" class="btn btn-success">Save</button>
                                </div>
                                <div  class="alert alert-success" role="alert" id="success" style="text-align: center; display:none;">
                                    Registration Successful.
                                </div>
                            </form>
                        </div>
                    </div>
            </div>

        </div>
    </div>


    <?php 
  

// ------------------------------------------------------------ Oracle Connection Setup Start-------------------------------------------------------------

     if(isset($_POST['sumbit1'])){
        $company_name = $_POST['company_name'];
        $product_name = $_POST['product_name'];
        $unit         = $_POST['unit'];
        $packing_name = $_POST['packing_name'];


        $query = "SELECT * FROM PRODUCTS WHERE COMPANY_NAME = '$company_name' AND PRODUCT_NAME = '$product_name' AND UNIT = '$unit' AND PACKING_SIZE = '$packing_name'";
        
        $result = oci_parse($conn, $query);
        oci_execute($result);

        if(oci_fetch_array($result)){
            echo "<script>document.getElementById('error').style.display = 'block';</script>";
        }
        
        else{
            $query = "INSERT INTO PRODUCTS (COMPANY_NAME, PRODUCT_NAME, UNIT, PACKING_SIZE) VALUES ('$company_name', '$product_name', '$unit', '$packing_name')";
            $result = oci_parse($conn, $query);
            oci_execute($result);
            if($result){
                echo "<script>document.getElementById('success').style.display = 'block';
                    setTimeout(function(){
                                window.location.href = window.location.href;
                            }, 1000);
                </script>";
            }
            else{
                echo "<script>document.getElementById('error').style.display = 'block';</script>";
            }
        }
    }

// ------------------------------------------------------------ Oracle Connection Setup End---------------------------------------------------------------

    ?>
<?php include_once "footer.php"?>