<?php include "header.php"; ?>

<?php

$com = $_POST["committee"];

if(empty($com)){
	echo "Please select one of the committees<br>";
}
$pdo = new PDO('mysql:host=localhost;dbname=332project', "root", "");
if($com == 'pro'){
	echo "<p>Member information</p>";
	echo "<table><tr><th>Commitee Name</th><th>Memebr ID</th><th>Member Name</th></tr>";
	$sql = "SELECT Subcommittee_name,ID,Person_name FROM Subcommittee where Subcommittee_name = 'Professional Committee'";
	$stmt = $pdo->prepare($sql);   #create the query
	$stmt->execute();   #bind the parameters
	while ($row = $stmt->fetch()) {
		echo "<tr><td>".$row["Subcommittee_name"]."</td><td>".$row["ID"]."</td><td>".$row["Person_name"]."</td></tr>";
	}
}

if($com == 'reg'){
	echo "<p>Member information</p>";
	echo "<table><tr><th>Commitee Name</th><th>Memebr ID</th><th>Member Name</th></tr>";
	$sql = "SELECT Subcommittee_name,ID,Person_name FROM Subcommittee where Subcommittee_name = 'Registration Committee'";
	$stmt = $pdo->prepare($sql);   #create the query
	$stmt->execute();   #bind the parameters
	while ($row = $stmt->fetch()) {
		echo "<tr><td>".$row["Subcommittee_name"]."</td><td>".$row["ID"]."</td><td>".$row["Person_name"]."</td></tr>";
	}
}

if($com == 'spon'){
	echo "<p>Member information</p>";
	echo "<table><tr><th>Commitee Name</th><th>Memebr ID</th><th>Member Name</th></tr>";
	$sql = "SELECT Subcommittee_name,ID,Person_name FROM Subcommittee where Subcommittee_name = 'Sponsorship Committee'";
	$stmt = $pdo->prepare($sql);   #create the query
	$stmt->execute();   #bind the parameters
	while ($row = $stmt->fetch()) {
		echo "<tr><td>".$row["Subcommittee_name"]."</td><td>".$row["ID"]."</td><td>".$row["Person_name"]."</td></tr>";
	}
}

?>
</table>
<a href="index.html">Back to home Page</a>
<?php include "footer.php"; ?>