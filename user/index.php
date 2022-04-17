<?php include "connection.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login - php inventory management system</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css"/>
    <link rel="stylesheet" href="css/matrix-login.css"/>
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet"/>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

</head>
<body style="text-align: center;">
<div id="loginbox">
    <form name="form1" class="form-vertical" action="" method="post">
        <div class="control-group normal_text"><h3>Login Page</h3></div>
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_lg"><i class="icon-user"> </i></span><input type="text"
                                                                                       placeholder="Username" name="userid" required>
                </div>
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password"
                                                                                      placeholder="Password" name="password" required>
                </div>
            </div>
        </div>
        <div class="form-actions">
            
            <input type="submit" name="submit1" value="Login" class="btn btn-success"/>
        </div>
    </form>

</div>

<?php 
if(isset($_POST['submit1'])){
    // $username = $_POST['username'];
    // $password = $_POST['password'];
    // $query = "SELECT * FROM `admin` WHERE `username` = '$username' AND `password` = '$password'";
    // $result = mysqli_query($link, $query);
    // if(mysqli_num_rows($result) > 0){
    //     $_SESSION['username'] = $username;
    //     header('location: index.php');
    // }
    // else{
    //     echo "<script>alert('Invalid username or password')</script>";
    // }
// ------------------------------------------------------------- MySqli Connection Setup Start------------------------------------------------------------

        // $username = mysqli_real_escape_string($link, $_POST['username']);
        // $password = mysqli_real_escape_string($link, $_POST['password']);
        // $count = 0;
        // $res = mysqli_query($link, "SELECT * FROM `user_registration` WHERE `username` = '$username' AND `password` = '$password'");
        // $count = mysqli_num_rows($res);

// ------------------------------------------------------------- MySqli Connection Setup END--------------------------------------------------------------

// ------------------------------------------------------------ Oracle Connection Setup Start-------------------------------------------------------------

            $username = $_POST['userid'];
            $password = $_POST['password'];
            $count = 0;
            $res = oci_parse($conn, "SELECT * FROM USER_INFO WHERE userid = '$username' AND password = '$password'");
            oci_execute($res);
            $count = oci_fetch_row($res);

// ------------------------------------------------------------ Oracle Connection Setup End---------------------------------------------------------------

        if($count)
        {
            ?> 
                <script type="text/javascript">
                    window.location.href='demo.php';
                </script>
            <?php
        }
        else
        {
            ?> 
                <div class="alert alert-danger" role="alert">
                    Invalid username or password
                </div>
            <?php
        }

}

?>


<script src="js/jquery.min.js"></script>
<script src="js/matrix.login.js"></script>
</body>

</html>
