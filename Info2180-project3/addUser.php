<?php

//functions 
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
//END FUNCTIONS

var_dump($_REQUEST);
var_dump($_POST);
var_dump($_GET);

// VARIABLE DECLARATIONS//
$FnameErr = $LnameErr = $emailErr = $passErr = $teleErr = "";

$Fname = test_input($_REQUEST["Fname"]);
$Lname = test_input($_REQUEST["Lname"]);
$password = test_input($_REQUEST["password"]);
$email = test_input($_REQUEST["email"]);
$phone = test_input($_REQUEST["phone"]);

$resp = false;
//END OF VARIABLE DECLARATIONS//


//INPUT VALIDATION//
if (empty($Fname)) {
  $FnameErr = "First name is required";
  echo $FnameErr;
} else if(!preg_match("/^[a-zA-Z ]+$/",$Fname)){
    $FnameErr = "Only letters and white space allowed";    // check if first name only contains letters and whitespace
    echo $FnameErr;
}else{
  $resp = true;
}

if (empty($Lname)) {
  $LnameErr = "Last name is required";
  echo $LnameErr;
}else if(!preg_match("/^[a-zA-Z ]+$/",$Lname)){
    $LnameErr = "Only letters and white space allowed";    // check if last name only contains letters and whitespace
    echo $LnameErr;
}else{
  $resp = true;
}

if (empty($email)) {
  $emailErr = "Email is required";
  echo $emailErr;
} else if(!preg_match("/[a-zA-Z]+@[a-zA-Z]+\.[a-zA-Z]{3}$/",$email)){
    $emailErr = "invalid email";
    echo $emailErr;
}else{
  $resp = true;
}

if (empty($password)) {
  $passErr = "password is required";
  echo $passErr;
} else if(preg_match("/^(.{0,7}|[^0-9]*|[^A-Z]*|[^a-z]*)$/",$password)){  //checking the password with the regex
    $passErr = "Atleast one number, lower case letter and capital letter should be used";
    echo $passErr;
}else{
  $resp = true;
}
  
if (empty($phone)) {
  $telErr = "telephone is required";
  echo $telErr;
} else if(!preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $phone)){
    $telErr = "invalid telephone number,try entering '-' between the numbers or the 3 digit area code";
    echo $telErr;
}else{
  $resp = true;
}
//END OF INPUT VALIDATION//


//AFTER INFO VALIDATION ADD INFO INTO DATABASE//

$host = getenv('IP');
$username = getenv('C9_USER');
$password = '';
$dbname = 'HireMe';

$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

$stmt = $conn->exec("INSERT INTO users(firstname, lastname, e_mail, telephone, password, date_joined) 
                            VALUES ('$Fname', '$Lname', '$email', '$phone', md5('$password'), CURRENT_TIMESTAMP)"); //CURRENT TIMESTAMP is gonna take the current date


$stmt = $conn->query("SELECT 1 FROM users WHERE email ='$email'");
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

if(empty($results) ){    
    $resp = 'false'; //false if data was not added properly
    echo $resp;
}
//END OF DATABASE UPDATING//
echo $resp;       //should be true if all went well
?>

