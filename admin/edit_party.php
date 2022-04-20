<?php 
include_once "header.php";
include "../connection.php";

$id = $_GET['ID'];
$firstname = "";
$lastname ="";
$bussiness_name = "";
$contact = "";
$address = "";
$city = "";

$query = "SELECT * FROM PARTY_INFO WHERE ID='$id'";

$result = oci_parse($conn, $query);
oci_execute($result);
    while($row = oci_fetch_array($result, OCI_RETURN_NULLS+OCI_ASSOC)){
        $firstname = $row['FIRSTNAME'];
        $lastname = $row['LASTNAME'];
        $bussiness_name = $row['BUSSINESS_NAME'];
        $contact = $row['CONTACT'];
        $address = $row['ADDRESS'];
        $city = $row['CITY'];

    }

?>

    <div id="content">
        <!--breadcrumbs-->
        <div id="content-header">
            <div id="breadcrumb"><a href="index.html" class="tip-bottom"><i class="icon-home"></i>
            Edit New Party</a></div>
        </div>
        <!--End-breadcrumbs-->

        <!--Action boxes-->
        <div class="container-fluid">

            <div class="row-fluid" style="background-color: white;  padding:10px;">
                <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                            <h5>Edit New Party</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form action="" name="form1" method="POST" class="form-horizontal">
                                <div class="control-group">
                                    <label class="control-label">First Name :</label>
                                    <div class="controls">
                                        <input type="text" class="span11" placeholder="First name" name="firstname" value="<?php echo "$firstname";?>" required/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Last Name :</label>
                                    <div class="controls">
                                        <input type="text" class="span11" placeholder="Last name" name="lastname" value="<?php echo "$lastname";?>" required/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Business Name :</label>
                                    <div class="controls">
                                        <input type="text" class="span11" placeholder="Business Name" name="bussiness_name" value="<?php echo "$bussiness_name";?>"  required/>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Contact</label>
                                    <div class="controls">
                                        <input  class="span11" placeholder="Enter Contact No." name="contact" value="<?php echo "$contact";?>"  required/>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Address</label>
                                    <div class="controls">
                                        <textarea class="span11" name="address"><?php echo "$address";?></textarea>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">City</label>
                                    <div class="controls">
                                        <input class="span11" placeholder="Enter City" name="city" value="<?php echo "$city";?>"  required/>
                                    </div>
                                </div>

                                
                                
                                <div class="form-actions">
                                    <button type="submit" name="sumbit1" class="btn btn-success">Save</button>
                                </div>
                                <div  class="alert alert-success" role="alert" id="success" style="text-align: center; display:none;">
                                    Update Successful.
                                </div>
                            </form>
                        </div>
                    </div>
            </div>

        </div>
    </div>


    <?php 
  
// ------------------------------------------------------------- MySqli Connection Setup Start------------------------------------------------------------

//    mysqli_query($link, "UPDATE PARTY_INFO SET FIRSTNAME='$_POST[firstname]', LASTNAME='$_POST[lastname]', BUSSINESS_NAME='$_POST[bussiness_name]', CONTACT='$_POST[contact]', ADDRESS='$_POST[address]', CITY='$_POST[city]' WHERE ID='$id'");

// ------------------------------------------------------------- MySqli Connection Setup END--------------------------------------------------------------

// ------------------------------------------------------------ Oracle Connection Setup Start-------------------------------------------------------------

     if(isset($_POST['sumbit1'])){
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $bussiness_name = $_POST['bussiness_name'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];
        $city = $_POST['city'];

            $query = "UPDATE PARTY_INFO SET FIRSTNAME = '$firstname', LASTNAME = '$lastname', BUSSINESS_NAME = '$bussiness_name', CONTACT = '$contact', ADDRESS = '$address', CITY = '$city' WHERE ID = '$id'";
            $result = oci_parse($conn, $query);
            oci_execute($result); 
            echo "<script>document.getElementById('success').style.display = 'block';
                        setTimeout(function(){
                            window.location = 'add_new_party.php';
                        }, 100);
                    </script>";
    }
    

// ------------------------------------------------------------ Oracle Connection Setup End---------------------------------------------------------------

              
    ?>
<?php include_once "footer.php"?>