<?php 
include_once "header.php";
include "../connection.php";
?>

    <div id="content">
        <!--breadcrumbs-->
        <div id="content-header">
            <div id="breadcrumb"><a href="index.html" class="tip-bottom"><i class="icon-home"></i>
            Add New Purchase</a></div>
        </div>
        <!--End-breadcrumbs-->

        <!--Action boxes-->
        <div class="container-fluid">

            <div class="row-fluid" style="background-color: white;  padding:10px;">
                <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                            <h5>Add New Purchase</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form action="" name="form1" method="POST" class="form-horizontal">

                                <div class="control-group">
                                    <label class="control-label">Select Company</label>

                                    <div class="controls">
                                       <select class="span11" name="company_name" id="company_name" onchange="select_company(this.value)">
                                            <option>Select</option>
                                            <?php
                                                $sql = "SELECT * FROM COMPANY_NAME";
                                                $result = oci_parse($conn, $sql);
                                                oci_execute($result);
                                                while ($row = oci_fetch_array($result)) {
                                                    // echo "<option value='" . $row['ID'] . "'>" . $row['COMPANY_NAME'] . "</option>";
                                                    echo "<option>";
                                                    echo strtoupper($row['COMPANY_NAME']);
                                                    echo "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Select Product Name</label>

                                    <div class="controls" id="product_name_div">
                                       <select class="span11">
                                            <option>Select</option>
                                    
                                       </select>
                                    </div>
                                </div>

                                
                                <div class="control-group">
                                    <label class="control-label">Select Units</label>

                                    <div class="controls" id="unit">
                                        <select class="span11" name="unit_div">
                                            <option value="">Select</option>
                                           
                                        </select>
                                    </div>
                                </div>




                                <div class="control-group">
                                    <label class="control-label">Enter Packing Size</label>

                                    <div class="controls" id="packing_size">
                                       <select class="span11" >
                                            <option value="">Select</option>
                                           
                                        </select>
                                    </div>
                                </div>


                                <div class="control-group">
                                    <label class="control-label">Enter Qty</label>

                                    <div class="controls" >
                                       <input type="text" name="qty" value="0" class="span11"  />
                                    </div>
                                </div>


                                <div class="control-group">
                                    <label class="control-label">Enter Price</label>

                                    <div class="controls" >
                                       <input type="text" name="price" value="0" class="span11"  />
                                    </div>
                                </div>


                                <div class="control-group">
                                    <label class="control-label">Select Party Name</label>

                                    <div class="controls" >
                                        <select class="span11" name="party_name">
                                            <option value="">Select</option>
                                           
                                        </select>
                                    </div>
                                </div>
                                

                                <div class="control-group">
                                    <label class="control-label">Select Purchase Type</label>

                                    <div class="controls" >
                                        <select class="span11" name="purchase_type">
                                            <option value="">Cash</option>
                                            <option value="">Debit</option>
                                           
                                        </select>
                                    </div>
                                </div>
                      
                                 <div class="control-group">
                                    <label class="control-label">Expiry Date</label>

                                    <div class="controls" >
                                       <input type="text" name="expiry_date" class="span11" placeholder="dd/mm/yyyy" pattern="\d{2}/\d{2}/\d{4}"  required />
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <button type="submit" name="sumbit1" class="btn btn-success">Purchase Now</button>
                                </div>
                                <div  class="alert alert-success" role="alert" id="success" style="text-align: center; display:none;">
                                    Purchase Successful.
                                </div>
                            </form>
                        </div>
                    </div>
            </div>

        </div>
    </div>



<script type="text/javascript">
    function select_company(company_name) 
    {
        fetch(`ajax/select_product.php?COMPANY_NAME=${company_name}`, {
            method: 'GET',
        })
        .then( response => response.text() )
        .then( res => {
            // console.log('res', res);
            document.getElementById("product_name_div").innerHTML = res;
        })
        .catch( err => {
            console.log( 'err', err);
        })

        // var xmlhttp = new XMLHttpRequest();
        // xmlhttp.onreadystatechange = function() {
        //     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        //         document.getElementById("product_name").innerHTML = xmlhttp.responseText;
        //     }
        // };
        // xmlhttp.open("GET", "ajax/select_product.php?COMPANY_NAME="+ company_name, true);
        // xmlhttp.send();
    }

    function select_product(product_name, company_name) 
    {
        // alert(product_name + "==" + company_name);
        fetch(`ajax/select_unit.php?PRODUCT_NAME=${product_name}&COMPANY_NAME=${company_name}`, {
            method: 'GET',
        })
        .then( response => response.text() )
        .then( res => {
            console.log('res', res);
            // document.getElementById("unit_div").innerHTML = res;
        })
        
    }
</script>

    <?php 
  
// ------------------------------------------------------------ Oracle Connection Setup Start-------------------------------------------------------------

     if(isset($_POST['sumbit1'])){
        $company_name = $_POST['company_name'];
        $product_name = $_POST['product_name'];
        $unit         = $_POST['unit'];
        $packing_size = $_POST['packing_size'];
        $count = 0;

        $query = "SELECT  PRODUCT_NAME FROM PRODUCTS WHERE PRODUCT_NAME = upper('$product_name')";
        $result = oci_parse($conn, $query);
        oci_execute($result);
        while ($row = oci_fetch_array($result)) {
            $count++;
        }

        if($count == 0){
            $query = "INSERT INTO PRODUCTS (COMPANY_NAME, PRODUCT_NAME, UNIT, PACKING_SIZE) VALUES (UPPER('$company_name'), UPPER('$product_name'), UPPER('$unit'), '$packing_size')";
            $result = oci_parse($conn, $query);
            oci_execute($result);
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