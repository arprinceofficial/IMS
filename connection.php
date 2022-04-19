<?php 
// ------------------------------------------------------------- MySqli Connection Setup Start------------------------------------------------------------

$link = mysqli_connect("localhost", "root", "") or die(mysqli_error($link));
mysqli_select_db($link, "php_ims") or die(mysqli_error($link)); //php_ims is the database name

// ------------------------------------------------------------- MySqli Connection Setup END--------------------------------------------------------------

// ------------------------------------------------------------ Oracle Connection Setup Start-------------------------------------------------------------

// $db = "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = localhost)(PORT = 1521)))(CONNECT_DATA=(SID=orcl)))" ;
//             if($conn = OCILogon("prince", "1234", $db))
//             {
//                 // echo "Successfully connected to Oracle.";
//             }
//             else
//             {
//                 $err = OCIError();
//                 echo "Connection failed." . $err['text'];
//             }

// ------------------------------------------------------------ Oracle Connection Setup End---------------------------------------------------------------

?>