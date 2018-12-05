<?php

// function used to get plaintext from url
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
//END OF FUNCTION

// define variables and set to empty values
$Job_titleErr = $Job_descriptionErr = $companyErr = $categoryErr = $Job_locationErr = "";

$Job_title = test_input($_REQUEST["title"]);
$Job_description = test_input($_REQUEST["description"]);
$company = test_input($_REQUEST["company"]);
$category = test_input($_REQUEST["category"]);
$Job_location = test_input($_REQUEST["location"]);

$resp = 'false';

//var_dump($_REQUEST);
//var_dump($_POST);
//var_dump($_GET);

if (empty($Job_title)) {
  $Job_titleErr = "Title is required";
  echo $Job_titleErr;
} else if(!preg_match("/^[a-zA-Z ]+/",$Job_title)){
  $Job_titleErr = "Title: Only letters and white space allowed<br/>";    // check if Job Title only contains letters and whitespace
  echo $Job_titleErr;
}else{
  $resp = 'true';
}

if (empty($Job_description)) {
  $Job_descriptionErr = "description is required";
  echo $Job_descriptionErr;

} else if(!preg_match("/[a-zA-Z0-9 ].+/",$Job_description)){
    $Job_descriptionErr = "DESC: Only letters and white space allowed<br/>";    // check if Job description only contains letters and whitespace
    echo $Job_descriptionErr;

}else{
  $resp = 'true';
}

if ($category =="blank") {
  $categoryErr = "select a category";
  echo $categoryErr; 
}else{
  $resp = 'true';
}

if (empty($company)) {
  $companyErr = "company is required";
  echo $companyErr;
} else if(!preg_match("/^[a-zA-Z0-9]+$/",$company)){
  $companyErr = "CMP: Only letters and white space allowed<br/>";    // check if Job description only contains letters and whitespace
  echo $companyErr;
}else{
  $resp = 'true';
}

if (empty($Job_location)) {
  $Job_locationErr = "location is required";
  echo $Job_locationErr;
}else if(!preg_match("/[a-zA-Z ]+,[a-zA-Z ]+/",$Job_location)){
    $Job_locationErr = "LOC: Only letters and white space allowed<br/>";    // check if Job description only contains letters and whitespace
    echo $Job_locationErr;
}else{
  $resp = 'true';
}


//------ADDING DATA TO DATABASE AFTER VALIDATION WAS PASSED-----//
$host = getenv('IP');
$username = getenv('C9_USER');
$password = '';
$dbname = 'HireMe';

$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

$conn->exec("INSERT INTO jobs(job_title, job_description, category, company_name, company_location, date_posted) 
                    VALUES( '$Job_title', '$Job_description', '$category', '$company', '$Job_location', CURRENT_TIMESTAMP");

$stmt = $conn->query("SELECT * FROM jobs WHERE job_title ='$Job_title'");

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

if(empty($results) ){
  var_dump($results);
    $resp = 'false'; //false if data was not added properly
}
//---------------------------------------------------------------//
//echo true after data has been addd to database
echo $resp;

?>