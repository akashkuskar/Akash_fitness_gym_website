<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<?php
  {
  $name=$_POST["name"];
  $email=$_POST["email"];
  $Age=$_POST["age"]; 
  $Gender = $_POST["gender"];
  $Address= $_POST["address"];
  $number = $_POST["number"];
  
//  database connection 
$conn = new mysqli("localhost","root","","akashfitness");
if($conn->connect_error)
{
  die("connection Failed:".$conn->connect_error);
}
else{
  $stmt=$conn->prepare("inser into registration (name,email,age,gender,address,number)values(?,?,?,?,?,?)");
  $stmt->bind_param("sssssi",name,email,age,gender,address,number);
  $stmt->execute();
  echo"registration successfully.....";
  $stmt->close();
  $conn->close();
}
}
?>

</body>
</html




  