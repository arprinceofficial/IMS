<?php 
include_once "header.php";
include "../connection.php";
?>

    <div id="content">
        <!--breadcrumbs-->
        <div id="content-header">
            <div id="breadcrumb"><a href="index.html" class="tip-bottom"><i class="icon-home"></i>
            Add New Products</a></div>
        </div>
        <!--End-breadcrumbs-->

        <!--Action boxes-->
        <div class="container-fluid">

            <div class="row-fluid" style="background-color: white;  padding:10px;">
                <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                            <h5>Add New Products</h5>
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
                                       <input type="text" class="span11" name="packing_size" placeholder="Enter Packing Size" />
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
<!-- View Users -->
            <div class="widget-content nopadding">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Company Name</th>
                                        <th>Product Name</th>
                                        <th>Unit Name</th>
                                        <th>Packing Size</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                  
// ------------------------------------------------------------ Oracle Connection Setup Start-------------------------------------------------------------

                                        $query2 = "SELECT * FROM PRODUCTS ORDER BY ID ASC";
                                        $result2 = oci_parse($conn, $query2);
                                        oci_execute($result2);
                                        while($row = oci_fetch_array($result2, OCI_RETURN_NULLS+OCI_ASSOC)){

// ------------------------------------------------------------ Oracle Connection Setup End---------------------------------------------------------------

                                            ?>
                                                <tr>
                                                    <td><?php echo $row["ID"]; ?></td>
                                                    <td><?php echo $row["COMPANY_NAME"]; ?></td>
                                                    <td><?php echo $row["PRODUCT_NAME"]; ?></td>
                                                    <td><?php echo $row["UNIT"]; ?></td>
                                                    <td><?php echo $row["PACKING_SIZE"]; ?></td>
                                                    <td><a href="edit_products.php?ID=<?php echo $row["ID"]; ?>" style="cursor: pointer;">Edit</a></td>
                                                    <td><a href="delete_products.php?ID=<?php echo $row["ID"]; ?>" style="cursor: pointer; color:red;">Delete</a></td>
                                                </tr>
                                            <?php
                                        }
                                    ?>

                                   
                                </tbody>
                            </table>
                        </div>
            <!-- End View Users -->
        </div>
    </div>


    <?php 
  

// ------------------------------------------------------------ Oracle Connection Setup Start-------------------------------------------------------------

     if(isset($_POST['sumbit1'])){
        $company_name = $_POST['company_name'];
        $product_name = $_POST['product_name'];
        $unit         = $_POST['unit'];
        $packing_size = $_POST['packing_size'];
        $count = 0;

        $query = "SELECT  PRODUCT_NAME FROM PRODUCTS WHERE PRODUCT_NAME = upper('$product_name')";
        $result = oci_parse($conn, $query);
        oci_execute($result);
        while ($row = oci_fetch_array($result)) {
            $count++;
        }

        if($count == 0){
            $query = "INSERT INTO PRODUCTS (COMPANY_NAME, PRODUCT_NAME, UNIT, PACKING_SIZE) VALUES (UPPER('$company_name'), UPPER('$product_name'), UPPER('$unit'), '$packing_size')";
            $result = oci_parse($conn, $query);
            oci_execute($result);
            echo "<script>document.getElementById('success').style.display = 'block';
                        setTimeout(function(){
                            window.location.href = window.location.href;
                            }, 1000);
                </script>";
        }else{
            echo "<script>document.getElementById('error').style.display = 'block';</script>";
        }
    }

// ------------------------------------------------------------ Oracle Connection Setup End---------------------------------------------------------------

    ?>
<?php include_once "footer.php"?>