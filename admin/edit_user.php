<?php 
include_once "header.php";
include "../connection.php";

// ------------------------------------------------------------- MySqli Connection Setup Start------------------------------------------------------------

$username = $_GET["USERNAME"];
$firstname = "";
$lastname = "";
$password = "";
$status = "";
$role = "";

$query = "SELECT * FROM user_registration WHERE USERNAME='$username'";

$result = mysqli_query($link, $query);
    while($row = mysqli_fetch_array($result)){
         $firstname = $row["FIRSTNAME"];
         $lastname = $row["LASTNAME"];
         $password = $row["PASSWORD"];
         $role = $row["ROLE"];
         $status = $row["STATUS"];
    }


// ------------------------------------------------------------- MySqli Connection Setup END--------------------------------------------------------------

// ------------------------------------------------------------ Oracle Connection Setup Start-------------------------------------------------------------

// $username = $_GET["USERNAME"];
// $firstname = "";
// $lastname = "";
// $password = "";
// $status = "";
// $role = "";

// $query = "SELECT * FROM USER_REGISTRATION WHERE USERNAME='$username'";

// $result = oci_parse($conn, $query);
// oci_execute($result);
//     while($row = oci_fetch_array($result, OCI_RETURN_NULLS+OCI_ASSOC)){
//         $firstname = $row["FIRSTNAME"];
//         $lastname = $row["LASTNAME"];
//         $password = $row["PASSWORD"];
//         $role = $row["ROLE"];
//         $status = $row["STATUS"];
//     }

// ------------------------------------------------------------ Oracle Connection Setup End---------------------------------------------------------------


?>

    <div id="content">
        <!--breadcrumbs-->
        <div id="content-header">
            <div id="breadcrumb"><a href="index.php" class="tip-bottom"><i class="icon-home"></i>
            Home </a></div>
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
                                    <label class="control-label">First Name :</label>
                                    <div class="controls">
                                        <input type="text" class="span11" placeholder="First name" name="firstname" value="<?php echo "$firstname";?>" />
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Last Name :</label>
                                    <div class="controls">
                                        <input type="text" class="span11" placeholder="Last name" name="lastname" value="<?php echo "$lastname"; ?>"/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">User Name :</label>
                                    <div class="controls">
                                        <input type="text" class="span11" placeholder="User Name" name="username" readonly value="<?php echo "$username";?>"/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Password input</label>
                                    <div class="controls">
                                        <input type="password" class="span11" placeholder="Enter Password" name="password" value="<?php echo "$password"; ?>"/>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Select Role</label>
                                    <div class="controls">
                                        <select name="role" class="span3" >
                                            <?php
                                                if($role == "admin"){
                                                    echo "<option value='admin' selected>Admin</option>";
                                                    echo "<option value='user'>User</option>";
                                                }
                                                else{
                                                    echo "<option value='admin'>Admin</option>";
                                                    echo "<option value='user' selected>User</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Select Status</label>
                                    <div class="controls">
                                        <select name="status" class="span3" >
                                            <?php
                                                if($status == "active"){
                                                    echo "<option value='active' selected>Active</option>";
                                                    echo "<option value='inactive'>Inactive</option>";
                                                }
                                                else{
                                                    echo "<option value='active'>Active</option>";
                                                    echo "<option value='inactive' selected>Inactive</option>";
                                                }
                                            ?>
                                        </select>
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

    mysqli_query($link, "UPDATE user_registration SET FIRSTNAME='$_POST[firstname]', LASTNAME='$_POST[lastname]', PASSWORD='$_POST[password]', ROLE='$_POST[role]', STATUS='$_POST[status]' WHERE USERNAME='$username'");

// ------------------------------------------------------------- MySqli Connection Setup END--------------------------------------------------------------

// ------------------------------------------------------------ Oracle Connection Setup Start-------------------------------------------------------------

    // $result = oci_parse($conn, "UPDATE USER_REGISTRATION SET FIRSTNAME='$_POST[firstname]', LASTNAME='$_POST[lastname]', PASSWORD='$_POST[password]', ROLE='$_POST[role]', STATUS='$_POST[status]' WHERE USERNAME='$username'");
    // oci_execute($result);

// ------------------------------------------------------------ Oracle Connection Setup End---------------------------------------------------------------

    echo "<script>document.getElementById('success').style.display = 'block';
    setTimeout(function(){
        window.location = 'add_new_user.php';
    }, 100);
    </script>";


}
?>

<?php include_once "footer.php"?>