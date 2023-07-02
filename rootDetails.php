<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "project";

$connection = new mysqli($host, $username, $password, $database);
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$successMessage = $errorMessage = "";

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $slno= $_POST["slno"];
    $po_no= $_POST["po_no"];
    $po_dt= $_POST["po_dt"];
    $sis_no = $_POST["sis_no"];
    $sis_dt = $_POST["sis_dt"];
    $itm_cd = $_POST["itm_cd"];
    $reqd_qty = $_POST["reqd_qty"];
    $unit_rt = $_POST["unit_rt"];;
    $rt_per = $_POST["rt_per"];
    $cst_pct = $_POST["cst_pct"];
    $st_pct = $_POST["st_pct"];
    $sc_on_st_pct = $_POST["sc_on_st_pct"];;
    $addl_sc_pct = $_POST["addl_sc_pct"];
    $bas_exc_pct = $_POST["bas_exc_pct"];
    $addl_exc_pct = $_POST["addl_exc_pct"];
    $exc_pct = $_POST["exc_pct"];
    $disc_pct = $_POST["disc_pct"];
    $pf_chgs = $_POST["pf_chgs"];
    $pf_pct = $_POST["pf_pct"];
    $cust_pct = $_POST["cust_pct"];
    $freight = $_POST["freight"];
    $oct_pct = $_POST["oct_pct"];
    $oth_chgs = $_POST["oth_chgs"];
    $recd_qty = $_POST["recd_qty"];
    $act_qty = $_POST["act_qty"];
    $tot_val = $_POST["tot_val"];
    $amt_pd = $_POST["amt_pd"];
    $dly_typ_ind= $_POST["dly_typ_ind"];
    $ord_typ_ind= $_POST["ord_typ_ind"];
    $tol_pct= $_POST["tol_pct"];
    $popt_duml= $_POST["popt_duml"];
    $popt_dum2= $_POST["popt_dum2"];
    $popt_dum3= $_POST["popt_dum3"];
    $cgst_pct= $_POST["cgst_pct"];
    $sgst_pct= $_POST["sgst_pct"];
    $igst_pct= $_POST["igst_pct"];
    $ugst_pct = $_POST["ugst_pct"];
    $hsn_code= $_POST["hsn_code"];
    $stat_cd = $_POST["stat_cd"];
    $cgst_val= $_POST["cgst_val"];
    $sgst_val = $_POST["sgst_val "];
    $igst_val = $_POST["igst_val"];
    $ugst_val = $_POST["ugst_val"];
    $lc_basic_rate= $_POST["lc_basic_rate"];
    $lc_epf_pct = $_POST["lc_epf_pct"];
    $lc_esi_pct = $_POST["lc_esi_pct"];
    $lc_bonus_pct = $_POST["lc_bonus_pct"];
    $lc_no_of_pers = $_POST["lc_no_of_pers"];
    $lc_noofdays_month = $_POST["lc_noofdays_month"];
    $lc_no_of_months = $_POST["lc_no_of_months"];
    $lc_profit_pct = $_POST["lc_profit_pct"];


    // Insert data into the database
    $sql = "INSERT INTO details (
        slno ,
        po_no,
        po_dt,
        sis_no,
        sis_dt, 
        itm_cd ,
        reqd_qty, 
        unit_rt ,
        rt_per ,
        cst_pct ,
        st_pct ,
        sc_on_st_pct, 
        addl_sc_pct ,
        bas_exc_pct,
        addl_exc_pct, 
        exc_pct ,
        disc_pct ,
        pf_chgs ,
        pf_pct ,
        cust_pct, 
        freight ,
        oct_pct ,
        oth_chgs ,
        recd_qty ,
        act_qty ,
        tot_val ,
        amt_pd ,
        dly_typ_ind, 
        ord_typ_ind ,
        tol_pct ,
        popt_duml,
        popt_dum2,
        popt_dum3,
        cgst_pct,
        sgst_pct,
        igst_pct,
        ugst_pct ,
        hsn_code,
        stat_cd ,
        cgst_val,
        sgst_val ,
        igst_val ,
        ugst_val ,
        lc_basic_rate ,
        lc_epf_pct ,
        lc_esi_pct ,
        lc_bonus_pct, 
        lc_no_of_pers, 
        lc_noofdays_month ,
        lc_no_of_months ,
        lc_profit_pct )
            VALUES (
    '$slno', 
    '$po_no',
    '$po_dt ',
    '$sis_no ',
    '$sis_dt ',
    '$itm_cd', 
    '$reqd_qty ',
    '$unit_rt ',
    '$rt_per ',
    '$cst_pct ',
    '$st_pct ',
    '$sc_on_st_pct ',
    '$addl_sc_pct ',
    '$bas_exc_pct',
    '$addl_exc_pct ',
    '$exc_pct ',
    '$disc_pct ',
    '$pf_chgs ',
    '$pf_pct ',
    '$cust_pct ',
    '$freight ',
    '$oct_pct ',
    '$oth_chgs ',
    '$recd_qty ',
    '$act_qty ',
    '$tot_val ',
    '$amt_pd ',
    '$dly_typ_ind', 
    '$ord_typ_ind', 
    '$tol_pct ',
    '$popt_duml',
    '$popt_dum2',
    '$popt_dum3',
    '$cgst_pct',
    '$sgst_pct',
    '$igst_pct',
    '$ugst_pct ',
    '$hsn_code',
    '$stat_cd ',
    '$cgst_val',
    '$sgst_val ',
    '$igst_val ',
    '$ugst_val ',
    '$lc_basic_rate', 
    '$lc_epf_pct ',
    '$lc_esi_pct ',
    '$lc_bonus_pct ',
    '$lc_no_of_pers ',
    '$lc_noofdays_month', 
    '$lc_no_of_months ',
    '$lc_profit_pct ')";

    if ($connection->query($sql) === true) {
        // Data inserted successfully
        $successMessage = "Form submitted successfully!";
    } else {
        $errorMessage = "Error: " . $sql . "<br>" . $connection->error;
    }
}?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Input Form</title>
</head>

<body>
    <h1>Data Input Form</h1>
    <form method="POST" action="process_form.php">
        <label for="slno">Sl. No.:</label>
        <input type="text" id="slno" name="slno"><br><br>

        <label for="po_no">PO Number:</label>
        <input type="text" id="po_no" name="po_no"><br><br>

        <label for="po_dt">PO Date:</label>
        <input type="date" id="po_dt" name="po_dt"><br><br>

        <label for="sis_no">SIS Number:</label>
        <input type="text" id="sis_no" name="sis_no"><br><br>

        <label for="sis_dt">SIS Date:</label>
        <input type="date" id="sis_dt" name="sis_dt"><br><br>

        <label for="itm_cd">Item Code:</label>
        <input type="text" id="itm_cd" name="itm_cd"><br><br>

        <label for="reqd_qty">Required Quantity:</label>
        <input type="number" id="reqd_qty" name="reqd_qty"><br><br>

        <label for="unit_rt">Unit Rate:</label>
        <input type="number" id="unit_rt" name="unit_rt"><br><br>

        <!-- Add remaining form fields based on the provided code -->

        <label for="lc_profit_pct">LC Profit Percentage:</label>
        <input type="number" id="lc_profit_pct" name="lc_profit_pct"><br><br>

        <input type="submit" value="Submit">
    </form>
</body>

</html>