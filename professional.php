<?php include "header.php"; ?>
<h2>Attendee-----Professional</h2>
<?php

echo "<table><tr><th>ID</th><th>Professional Name</th><th>Fee</th></tr>";
$pdo = new PDO('mysql:host=localhost;dbname=332project', "root", "");

$sql = "select ID,name,fee from Professionals";
$stmt = $pdo->prepare($sql);   #create the query
$stmt->execute();   #bind the parameters

#stmt contains the result of the program execution
#use fetch to get results row by row.
while ($row = $stmt->fetch()) {
	echo "<tr><td>".$row["ID"]."</td><td>".$row["name"]."</td><td>".$row["fee"]."</td></tr>";
}
?>
</table>
<br><a href="index.html">Back to Home Page</a>
<?php include "footer.php"; ?>

