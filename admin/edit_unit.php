<?php 
include_once "header.php";
include "../connection.php";

// ------------------------------------------------------------- MySqli Connection Setup Start------------------------------------------------------------

// $id = $_GET["ID"];
// $unit = "";


// $query = "SELECT * FROM UNITS WHERE ID='$id'";

// $result = mysqli_query($link, $query);
//     while($row = mysqli_fetch_array($result)){
//          $unit = $row["UNIT"];
//     }


// ------------------------------------------------------------- MySqli Connection Setup END--------------------------------------------------------------

// ------------------------------------------------------------ Oracle Connection Setup Start-------------------------------------------------------------

$id = $_GET["ID"];
$unit = "";

$query = "SELECT * FROM UNITS WHERE ID='$id'";

$result = oci_parse($conn, $query);
oci_execute($result);
    while($row = oci_fetch_array($result, OCI_RETURN_NULLS+OCI_ASSOC)){
        $unit = $row["UNIT"];
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
                                    <label class="control-label">Unit Name :</label>
                                    <div class="controls">
                                        <input type="text" class="span11" placeholder="Unit Name" name="unit" value="<?php echo "$unit";?>" />
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
// ------------------------------------------------------------- MySqli Connection Setup Start------------------------------------------------------------

    // mysqli_query($link, "UPDATE UNITS SET UNIT='$_POST[unit]' WHERE ID='$id'");

// ------------------------------------------------------------- MySqli Connection Setup END--------------------------------------------------------------

// ------------------------------------------------------------ Oracle Connection Setup Start-------------------------------------------------------------

    $result = oci_parse($conn, "UPDATE UNITS SET UNIT='$_POST[unit]' WHERE ID='$id'");
    oci_execute($result);

// ------------------------------------------------------------ Oracle Connection Setup End---------------------------------------------------------------

    echo "<script>document.getElementById('success').style.display = 'block';
    setTimeout(function(){
        window.location = 'add_new_unit.php';
    }, 100);
    </script>";


}
?>

<?php include_once "footer.php"?>