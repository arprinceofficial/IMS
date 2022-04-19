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
                                        <th>JOB ID</th>
                                        <th>JOB TITLE</th>
                                        <th>MIN SALARY</th>
                                        <th>MAX SALARY</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $query = "SELECT * FROM jobs";
                                        $result = oci_parse($conn, $query);
                                        oci_execute($result);
                                        while($row = oci_fetch_array($result, OCI_RETURN_NULLS+OCI_ASSOC)){
                                            ?>
                                                <tr>
                                                    <td><?php echo $row["JOB_ID"]; ?></td>
                                                    <td><?php echo $row["JOB_TITLE"]; ?></td>
                                                    <td><?php echo $row["MIN_SALARY"]; ?></td>
                                                    <td><?php echo $row["MAX_SALARY"]; ?></td>
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