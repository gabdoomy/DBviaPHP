<?php
// Create connection
$con=mysqli_connect("localhost","arena","arena","arena");
echo "<body bgcolor=\"FFDAB9\">";
// Check connection
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  echo "\n";
  }
else
{
  echo "Connection to database established...<br><br>";
  }

//$sql = "CREATE TABLE Users
//(
//PID INT NOT NULL AUTO_INCREMENT, 
//PRIMARY KEY(PID),
//FirstName CHAR(15),
//LastName CHAR(15),
//Password CHAR(15),
//Age INT
//)";

$result = mysqli_query($con,"SELECT * FROM users");

while($row = mysqli_fetch_array($result)) $i=$row['id'];
$i=$i+1;

$nume="";
$prenume="";
$adresa="";
$email="";
$tel1="";
$tel2="";
$info="";
$nume=$_POST['nume'];
$prenume=$_POST['prenume'];
$adresa=$_POST['adresa'];
$email=$_POST['email'];
$tel1=$_POST['tel1'];
$tel2=$_POST['tel2'];
$info=$_POST['info'];

$sql="INSERT INTO Users( id,nume,prenume,email,adresa,tel1,tel2,info)
VALUES
('$i','$nume','$prenume','$email','$adresa','$tel1','$tel2','$info')";

if (!mysqli_query($con,$sql)) die('Error: ' . mysqli_error($con));
echo "1 record added";

$result = mysqli_query($con,"SELECT * FROM users");
$noresults=0;
while($row = mysqli_fetch_array($result))
  {
  $noresults=$noresults+1;
  if($noresults==1) echo "<table border=\"1\" bgcolor=\"FFFFFF\"><tr><td> ID </td><td> Nume </td><td> Prenume </td><td> Email </td><td> Adresa </td><td> Telefon 1 </td><td> Telefon 2 </td><td> Info </td></tr>";
  echo "<tr><td>". $row['id']. "</td><td> " .$row['nume'] . " </td><td> " . $row['prenume']. " </td><td> " . $row['email']. " </td><td> " . $row['adresa']. " </td><td> " . $row['tel1']. " </td><td> " . $row['tel2']. " </td><td> " . $row['info']." </tr>";
  }
if($noresults==0) echo "<b>No people found. Retry search.</b><br>";
else echo "</table>";

mysqli_close($con);

?>