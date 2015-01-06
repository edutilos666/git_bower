<?php 


if($_SERVER["REQUEST_METHOD"]=="POST") {
  
  //connect to mysql 
  $mysqli= @new mysqli("localhost", "root", "", "dumped4"); 
  
  if($mysqli->connect_error) {
    die($mysqli->connect_error); 
  }
  
  
    $cmd= "SELECT * FROM test ; "; 
	
	if(!($res= $mysqli->query($cmd))) {
	  die($mysqli->error); 
	}
	
	
	function printAsTable() {
	  global $res; 


	  $first_row= $res->fetch_row(); 
	    $fname= $first_row[0]; 
		$lname= $first_row[1]; 
		$age=$first_row[2]; 
		$id=$first_row[3]; 
	  
	  if(!$first_row) {
	    die("Sorry there is not any entry yet in the table test <br/>"); 
	  }
	  
	  $msg= "<table><tr><th>First Name</th><th>Last Name</th><th>Age</th><th>Id </th></tr>
	   <tr><td>{$fname}</td><td>{$lname}</td><td>{$age}</td><td>{$id}</td></tr>
	  "; 
	  
	  while(($row= $res->fetch_row())!==null) {
	    $fname= $row[0]; 
		$lname= $row[1]; 
		$age=$row[2]; 
		$id=$row[3]; 
		
		$msg.="<tr><td>{$fname}</td><td>{$lname}</td><td>{$age}</td><td>{$id}</td></tr>"; 
		
	  }
	  
	  $msg.="</table>"; 
	   echo $msg; 
	   
	}
	
	printAsTable(); 
	
  
   $res->close(); 
   $mysqli->close(); 
}

?>


<!DOCTYPE html>
<html>
<head>
<style type="text/css">
table, td, th {
 border:1px solid black ; 
}

td , th{
 width:150px; height:50px; 
 text-align:center; 
 background-color:blue; color:white; 
 font-size:23px; 
 font-weight:bold; 
 font-style:italic; 
}
</style>
</head>
</html>