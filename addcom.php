<?php include "header.php"; ?>

<?php

$cname = $_POST["cname"];
$slevel = $_POST["category"];
$money = $_POST["amount"];
$email= $_POST["email"];
if(empty($cname)){
	echo "It is empty!!! Please enter the Company name<br>";
}
if(empty($slevel)){
	echo "It is empty!!! Please enter the Company Level<br>";
}
if(empty($money)){
	echo "It is empty!!! Please enter the Sponsoring Amount<br>";
}


else{
	#connect to the database
	$pdo = new PDO('mysql:host=localhost;dbname=332project', "root", "");
	if ($slevel == "pla"){
		if(empty($email)){
		echo "It is empty!!! Please enter the number of used email<br>";
		}
		$sql = "insert into Companies values('$cname','Platinum','5','$email','$money')";
		$stmt = $pdo->prepare($sql);   #create the query
		$stmt->execute();   #bind the parameters
		$left_email = 5 - (int)$email;
		echo "Platinum Sponsoring Company '$cname' added successfully. $left_email emails left.";
	}
	elseif($slevel == "gol"){
		if(empty($email)){
		echo "It is empty!!! Please enter the number of used email<br>";
		}
		$sql = "insert into Companies values('$cname','Gold','4','$email','$money')";
		$stmt = $pdo->prepare($sql);   #create the query
		$stmt->execute();   #bind the parameters
		$left_email = 4 - (int)$email;
		echo "Gold Sponsoring Company '$cname' added successfully. $left_email emails left.";
	}
	elseif($slevel == "sil"){
		if(empty($email)){
		echo "It is empty!!! Please enter the number of used email<br>";
		}
		$sql = "insert into Companies values('$cname','Silver','3','$email','$money')";		
		$stmt = $pdo->prepare($sql);   #create the query
		$stmt->execute();   #bind the parameters
		$left_email = 3 - (int)$email;
		echo "Silver Sponsoring Company '$cname' added successfully. $left_email emails left.";
	}
	elseif($slevel == "bro"){
		if ($email > 0){
		echo"Bronze company doesn't allow to send email to students. Please don't enter the number of used emails.";}
		else{
		$sql = "insert into Companies values('$cname','Bronze','0',Null,'$money')";
		$stmt = $pdo->prepare($sql);   #create the query
		$stmt->execute();   #bind the parameters
		echo "Bronze Sponsoring Company '$cname' added successfully. No email to send.";}
	}
}
	
?><br>
</table>
<a href="createcom.html">Back to Previous Page</a><br>
<a href="index.html">Back to Home Page</a>
<?php include "footer.php"; ?>