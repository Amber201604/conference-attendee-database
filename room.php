<?php include "header.php"; ?>

<?php

$rid = $_POST["roomnumber"];
if(empty($rid)){
	echo "It is empty!!! Please enter the room number<br>";
}

else{
	echo "<h2>Room and Student information</h2>";
	echo "<table><tr><th>Room Number</th><th>Bed Number</th><th>Student Name</th> </tr>";
	#connect to the database
	$pdo = new PDO('mysql:host=localhost;dbname=332project', "root", "");
	$sql = "SELECT housing_list.room_number, housing_list.beds, students.name from Housing_list,Students where housing_list.room_number = $rid and Students.room_number = $rid";
	$stmt = $pdo->prepare($sql);   #create the query
	$stmt->execute();   #bind the parameters

	#stmt contains the result of the program execution
	#use fetch to get results row by row.
	while ($row = $stmt->fetch()) {
		echo "<tr><td>".$row["room_number"]."</td><td>".$row["beds"]."</td><td>".$row["name"]."</td></tr>";
	}
}	
?>
</table>
<br><a href="readroom.html">Back to Previous Page</a><br>
<a href="index.html">Back to Home Page</a>

</body>
</html>