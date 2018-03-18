<html>
<body>

<?php
// define variables and set to empty values
$nameErr = $emailErr = $clubErr= "";
$name = $email = $comment =$club ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["name"])) {
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
    

   if (empty($_POST["club"])) {
     $emailErr = "club is required";
   } else {
     $club = test_input($_POST["club"]);
     // check if club only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$club)) {
       $clubErr = "Only letters and white space allowed"; 
     }
   } 
   
   if (empty($_POST["comment"])) {
     $comment = "";
   } else {
     $comment = test_input($_POST["comment"]);
   }


function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

//if "email" variable is filled out, send email
  if (isset($_REQUEST['email']))  {
  
  //Email information
  $admin_email = "rooparshkalia@gmail.com";
  $name = $_REQUEST['name'];
  $email = $_REQUEST['email'];
  $club = $_REQUEST['club'];
  $comment = $_REQUEST['comment'];
  
  //send email
  mail($admin_email, "$name", "$club", $comment, "From:" . $email);
  
  //Email response
  echo "Thank you for contacting us!";
  }
  

?>     

</body>
</html>