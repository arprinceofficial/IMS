<?php 
include_once "header.php";
include_once "../user/connection.php";
?>

    <div id="content">
        <!--breadcrumbs-->
        <div id="content-header">
            <div id="breadcrumb"><a href="index.html" class="tip-bottom"><i class="icon-home"></i>
            Add New User</a></div>
        </div>
        <!--End-breadcrumbs-->

        <!--Action boxes-->
        <div class="container-fluid">

            <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
                <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                            <h5>Add New User</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form action="" name="form1" method="POST" class="form-horizontal">
                                <div class="control-group">
                                    <label class="control-label">First Name :</label>
                                    <div class="controls">
                                        <input type="text" class="span11" placeholder="First name" name="firstname" required/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Last Name :</label>
                                    <div class="controls">
                                        <input type="text" class="span11" placeholder="Last name" name="lastname" required/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">User Name :</label>
                                    <div class="controls">
                                        <input type="text" class="span11" placeholder="User name" name="username" required/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Password input</label>
                                    <div class="controls">
                                        <input type="password" class="span11" placeholder="Enter Password" name="password" required/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Select Role</label>
                                    <div class="controls">
                                        <select name="role" class="span3" required>
                                            <option value="">None</option>
                                            <option value="admin">Admin</option>
                                            <option value="user">User</option>
                                        </select>
                                    </div>
                                </div>
                                <div  class="alert alert-danger" role="alert" id="error" style="text-align: center; display:none;">
                                    This username already exists. Please try another one.
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
    // if(isset($_POST['sumbit1'])){
    //     $firstname = $_POST['firstname'];
    //     $lastname = $_POST['lastname'];
    //     $username = $_POST['username'];
    //     $password = $_POST['password'];
    //     $role = $_POST['role'];

    //     $query = "INSERT INTO user_registration (id ,firstname, lastname, username, password, role, status) VALUES (NULL, '$firstname', '$lastname', '$username', '$password', '$role','active')";
    //     $result = mysqli_query($conn, $query);
    //     if($result){
    //         echo "<script>document.getElementById('success').style.display = 'block';</script>";
    //     }
    //     else{
    //         echo "<script>document.getElementById('error').style.display = 'block';</script>";
    //     }
    // }

    if(isset($_POST['sumbit1'])){
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $role = $_POST['role'];

        $query = "SELECT * FROM user_registration WHERE username = '$username'";
        $result = mysqli_query($link, $query);
        if(mysqli_num_rows($result) > 0){
            echo "<script>document.getElementById('error').style.display = 'block';</script>";
        }
        else{
            $query = "INSERT INTO user_registration (id ,firstname, lastname, username, password, role, status) VALUES (NULL, '$firstname', '$lastname', '$username', '$password', '$role','active')";
            $result = mysqli_query($link, $query);
            if($result){
                echo "<script>document.getElementById('success').style.display = 'block';</script>";
            }
            else{
                echo "<script>document.getElementById('error').style.display = 'block';</script>";
            }
        }
    }
    
    ?>
<?php include_once "footer.php"?>