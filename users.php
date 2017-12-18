
<?php
if(isset($_POST['submit']))
 {
$file = "data.json";

if(!file_exists("data.json"))
{
   $fp = fopen("data.json","w"); 
   fwrite($fp,"0"); 
	file_put_contents($file, "\n", FILE_APPEND);
   fclose($fp);
}  
	$json_string =json_encode(json_encode($_POST, JSON_PRETTY_PRINT));
	file_put_contents($file, $json_string, FILE_APPEND);
	file_put_contents($file, "\n", FILE_APPEND);
 }

?>




<!DOCTYPE html>
<html>
<head>
</head>
<body>


<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $adhar = $area = $amount = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) 
{
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) 
{
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
   

  if (empty($_POST["amount"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["adhar"])) 
  {
    $genderErr = "adhar is required";
  } else {
    $gender = test_input($_POST["adhar"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
 
<form class="newUser" method="post" name="Form">
  First name:<br>
  <input type="text" id="name" >
  <br>
  Email:<br>
  <input type="text" id="email" >
<br>
  Date:<br>
  <input type="date" id="date" >
<br>

 Adhar Number:<br>
  <input type="text" id="adhar">
<br>

 Home Area:<br>
  <input type="text" id="area" >

<br>
 Wallet amount:<br>
  <input type="text" name="amount">
  <br><br>
  <input type="submit"  id="submit" name="submit" value="Submit">
</form> 
</body>
</html> 

