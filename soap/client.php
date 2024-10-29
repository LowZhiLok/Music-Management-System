<?php 
require 'lib/nusoap.php'; 
$client = new nusoap_client("http:/127.0.0.1/testing/soap/service.php?wsdl"); 
?> 
<!DOCTYPE html> 
<html lang="en">
 <head>
 <title>SOAP Web Service Client</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head> 
 <body> 
 <div class="container"> 
 <h2>SOAP Web Service User Email</h2> 
 
 
 <h3>User Email</h3>
 <form class="form-inline" action="" method="POST"> 
 <div class="form-group"> 
 <label for="userID">User ID</label> 
 <input type="text" name="userID" class="form-control" placeholder="Enter User ID" required> 
 </div> 
 <button type="submit" name="submit" class="btn btn-default">Submit</button> 
 </form>

<br><br> 
<h3> 
 <?php 
 if (isset($_POST['submit'])) {
	 $userID = $_POST['userID'];
	 $response = $client->call('get_userEmail', array("userID" => $userID)); 
     
	 if (empty($response)) 
		 echo "The email of that $userID is not available"; 
	 else 
		 echo "<h3>The Email of $userID is ". $response . "</h3>"; 
	 }
?> 
 </h3>
 </div>
 </body>
 </html>


