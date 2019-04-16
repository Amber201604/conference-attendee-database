<?php include "header.php";
echo "<h2>Total intake</h1>";

$pdo = new PDO('mysql:host=localhost;dbname=332project', "root", "");

$sql1 = "select fee from Students";
$stmt = $pdo->prepare($sql1);   #create the query
$stmt->execute();   #bind the parameters
$stu = 0;
while($col = $stmt->fetch()){
	$stu += intval($col['fee']);
}

$pro = 0;
$sql2 = "select fee from Professionals";
$stmt = $pdo->prepare($sql2);   #create the query
$stmt->execute();   #bind the parameters
while($col = $stmt->fetch()){
	$pro += intval($col['fee']);
}

$reg = $stu + $pro;

$spon = 0;
$sql3 = "select fee from Companies";
$stmt = $pdo->prepare($sql3);   #create the query
$stmt->execute();   #bind the parameters
while($col = $stmt->fetch()){
	$spon += intval($col['fee']);
}

$intake = $reg + $spon;
echo "Total registration amount: $reg Total sponsorship amount: $spon  Total intake: $intake";
?>
<br><a href="index.html">Back to Home Page</a>
<?php include "footer.php"; ?>

