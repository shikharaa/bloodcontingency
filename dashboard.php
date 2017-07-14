<?php
	session_start();
	include 'dbconfig/config.php';
	try
	{
		if(isset($_POST['Search_btn']))
		{
			$bloodgroup=$_POST['bloodgroup'];
			$con = getdb(); 
			$select = $con->prepare("SELECT * FROM donars WHERE bloodgroup='$bloodgroup' and datelastdonated<(current_date-90)");
			$select->setFetchMode(PDO::FETCH_ASSOC);
			$select->execute();
			$data=$select->fetch();
			if($select->rowCount()!=0)
			{
				//echo '<script type="text/javascript"> alert("Records found for the given criteria.. donars found")</script>';
				echo '<table width="70%" broder="1" cellpadding="5" cellspacing="5">
					<tr>
						<th>firstname</th>
						<th>lastname</th>
						<th>gender</th>
						<th>email</th>
						<th>bloodgroup</th>
					</tr>';
				foreach($select as $row)
				{
					echo '<tr>
							<td>'.$row["firstname"].'</td>
							<td>'.$row["lastname"].'</td>
							<td>'.$row["gender"].'</td>
							<td>'.$row["email"].'</td>
							<td>'.$row["bloodgroup"].'</td>
						</tr>';
				}
		
			//echo "<tr>"."<td>".$data['firstname']."</td>"."<td>".$data['lastname']."</td>"."<td>".$data['lastname']."</td>"."<td>".$data['bloodgroup']."</td>"."<td>".$data['email']."</td>"."<td>".$data['gender']."</td>"."<td>".$data['datelastdonated']."</td>"."</tr>";
			}
			
			else
			{
				echo '<script type="text/javascript"> alert("No records found for the given criteria.. donars not found")</script>';
			}
		}
	}
	catch(PDOException $e)
	{
		echo "error".$e->getMessage();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<style>
		div.container {
			width: 100%;
			border: 1px solid gray;
		}

		header, footer {
			padding: 1em;
			color: white;
			background-color: black;
			clear: left;
			text-align: center;
		}

		nav {
			float: left;
			max-width: 160px;
			margin: 0;
			padding: 1em;
		}

		nav ul {
			list-style-type: none;
			padding: 0;
		}
		   
		nav ul a {
			text-decoration: none;
		}

		article {
			margin-left: 170px;
			border-left: 1px solid gray;
			padding: 1em;
			overflow: hidden;
		}
</style>
</head>
<body>
	<div class="container">
	<form class="myform" action="dashboard.php" method="post">
		<header>
			<h1>
			WELOCOME
			</h1>			
			
		</header>
			
	<nav>
		<b>MY PROFILE</b>
	</nav>
		<article>	
			<lable><b>Select Bloodgroup :</b></lable>
						<select class="Bgroup" name="bloodgroup">
							  <option value="O+">O+</option>
							  <option value="O-">O-</option>
							  <option value="A+">A+</option>
							  <option value="A-">A-</option>
							  <option value="B+">B+</option>
							  <option value="B-">B-</option>
							  <option value="AB+">AB+</option>
							  <option value="AB-">AB-</option>
						</select>
			<input name="Search_btn" type="Submit" id="search_btn" value=Search>
		</article>			 
	</form>
</body>

</html>