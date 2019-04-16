<?php include "header.php"; ?>

<?php

$did = $_POST["date"];
if(empty($did)){
	echo "It is empty!!! Please enter the date<br>";
}

else{
	echo "<p>Conference Schedule</p>";
	echo "<table><tr><th>Session Name</th><th>Date</th><th>Location</th><th>Start Time</th><th>End Time</th><th>Speaker</th></tr>";
	#connect to the database
	$pdo = new PDO('mysql:host=localhost;dbname=332project', "root", "");
	if($did == 'sat'){
		$sql = "SELECT session_name,the_date,location,start_time,end_time,Professionals.name as na FROM Sessions,Professionals WHERE Sessions.the_date='Saturday' and Sessions.speaker = Professionals.ID order by start_time asc";
		$stmt = $pdo->prepare($sql);   #create the query
		$stmt->execute();   #bind the parameters
		#stmt contains the result of the program execution
		#use fetch to get results row by row.
		while ($row = $stmt->fetch()) {
			echo "<tr><td>".$row["session_name"]."</td><td>".$row["the_date"]."</td><td>".$row["location"]."</td><td>".$row["start_time"]."</td><td>".$row["end_time"]."</td><td>".$row["na"]."</td></tr>";
		}
	}
	else{	
		$sql = "SELECT session_name,the_date,location,start_time,end_time,Professionals.name as na FROM Sessions,Professionals WHERE Sessions.the_date='Sunday' and Sessions.speaker = Professionals.ID order by start_time DESC";		
		$stmt = $pdo->prepare($sql);   #create the query
		$stmt->execute();   #bind the parameters
		#use fetch to get results row by row.
		while ($row = $stmt->fetch()) {
			echo "<tr><td>".$row["session_name"]."</td><td>".$row["the_date"]."</td><td>".$row["location"]."</td><td>".$row["start_time"]."</td><td>".$row["end_time"]."</td><td>".$row["na"]."</td></tr>";
		}
	}	
}	
?>
</table>
<br>
<a href="index.html">Back to Home Page</a>
<?php include "footer.php"; ?>