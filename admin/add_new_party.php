<?php 
include_once "header.php";
include "../connection.php";
?>

    <div id="content">
        <!--breadcrumbs-->
        <div id="content-header">
            <div id="breadcrumb"><a href="index.html" class="tip-bottom"><i class="icon-home"></i>
            Add New Party</a></div>
        </div>
        <!--End-breadcrumbs-->

        <!--Action boxes-->
        <div class="container-fluid">

            <div class="row-fluid" style="background-color: white;  padding:10px;">
                <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                            <h5>Add New Party</h5>
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
                                    <label class="control-label">Business Name :</label>
                                    <div class="controls">
                                        <input type="text" class="span11" placeholder="Business Name" name="bussiness_name" required/>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Contact</label>
                                    <div class="controls">
                                        <input  class="span11" placeholder="Enter Contact No." name="contact" required/>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Address</label>
                                    <div class="controls">
                                        <textarea class="span11" name="address"></textarea>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">City</label>
                                    <div class="controls">
                                        <input class="span11" placeholder="Enter City" name="city" required/>
                                    </div>
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
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Bussiness Name</th>
                                        <th>Contact</th>
                                        <th>Address</th>
                                        <th>City</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
// ------------------------------------------------------------- MySqli Connection Setup END--------------------------------------------------------------
                                    
                                        // $sql = "SELECT * FROM USER_REGISTRATION";
                                        // $result = mysqli_query($link, $sql);
                                        // while($row = mysqli_fetch_assoc($result)){

// ------------------------------------------------------------- MySqli Connection Setup END--------------------------------------------------------------
                                    
// ------------------------------------------------------------ Oracle Connection Setup Start-------------------------------------------------------------

                                        $query2 = "SELECT * FROM PARTY_INFO";
                                        $result2 = oci_parse($conn, $query2);
                                        oci_execute($result2);
                                        while($row = oci_fetch_array($result2, OCI_RETURN_NULLS+OCI_ASSOC)){

// ------------------------------------------------------------ Oracle Connection Setup End---------------------------------------------------------------

                                            ?>
                                                <tr>
                                                    <td><?php echo $row["FIRSTNAME"]; ?></td>
                                                    <td><?php echo $row["LASTNAME"]; ?></td>
                                                    <td><?php echo $row["BUSSINESS_NAME"]; ?></td>
                                                    <td><?php echo $row["CONTACT"]; ?></td>
                                                    <td><?php echo $row["ADDRESS"]; ?></td>
                                                    <td><?php echo $row["CITY"]; ?></td>
                                                    <td><a href="edit_party.php?ID=<?php echo $row["ID"]; ?>" style="cursor: pointer;">Edit</a></td>
                                                    <td><a href="delete_party.php?ID=<?php echo $row["ID"]; ?>" style="cursor: pointer; color:red;">Delete</a></td>
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
    //     $firstname = $_POST['firstname'];
    //     $lastname = $_POST['lastname'];
    //     $username = $_POST['username'];
    //     $password = $_POST['password'];
    //     $role = $_POST['role'];

    //     $query = "SELECT * FROM user_registration WHERE username = '$username'";
    //     $result = mysqli_query($link, $query);
    //     if(mysqli_num_rows($result) > 0){
    //         echo "<script>document.getElementById('error').style.display = 'block';</script>";
    //     }
    //     else{
    //         $query = "INSERT INTO user_registration (id ,firstname, lastname, username, password, role, status) VALUES (NULL, '$firstname', '$lastname', '$username', '$password', '$role','active')";
    //         $result = mysqli_query($link, $query);
    //         if($result){
    //             echo "<script>document.getElementById('success').style.display = 'block';
    //             setTimeout(function(){
    //                             window.location.href = window.location.href;
    //                         }, 1000);
    //             </script>";
    //         }
    //         else{
    //             echo "<script>document.getElementById('error').style.display = 'block';</script>";
    //         }
    //     }
    // }

// ------------------------------------------------------------- MySqli Connection Setup END--------------------------------------------------------------

// ------------------------------------------------------------ Oracle Connection Setup Start-------------------------------------------------------------

     if(isset($_POST['sumbit1'])){
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $bussiness_name = $_POST['bussiness_name'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];
        $city = $_POST['city'];

        
      
            $query = "INSERT INTO PARTY_INFO (FIRSTNAME, LASTNAME, BUSSINESS_NAME, CONTACT, ADDRESS, CITY) VALUES ('$firstname', '$lastname', '$bussiness_name', '$contact', '$address', '$city')";
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
    

// ------------------------------------------------------------ Oracle Connection Setup End---------------------------------------------------------------

    ?>
<?php include_once "footer.php"?>