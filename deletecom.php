<?php include "header.php"; ?>

<?php

$comid = $_POST["comid"];
if(empty($comid)){
	echo "It is empty!!! Please enter the Company Id to delete.<br>";
}

else{
	#connect to the database
	$pdo = new PDO('mysql:host=localhost;dbname=332project', "root", "");
	$sql= "DELETE FROM Companies WHERE Companies.company_name = '$comid'";
	$stmt = $pdo->prepare($sql);   #create the query
	$stmt->execute([$comid]);   #bind the parameters
	
	
	echo "'$comid' Company and its associated attendees are deleted successfully";
}	
?><br>
</table>
<a href="readcomdel.html">Back to Previous Page</a><br>
<a href="index.html">Back to Home Page</a>
<?php include "footer.php"; ?>