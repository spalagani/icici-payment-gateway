<?php
  ob_start();


$key = "getfrombank";

$merchant_id = "getfrombank";


function aes128Encrypt($str,$key){
	$block = mcrypt_get_block_size('rijndael_128', 'ecb');
	$pad = $block - (strlen($str) % $block);
	$str .= str_repeat(chr($pad), $pad);
	return base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key, $str, MCRYPT_MODE_ECB));
}
$custom_name = $_POST["fullname"];
$Ref_No = rand(111,999);
$Amount = $_POST['amount'];
$submerchant_id = "1234";
$phone_no = $_POST['phonenumber'];
$paymode = 9;
$BillingAddress =  $_POST['address'];
$TransactionDate = "21/03/2017";
$cust_email = $_POST['email'];

$mandatoryfields = $Ref_No."|".$submerchant_id."|".$Amount."|".$custom_name."|".$phone_no;
//$mandatoryfields = $custom_name."|".$Ref_No."|".$submerchant_id."|".$Amount."|".$phone_no;
$encrypted_mandatoryfields = aes128Encrypt($mandatoryfields,$key);

$optionalfields = $cust_email."|".$BillingAddress."|".$TransactionDate;
//$optionalfields = "a@gmail.com|billing|22/02/2017"; 
$encrypted_optionalfields = aes128Encrypt($optionalfields,$key);


$returnurl = "http://myguruonline.net/easypay.php";
$encrypted_returnurl = aes128Encrypt($returnurl,$key);


$encrypted_Amount = aes128Encrypt($Amount,$key);

$encrypted_submerchant = aes128Encrypt($submerchant_id,$key);

$encrypted_paymode = aes128Encrypt($paymode,$key);

$encrypted_refno = aes128Encrypt($Ref_No,$key);
	
$URL = "https://eazypay.icicibank.com/EazyPG?merchantid=".$merchant_id."&mandatory%20fields=".$encrypted_mandatoryfields."&optional%20fields=".$encrypted_optionalfields."&returnurl=".$encrypted_returnurl."&Reference%20No=".$encrypted_refno."&submerchantid=".$encrypted_submerchant."&transaction%20amount=".$encrypted_Amount."&paymode=".$encrypted_paymode;

$URL1 = "https://eazypay.icicibank.com/EazyPG?merchantid=".$merchant_id."&mandatory%20fields=".$mandatoryfields."&optional%20fields=".$optionalfields."&returnurl=".$returnurl."&Reference%20No=".$Ref_No."&submerchantid=".$submerchant_id."&transaction%20amount=".$Amount."&paymode=".$paymode;


//https://eazypay.icicibank.com/EazyPG?merchantid=128752&mandatoryfields=8001|1234|8 0| 9000000001&optionalfields=20|20|20|20&returnurl=&submerchantid=&transaction amount=&paymode=9





if ($_SERVER["REQUEST_METHOD"] == "POST") {

       

  if (empty($_POST["fullname"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
  }
    
   header("Location:".$URL);

        exit;

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


ob_end_flush();
?>

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
<div id="errorBox"></div>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <div class="form-group">
    <label for="exampleInputEmail1">Full Name</label>
    <input type="text" required class="form-control" name="fullname" id="fullname" placeholder="Full Name">
    <span class="error"> <?php echo $nameErr;?></span>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email ID	</label>
    <input type="email" class="form-control" name="email" id="email" placeholder="Email" required >
    <span class="error"> <?php echo $emailErr;?></span>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Phone Number	</label>
    <input type="text" class="form-control" name="phonenumber" id="phonenumber" placeholder="Phone Number" required > 
    <span class="error"> <?php echo $phoneErr;?></span>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Address</label>
    <input type="text" class="form-control" name="address" id="address" placeholder="Address" required >
    <span class="error"> <?php echo $addressErr;?></span>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Amount</label>
    <input type="text" class="form-control" name="amount" id="amount" placeholder="Amount" required >
    <span class="error"> <?php echo $amountErr;?></span>
  </div>
  <button type="submit" class="btn  btn-warning" >Pay Now</button>
</form>
</div>

<div class="col-md-4">
<div class="row"><img src="/BillPayments.png" style="width: 90%;"></div>

</div>
</div>
</body>
<script>
function Submit(){
/*	
	var fullname = document.getElementById("fullname").value,
		email = document.getElementById("email").value,
		phonenumber = document.getElementById("phonenumber").value,
		address = document.getElementById("address").value,
		amount = document.getElementById("amount").value;
	if( fullname == "" )
   {
	   alert("fullname");
     //document.getElementbyId("fullname").focus() ;
	 document.getElementById("errorBox").innerHTML = "enter the full name";
     return false;
   }	else if{
	   document.getElementById("errorBox").innerHTML = "New";
   }
 */
}
</script>
</html>
