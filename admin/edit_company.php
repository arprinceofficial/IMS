<?php 
include_once "header.php";
include "../connection.php";

$id = $_GET["ID"];
$company_name = "";

$query = "SELECT * FROM COMPANY_NAME WHERE ID='$id'";

$result = oci_parse($conn, $query);
oci_execute($result);
    while($row = oci_fetch_array($result, OCI_RETURN_NULLS+OCI_ASSOC)){
        $company_name = $row["COMPANY_NAME"];
    }

// ------------------------------------------------------------ Oracle Connection Setup End---------------------------------------------------------------


?>

    <div id="content">
        <!--breadcrumbs-->
        <div id="content-header">
            <div id="breadcrumb"><a href="index.php" class="tip-bottom"><i class="icon-home"></i>
            Edit Unit </a></div>
        </div>
        <!--End-breadcrumbs-->

        <!--Action boxes-->
        <div class="container-fluid">

            <div class="row-fluid" style="background-color: white; padding:10px;">
                <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                            <h5>Edit User</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form action="" name="form1" method="POST" class="form-horizontal">
                                <div class="control-group">
                                    <label class="control-label">Company Name :</label>
                                    <div class="controls">
                                        <input type="text" class="span11" placeholder="Company Name" name="company_name" value="<?php echo "$company_name";?>" />
                                    </div>
                                </div>
                               
                            
                                
                                <div class="form-actions">
                                    <button type="submit" name="sumbit1" class="btn btn-success">Update</button>
                                </div>
                                <div  class="alert alert-success" role="alert" id="success" style="text-align: center; display:none;">
                                    Updated Successful.
                                </div>
                            </form>
                        </div>
                    </div>

            </div>
            </div>

        </div>
    </div>

<?php

if(isset($_POST['sumbit1'])){

// ------------------------------------------------------------ Oracle Connection Setup Start-------------------------------------------------------------

    $result = oci_parse($conn, "UPDATE COMPANY_NAME SET COMPANY_NAME='$_POST[company_name]' WHERE ID='$id'");
    oci_execute($result);

// ------------------------------------------------------------ Oracle Connection Setup End---------------------------------------------------------------

    echo "<script>document.getElementById('success').style.display = 'block';
    setTimeout(function(){
        window.location = 'add_company.php';
    }, 100);
    </script>";


}
?>

<?php include_once "footer.php"?>