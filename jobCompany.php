<?php include "header.php"; ?>

<?php

$comid = $_POST["jobcom"];
if(empty($comid)){
	echo "It is empty!!! Please enter the Company Name<br>";
}

else{
	echo "<p>Available Job List</p>";
	echo "<table><tr><th>Company Name</th><th>Job ID</th><th>Job Title</th><th>Location</th><th>Salary(per year)</th></tr>";
	#connect to the database
	$pdo = new PDO('mysql:host=localhost;dbname=332project', "root", "");
	$sql = "SELECT company,job_ID,job_title,job_location,pay_rate FROM Job_ads WHERE Job_ads.company='$comid'";
	$stmt = $pdo->prepare($sql);   #create the query
	$stmt->execute([$comid]);   #bind the parameters

	#stmt contains the result of the program execution
	#use fetch to get results row by row.
	while ($row = $stmt->fetch()) {
		echo "<tr><td>".$row["company"]."</td><td>".$row["job_ID"]."</td><td>".$row["job_title"]."</td><td>".$row["job_location"]."</td><td>".$row["pay_rate"]."</td></tr>";
	}
}	
?>
</table>
<br>
<a href="index.html">Back to Home Page</a>
<?php include "footer.php"; ?>