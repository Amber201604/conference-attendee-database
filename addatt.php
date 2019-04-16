<!DOCTYPE html>
<html>
<head>
<link href="firstPage.css" type="text/css" rel="stylesheet" >
</head>
<body>

	<?php
	$name = $_POST["name"];
	$category = $_POST["category"];
	$rate = $_POST["rate"];
	$room = $_POST["room"];
	$roomnum = $_POST["roomnum"];
	$comp = $_POST["company_name"];

	if(empty($name)){
		echo "Attendee's name is empty!!! Please enter the full name<br>";
	}

	if(empty($category)){
		echo "It is empty!!! Please choose the category of the attendee<br>";
	}

	else{
		#connect to the database
		$pdo = new PDO('mysql:host=localhost;dbname=332project', "root", "");
		if ($category == "stu"){	
			$randomid = rand(1000,9999);
			if ($room == "yes"){
				if(empty($roomnum)){
					echo "The room number is empty!!! Please assign a room to the student who requires residence.<br>";
				}
				$bed = rand(1,2);
				$query = "SELECT count(name) as prenumstu from Students where room_number=$roomnum";
				$stmt = $pdo->prepare($query);
				$stmt->execute();
				$prev_num = $stmt->fetch(PDO::FETCH_ASSOC);
				$num_stu = $prev_num['prenumstu'] + 1;				
				if ($num_stu > 3){
					echo "Room $roomnum is full. Please choose another room for the student. <br>";	
				}
				elseif ($num_stu == 1){
					$sql0 = "insert into Housing_list values('$roomnum', '$bed','$num_stu')";
					$stmt = $pdo->prepare($sql0);   #create the query
					$stmt->execute();
					echo "Room $roomnum is added the first person. <br>";
					$sql = "insert into Students values('$randomid','$name','$rate','$roomnum')";
					$stmt = $pdo->prepare($sql);   #create the query
					$stmt->execute();   #bind the parameters
					echo "<p> Student is added successfully. Student ID: $randomid   Room: $roomnum </p> <br>";
				}
				else{
					$sql = "update Housing_list set num_students = num_students + 1 where room_number = $roomnum";
					$stmt = $pdo->prepare($sql);   #create the query
					$stmt->execute();   #bind the parameters
					echo "Room $roomnum is updated to $num_stu students.";
					$sql = "insert into Students values('$randomid','$name','$rate','$roomnum')";
					$stmt = $pdo->prepare($sql);   #create the query
					$stmt->execute();   #bind the parameters
					echo "<p> Student is added successfully. Student ID: $randomid   Room: $roomnum </p>";
				}					
			}
			else{
				$sql = "insert into Students values('$randomid','$name','$rate',null)";
				$stmt = $pdo->prepare($sql);   #create the query
				$stmt->execute();   #bind the parameters
				echo "<p> Student is added successfully. Student ID: $randomid   Room: null  </p>";
			}
		}
		elseif ($category == "pro"){
			$randomid = rand(100,999);
			$sql = "insert into Professionals values('$randomid','$name','$rate')";
			$stmt = $pdo->prepare($sql);   #create the query
			$stmt->execute();   #bind the parameters
			echo "<p> Professional is added successfully. Professional ID: $randomid </p>";
		}
		
		elseif ($category == "spon"){			
			if(empty($comp)){
				echo "It is empty!!! Please enter the company name<br>";}
			else{
				$sql = "SELECT count(company_name) as compnum from Companies where Companies.company_name= '$comp' ";
				$stmt = $pdo->prepare($sql);   #create the query
				$stmt->execute();
				$row1 = $stmt->fetch();				
				if ($row1['compnum'] == 0) {										
					echo "Please input the sponsoring company info before entering sponsor's info.";
				}
				else{
					$randomid = rand(100000,999999);
					$sql = "insert into Sponsors values('$randomid','$name','$comp')";
					$stmt = $pdo->prepare($sql);   #create the query
					$stmt->execute();   #bind the parameters
					echo "<p> Sponsor is added successfully. Sponsor ID: $randomid </p>";
				}
			}
		}
		
	}	

?>
<br>
<a href="createCom.html">Add a new sponsoring company</a><br>
<a href="createAtt.html">Back to Previous Page</a><br>
<a href="index.html">Back to Home Page</a>

	
</body>
</html>