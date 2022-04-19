<!DOCTYPE html>
<html lang="en">

<head>
    <title>PHP IMS</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="css/fullcalendar.css" />
    <link rel="stylesheet" href="css/matrix-style.css" />
    <link rel="stylesheet" href="css/matrix-media.css" />
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/jquery.gritter.css" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
    <script src="../app/app.js"></script>
</head>

<body>


    <div id="header">

        <h2 style="color: white;position: absolute">
            <a href="dashboard.html" style="color:white; margin-left: 25px; margin-top: 40px">User - IMS</a>
        </h2>
    </div>



    <!--top-Header-menu-->
    <div id="user-nav" class="navbar navbar-inverse">
        <ul class="nav">
            <li class="dropdown" id="profile-messages">
                <a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i
                    class="icon icon-user"></i> <span class="text">Welcome User</span><b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="icon-user"></i> My Profile</a></li>
                    <li class="divider"></li>
                    <li><a href="#"><i class="icon-check"></i> My Tasks</a></li>
                    <li class="divider"></li>
                    <li><a href="index.php"><i class="icon-key"></i> Log Out</a></li>
                </ul>
            </li>
        </ul>

    </div>

    <!--sidebar-menu-->
    <div id="sidebar">
        <ul>
            <li class="active">
                <a href="demo.php"><i class="icon icon-home"></i><span>Dashboard</span></a>
            </li>
            <li>
                <a href="reports.php"><i class="icon icon-home"></i><span>Reports</span></a>
            </li>
        </ul>
    </div>
    <!--sidebar-menu-->
    <div id="search">

        <a href="index.php" style="color:white"><i class="icon icon-share-alt"></i><span>LogOut</span></a>

    </div>

        <!--main-container-part-->
    <div id="content">
        <!--breadcrumbs-->
        <div id="content-header">
            <div id="breadcrumb"><a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
            Home</a></div>
        </div>
        <!--End-breadcrumbs-->

        <!--Action boxes-->
        <div class="container-fluid">

            <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
                <div class="report-button">
                    <button type="button" class="btn btn-primary btn-sm" onClick="countries()" >Countries Data</button>
                    <button type="button" class="btn btn-primary btn-sm" onClick="departments()" >Departments Data</button>
                    <button type="button" class="btn btn-primary btn-sm" onClick="employees()" >Employees Data</button>
                    <button type="button" class="btn btn-primary btn-sm" onClick="jobs()" >Jobs Data</button>
                    <button type="button" class="btn btn-primary btn-sm" onClick="job_history()" >Job History Data</button>
                    <button type="button" class="btn btn-primary btn-sm" onClick="locations()" >locations Data</button>
                    <button type="button" class="btn btn-primary btn-sm" onClick="regions()" >Regions Data</button>
                </div>
            </div>

        </div>
    </div>

    <!--end-main-container-part-->

 <!--Footer-part-->

    <div class="row-fluid">
        <div id="footer" class="span12" style="color:white"> Designed And Developed By: Your Name</div>
    </div>

    <!--end-Footer-part-->

    <script src="js/excanvas.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.ui.custom.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.flot.min.js"></script>
    <script src="js/jquery.flot.resize.min.js"></script>
    <script src="js/jquery.peity.min.js"></script>
    <script src="js/fullcalendar.min.js"></script>
    <script src="js/matrix.js"></script>
    <script src="js/matrix.dashboard.js"></script>
    <script src="js/jquery.gritter.min.js"></script>
    <script src="js/matrix.interface.js"></script>
    <script src="js/matrix.chat.js"></script>
    <script src="js/jquery.validate.js"></script>
    <script src="js/matrix.form_validation.js"></script>
    <script src="js/jquery.wizard.js"></script>
    <script src="js/jquery.uniform.js"></script>
    <script src="js/select2.min.js"></script>
    <script src="js/matrix.popover.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/matrix.tables.js"></script>
</body>

</html>