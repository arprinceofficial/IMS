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
                                        <th>EMPLOYEE ID</th>
                                        <th>FIRST NAME</th>
                                        <th>LAST NAME</th>
                                        <th>EMAIL</th>
                                        <th>PHONE NUMBER</th>
                                        <th>HIRE DATE</th>
                                        <th>JOB ID</th>
                                        <th>SALARY</th>
                                        <th>COMMISSION PCT</th>
                                        <th>MANAGER ID</th>
                                        <th>DEPARTMENT ID</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $query = "SELECT * FROM employees";
                                        $sum_total = 0;
                                        $result = oci_parse($conn, $query);
                                        oci_execute($result);
                                        while($row = oci_fetch_array($result, OCI_RETURN_NULLS+OCI_ASSOC)){
                                             $sum_total += $row['SALARY']
                                            ?>
                                                <tr>
                                                    <td><?php echo $row["EMPLOYEE_ID"]; ?></td>
                                                    <td><?php echo $row["FIRST_NAME"]; ?></td>
                                                    <td><?php echo $row["MANAGER_ID"]; ?></td>
                                                    <td><?php echo $row["LAST_NAME"]; ?></td>
                                                    <td><?php echo $row["EMAIL"]; ?></td>
                                                    <td><?php echo $row["PHONE_NUMBER"]; ?></td>
                                                    <td><?php echo $row["HIRE_DATE"]; ?></td>
                                                    <td><?php echo $row["JOB_ID"]; ?></td>
                                                    <td><?php echo $row ["SALARY"]; ?></td>
                                                    <td><?php echo $row["COMMISSION_PCT"]; ?></td>
                                                    <td><?php echo $row["MANAGER_ID"]; ?></td>
                                                    <td><?php echo $row["DEPARTMENT_ID"]; ?></td>
                                                </tr>
                                            <?php
                                        }
                                        ?>
                                          <tr>
                                                    <td colspan="7" style="text-align: right;">Total &nbsp</td>
                                                    <td><?php echo $sum_total ?></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                        <?php
                                    ?>

                                   
                                </tbody>
                            </table>
                        </div>
            <!-- End View Users -->

        </div>
    </div>

    <!--end-main-container-part-->

<?php include_once "footer.php"?>