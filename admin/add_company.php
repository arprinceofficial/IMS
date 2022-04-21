<?php 
include_once "header.php";
include "../connection.php";
?>

    <div id="content">
        <!--breadcrumbs-->
        <div id="content-header">
            <div id="breadcrumb"><a href="index.html" class="tip-bottom"><i class="icon-home"></i>
            Add Company</a></div>
        </div>
        <!--End-breadcrumbs-->

        <!--Action boxes-->
        <div class="container-fluid">

            <div class="row-fluid" style="background-color: white;  padding:10px;">
                <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                            <h5>Add Company</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form action="" name="form1" method="POST" class="form-horizontal">
                                <div class="control-group">
                                    <label class="control-label">Company Name :</label>
                                    <div class="controls">
                                        <input type="text" class="span11" placeholder="Company Name" name="company_name" required/>
                                    </div>
                                </div>
                                
                                <div  class="alert alert-danger" role="alert" id="error" style="text-align: center; display:none;">
                                    This Company already exists. Please try another one.
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

                                        $query2 = "SELECT * FROM COMPANY_NAME";
                                        $result2 = oci_parse($conn, $query2);
                                        oci_execute($result2);
                                        while($row = oci_fetch_array($result2, OCI_RETURN_NULLS+OCI_ASSOC)){

// ------------------------------------------------------------ Oracle Connection Setup End---------------------------------------------------------------

                                            ?>
                                                <tr>
                                                    <td><?php echo $row["ID"]; ?></td>
                                                    <td><?php echo $row["COMPANY_NAME"]; ?></td>
                                                    <td><a href="edit_company.php?ID=<?php echo $row["ID"]; ?>" style="cursor: pointer;">Edit</a></td>
                                                    <td><a href="delete_company.php?ID=<?php echo $row["ID"]; ?>" style="cursor: pointer; color:red;">Delete</a></td>
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
    //     $company_name = $_POST['unitname'];

    //     $query = "SELECT * FROM UNITS WHERE UNIT = '$company_name'";
    //     $result = mysqli_query($link, $query);
        
    //     if($result){
	// 	$query = "INSERT INTO UNITS (ID ,UNIT) VALUES (NULL, '$company_name')" ;
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
        $company_name = $_POST['company_name'];

        $query = "SELECT * FROM COMPANY_NAME WHERE (COMPANY_NAME) = '$company_name'";
        // $query = "SELECT UPPER(COMPANY_NAME) FROM COMPANY_NAME WHERE (COMPANY_NAME) = '$company_name';";
        $result = oci_parse($conn, $query);
        oci_execute($result);

        if(oci_fetch_array($result)){
            echo "<script>document.getElementById('error').style.display = 'block';</script>";
        }
        
        else{
            $query = "INSERT INTO COMPANY_NAME (COMPANY_NAME) VALUES ('$company_name')" ;
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