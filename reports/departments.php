<?php include "../connection.php"; ?>
<?php include_once "header.php"?>



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

            <!-- View Users -->
            <div class="widget-content nopadding">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>DEPARTMENT ID</th>
                                        <th>DEPARTMENT NAME</th>
                                        <th>MANAGER ID</th>
                                        <th>LOCATION_ID</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
// ------------------------------------------------------------ Oracle Connection Setup Start-------------------------------------------------------------

                                        $query = "SELECT * FROM departments";
                                        $result = oci_parse($conn, $query);
                                        oci_execute($result);
                                        while($row = oci_fetch_array($result, OCI_RETURN_NULLS+OCI_ASSOC)){

// ------------------------------------------------------------ Oracle Connection Setup End---------------------------------------------------------------

                                            ?>
                                                <tr>
                                                    <td><?php echo $row["DEPARTMENT_ID"]; ?></td>
                                                    <td><?php echo $row["DEPARTMENT_NAME"]; ?></td>
                                                    <td><?php echo $row["MANAGER_ID"]; ?></td>
                                                    <td><?php echo $row["LOCATION_ID"]; ?></td>
                                                    
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

    <!--end-main-container-part-->

    <?php include_once "footer.php"?>