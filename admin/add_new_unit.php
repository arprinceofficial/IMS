<?php 
include_once "header.php";
include "../connection.php";
?>

    <div id="content">
        <!--breadcrumbs-->
        <div id="content-header">
            <div id="breadcrumb"><a href="index.html" class="tip-bottom"><i class="icon-home"></i>
            Add New Unit</a></div>
        </div>
        <!--End-breadcrumbs-->

        <!--Action boxes-->
        <div class="container-fluid">

            <div class="row-fluid" style="background-color: white;  padding:10px;">
                <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                            <h5>Add New Unit</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form action="" name="form1" method="POST" class="form-horizontal">
                                <div class="control-group">
                                    <label class="control-label">Unit Name :</label>
                                    <div class="controls">
                                        <input type="text" class="span11" placeholder="Unit Name" name="unitname" required/>
                                    </div>
                                </div>
                                
                                <div  class="alert alert-danger" role="alert" id="error" style="text-align: center; display:none;">
                                    This Unit already exists. Please try another one.
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
                                        <th>Unit Name</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
// ------------------------------------------------------------- MySqli Connection Setup END--------------------------------------------------------------
                                    
                                        // $sql = "SELECT * FROM UNITS";
                                        // $result = mysqli_query($link, $sql);
                                        // while($row = mysqli_fetch_assoc($result)){

// ------------------------------------------------------------- MySqli Connection Setup END--------------------------------------------------------------
                                    
// ------------------------------------------------------------ Oracle Connection Setup Start-------------------------------------------------------------

                                        $query2 = "SELECT * FROM UNITS ORDER BY ID ASC";
                                        $result2 = oci_parse($conn, $query2);
                                        oci_execute($result2);
                                        while($row = oci_fetch_array($result2, OCI_RETURN_NULLS+OCI_ASSOC)){

// ------------------------------------------------------------ Oracle Connection Setup End---------------------------------------------------------------

                                            ?>
                                                <tr>
                                                    <td><?php echo $row["ID"]; ?></td>
                                                    <td><?php echo $row["UNIT"]; ?></td>
                                                    <td><a href="edit_unit.php?ID=<?php echo $row["ID"]; ?>" style="cursor: pointer;">Edit</a></td>
                                                    <td><a href="delete_unit.php?ID=<?php echo $row["ID"]; ?>" style="cursor: pointer; color:red;">Delete</a></td>
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
  
// ------------------------------------------------------------- MySqli Connection Setup Start------------------------------------------------------------

    // if(isset($_POST['sumbit1'])){
    //     $unitname = $_POST['unitname'];

    //     $query = "SELECT * FROM UNITS WHERE UNIT = '$unitname'";
    //     $result = mysqli_query($link, $query);
        
    //     if($result){
	// 	$query = "INSERT INTO UNITS (ID ,UNIT) VALUES (NULL, '$unitname')" ;
    //         	$result = mysqli_query($link, $query);
    //             echo "<script>document.getElementById('success').style.display = 'block';
    //             setTimeout(function(){
    //                             window.location.href = window.location.href;
    //                         }, 1000);
    //             </script>";
    //         }
    //         else{
    //             echo "<script>document.getElementById('error').style.display = 'block';</script>";
    //         }
    // }

// ------------------------------------------------------------- MySqli Connection Setup END--------------------------------------------------------------

// ------------------------------------------------------------ Oracle Connection Setup Start-------------------------------------------------------------

     if(isset($_POST['sumbit1'])){
        $unitname = $_POST['unitname'];

        $query = "SELECT * FROM UNITS WHERE UNIT = '$unitname'";
        $result = oci_parse($conn, $query);
        oci_execute($result);
        
        if($result){
		$query = "INSERT INTO UNITS (ID ,UNIT) VALUES ('', '$unitname')" ;
            	$result = oci_parse($conn, $query);
                oci_execute($result);
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
    

// ------------------------------------------------------------ Oracle Connection Setup End---------------------------------------------------------------

    ?>
<?php include_once "footer.php"?>