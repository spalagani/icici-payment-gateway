
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Payments Page</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<style>
.breadcrumb {
    padding: 8px 15px;
    margin-bottom: 20px;
    list-style: none;
    background-color: #f5821f;
    border-radius: 4px;
    color: #ffffff;
    text-align: center;
}
</style>

</head>
<body>
<div class="container-fluid">
<ol class="breadcrumb">
<h2>MyGuruOnline India PVT LTD - Bill Payment</h2>
 <!-- <li><a href="#">Home</a></li>
  <li><a href="#">Library</a></li>
  <li class="active">Data</li> -->
</ol>
</div>
<div class="container">

<div class="col-md-8">
<h3 class="text-danger">
<?php
//print_r($_REQUEST);

/*
if($_REQUEST['Response_Code'] == "E000") {
echo "Payment Success";
} else {
echo "Payment Failure";
}

*/

switch ($_REQUEST['Response_Code']) {
    case "E000":
        echo "E000 :: Payment Success";
        break;
    case "E001":
        echo "E001 :: Unauthorized Payment Mode";
        break;
    case "E002":
        echo "E002 :: Unauthorized Key";
        break;
    case "E003":
        echo "E003 :: Unauthorized Packet";
        break;
    case "E004":
        echo "E004 :: Unauthorized Merchant";
        break;
    case "E005":
        echo "E005 :: Unauthorized Return URL";
        break;
    case "E006":
        echo "E006 :: Transaction Already Paid";
        break;
    case "E007":
        echo "E007 :: Transaction Failed";
        break;
    case "E008":
        echo "E008 :: Failure from Third Party due to Technical Error or Funds Shortage";
        break;
    case "E0031":
        echo "E0031 :: Mandatory fields coming from merchant are empty";
        break;
    case "E0032":
        echo "E0032 :: Mandatory fields coming from database are empty";
        break;
    case "E0033":
        echo "E0033 :: Payment mode coming from merchant is empty";
        break;
    case "E0034":
        echo "E0034 :: PG Reference number coming from merchant is empty";
        break;
    case "E0035":
        echo "E0035 :: Sub merchant id coming from merchant is empty";
        break;
    case "E0036":
        echo "E0036 :: Transaction amount coming from merchant is empty";
        break;
    case "E0037":
        echo "E0037 :: Payment mode coming from merchant is other than 0 to 9";
        break;
    case "E0038":
        echo "E0038 :: Transaction amount coming from merchant is more than 9 digit length";
        break;
    case "E0039":
        echo "E0039 :: Mandatory value Email in wrong format";
        break;
    case "E00310":
        echo "E00310 :: Mandatory value mobile number in wrong format";
        break;
    case "E00311":
        echo "E00311 :: Mandatory value amount in wrong format";
        break;
    case "E00312":
        echo "E00312 :: Mandatory value Pan card in wrong format";
        break;
    case "E00313":
        echo "E00313 :: Mandatory value Date in wrong format";
        break;
    case "E00314":
        echo "E00314 :: Mandatory value String in wrong format";
        break;
    case "E00315":
        echo "E00315 :: Optional value Email in wrong format";
        break;
    case "E00316":
        echo "E00316 :: Optional value mobile number in wrong format";
        break;
    case "E00317":
        echo "E00317 :: Optional value amount in wrong format";
        break;
    case "E00318":
        echo "E00318 :: Optional value pan card number in wrong format";
        break;
    case "E00319":
        echo "E00319 :: Optional value date in wrong format";
        break;
    case "E00320":
        echo "E00320 :: Optional value string in wrong format";
        break;
    case "E00321":
        echo "E00321 :: Request packet mandatory columns is not equal to mandatory columns set in enrolment or optional columns are not equal to optional columns length set in enrolment";
        break;
    case "E00324":
        echo "E00324 :: Merchant Reference Number and Mandatory Columns are Null";
        break;
    case "E00325":
        echo "E00325 :: Merchant Reference Number Duplicate";
        break;
    case "E00325":
        echo "Merchant Reference Number Duplicate";
        break;
    case "E00326":
        echo "E00326 :: Sub merchant id coming from merchant is non numeric";
        break;
    case "E00327":
        echo "E00327 :: Cash Challan Generated";
        break;
    case "E00328":
        echo "E00328 :: Cheque Challan Generated";
        break;
    case "E00329":
        echo "E00329 :: NEFT Challan Generated";
        break;
    case "E00330":
        echo "E00330 :: Transaction Amount and Mandatory Transaction Amount mismatch in Request URL";
        break;
    default:
        echo "Default Failure";
}
?>
</h3>
<a class="" href="http://www.myguruonline.net/bill-pay.php">Do Another Payment</a>

</div>
<div class="col-md-4">
<div class="row"><img src="/BillPayments.png" style="width: 90%;"></div>

</div>
</div>
</body>
</html>
