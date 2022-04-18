<?php 
include_once "header.php";
include "../connection.php";

// ------------------------------------------------------------- MySqli Connection Setup Start------------------------------------------------------------
$username = $_GET["USERNAME"];
$firstname = "";
$lastname = "";
$username = "";
$password = "";
$status = "";
$role = "";

$query = "SELECT * FROM user_registration WHERE USERNAME='$username'";

$result = mysqli_query($link, $query);
    while($row = mysqli_fetch_row($result)){
        $firstname = $row['firstname'];
    }


// ------------------------------------------------------------- MySqli Connection Setup END--------------------------------------------------------------
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
                                        <input type="text" class="span11" placeholder="Last name" name="lastname" />
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
                                        <input type="password" class="span11" placeholder="Enter Password" name="password" "/>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Select Role</label>
                                    <div class="controls">
                                        <select name="role" class="span3" >
                                            <option value="">None</option>
                                            <option <?php if($role=="admin") ?> >Admin</option>
                                            <option <?php if($role=="user") ?>>User</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Select Status</label>
                                    <div class="controls">
                                        <select name="status" class="span3" >
                                            <option value="">None</option>
                                            <option value="admin">Active</option>
                                            <option value="user">Inactive</option>
                                        </select>
                                    </div>
                                </div>

                            
                                
                                <div class="form-actions">
                                    <button type="submit" name="sumbit1" class="btn btn-success">Save</button>
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
    
}
?>

<?php include_once "footer.php"?>