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

$nume="";
$prenume="";
$adresa="";
$email="";
$tel1="";
$tel2="";
$info="";
$ifbool=0;
  
echo "Displaying results:<br><br>";
  
if($_POST['nume']=="") ;//echo "nume null<br>";
	else {
		$nume=" WHERE nume='".$_POST['nume']."'";
		$ifbool=1;
	}
if($_POST['prenume']=="") ;//echo "prenume null<br>";
	else if($ifbool==1) $prenume=" AND prenume='".$_POST['prenume']."'";
		else {
			$prenume=" WHERE prenume='".$_POST['prenume']."'";
			$ifbool=1;
		}
if($_POST['adresa']=="") ;//echo "adresa null<br>";
	else if($ifbool==1) $adresa=" AND adresa='".$_POST['adresa']."'";
		else {
			$adresa=" WHERE adresa='".$_POST['adresa']."'";
			$ifbool=1;
		}
if($_POST['email']=="") ;//echo "email null<br>";
	else if($ifbool==1) $email=" AND email='".$_POST[email]."'";
		else {
			$email=" WHERE email='".$_POST['email']."'";
			$ifbool=1;
		}
if($_POST['tel1']=="") ;//echo "tel1 null<br>";
	else if($ifbool==1) $tel1=" AND tel1='".$_POST['tel1']."'";
		else {
			$tel1=" WHERE tel1='".$_POST['tel1']."'";
			$ifbool=1;
		}
if($_POST['tel2']=="") ;//echo "tel2 null<br>";
	else if($ifbool==1) $tel1=" AND tel2='".$_POST['tel2']."'";
		else {
				$tel2=" WHERE tel2='".$_POST['tel2']."'";
				$ifbool=1;
			}
if($_POST['info']=="") ;//echo "info null<br>";
	else if($ifbool==1) $info=" AND info=".$_POST['info'];
		else {
						$info=" WHERE info='".$_POST['info']."'";
						$ifbool=1;
					}

//echo "SELECT * FROM users ".$nume.$prenume.$adresa.$email.$tel1.$tel2.$info;
					
$result = mysqli_query($con,"SELECT * FROM users ".$nume.$prenume.$adresa.$email.$tel1.$tel2.$info);

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