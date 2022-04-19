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
                                        <th>LOCATION ID</th>
                                        <th>STREET ADDRESS</th>
                                        <th>POSTAL CODE</th>
                                        <th>CITY</th>
                                        <th>STATE PROVINCE</th>
                                        <th>COUNTRY ID</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $query = "SELECT * FROM locations";
                                        $result = oci_parse($conn, $query);
                                        oci_execute($result);
                                        while($row = oci_fetch_array($result, OCI_RETURN_NULLS+OCI_ASSOC)){
                                            ?>
                                                <tr>
                                                    <td><?php echo $row["LOCATION_ID"]; ?></td>
                                                    <td><?php echo $row["STREET_ADDRESS"]; ?></td>
                                                    <td><?php echo $row["POSTAL_CODE"]; ?></td>
                                                    <td><?php echo $row["CITY"]; ?></td>
                                                    <td><?php echo $row["STATE_PROVINCE"]; ?></td>
                                                    <td><?php echo $row["COUNTRY_ID"]; ?></td>
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