<?php include "header.php"; ?>

<?php

$id = $_POST["name"];
$day = $_POST["day"];
$stime = $_POST["stime"];
$etime= $_POST["etime"];
$location = $_POST["location"];

$pdo = new PDO('mysql:host=localhost;dbname=332project', "root", "");
if(empty($id)){
	echo "It is empty!!! Please enter the Session Name<br>";
}
if(empty($day)){
	$sql0 = "select * from Sessions WHERE session_name = '$id'";
	$stmt0 = $pdo->prepare($sql0);   #create the query
	$stmt0->execute();
	$row = $stmt0->fetch();
	$day = $row['the_date'];
}
if(empty($stime)){
	$sql0 = "select * from Sessions WHERE session_name = '$id'";
	$stmt0 = $pdo->prepare($sql0);   #create the query
	$stmt0->execute();
	$row = $stmt0->fetch();
	$stime = $row['start_time'];
}
if(empty($etime)){
	$sql0 = "select * from Sessions WHERE session_name = '$id'";
	$stmt0 = $pdo->prepare($sql0);   #create the query
	$stmt0->execute();
	$row = $stmt0->fetch();
	$etime = $row['end_time'];
}
if(empty($location)){
	$sql0 = "select * from Sessions WHERE session_name = '$id'";
	$stmt0 = $pdo->prepare($sql0);   #create the query
	$stmt0->execute();
	$row = $stmt0->fetch();
	$location = $row['location'];
}


$sql0 = "select * from Sessions";
$stmt0 = $pdo->prepare($sql0);   #create the query
$stmt0->execute();
$flag = True;
while($row = $stmt0->fetch()){
	$bol1 = (intval($etime) <= intval($row['start_time'])) and (intval($stime) < intval($row['start_time']));
	$bol2 = (intval($stime)>=intval($row['end_time'])) and (intval($etime)>intval($row['end_time']));
	if($row['session_name'] != $id and $row['the_date'] == $day and $row['location'] == $location and !($bol1 or $bol2)){
		$ses = $row['session_name'];
		echo"The switch is conflict to '$ses' session. Don't allow to switch.";
		$flag = False;
	}		
}	

if($flag){
	
	$sql1 = "UPDATE Sessions set the_date = '$day' WHERE Sessions.session_name='$id'";
	$stmt1 = $pdo->prepare($sql1);   #create the query
	$stmt1->execute();   #bind the parameters
		
	$sql2 = "UPDATE Sessions set start_time = '$stime' WHERE Sessions.session_name='$id'";
	$stmt2 = $pdo->prepare($sql2);   #create the query
	$stmt2->execute();   #bind the parameters
		
	$sql3 = "UPDATE Sessions set end_time = '$etime' WHERE Sessions.session_name='$id'";
	$stmt3 = $pdo->prepare($sql3);   #create the query
	$stmt3->execute();   #bind the parameters

	$sql4 = "UPDATE Sessions set location = '$location' WHERE Sessions.session_name='$id'";
	$stmt4 = $pdo->prepare($sql4);   #create the query
	$stmt4->execute();   #bind the parameters

	echo "Section switched successfully";
}

	
?><br>
</table>
<a href="readsess.html">Back to Previous Page</a><br>
<a href="index.html">Back to Home Page</a>
<?php include "footer.php"; ?>