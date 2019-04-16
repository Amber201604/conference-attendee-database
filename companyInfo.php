<?php include "header.php";
echo "<h2>List the info of Campanies</h1>";
echo "<table><tr><th>Campany Name</th><th>Level</th><th>Total Email</th><th>Sent Email</th><th>Sponsor Amount</th></tr>";
$pdo = new PDO('mysql:host=localhost;dbname=332project', "root", "");

$sql = "select company_name,sponsor_level,total_email,sent_email,fee from Companies";
$stmt = $pdo->prepare($sql);   #create the query
$stmt->execute();   #bind the parameters

#stmt contains the result of the program execution
#use fetch to get results row by row.
while ($row = $stmt->fetch()) {
	echo "<tr><td>".$row["company_name"]."</td><td>".$row["sponsor_level"]."</td><td>".$row["total_email"]."</td><td>".$row["sent_email"]."</td><td>".$row["fee"]."</td></tr>";
}
?>
</table>
<br><a href="index.html">Back to Home Page</a>
<?php include "footer.php"; ?>

