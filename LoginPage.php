<?php
	session_start();
	include 'dbconfig/config.php';
	try
	{
		if(isset($_POST['login']))
		{
			$username=$_POST['username'];
			$password=$_POST['password'];
			$con = getdb(); 
			$select = $con->prepare("SELECT * FROM donars WHERE username='$username' and password='$password'");
			$select->setFetchMode(PDO::FETCH_ASSOC);
			$select->execute();
			$data=$select->fetch();
			if($data['username']!=$username and $data['password']!=$password)
			{
				echo '<script type="text/javascript"> alert("invalid username or password")</script>';
							
		
			}
			elseif($data['username']==$username and $data['password']==$password)
			{
				$_session['username']=$data['username'];
				header("location:dashboard.php"); 
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
		<title>LoginPage</title>
		
	</head>
		<body style="background-color:#bdc3c7">
		<link rel="stylesheet" href="css/style.css">
		<div id="main-wapper">
			<center>
			<h2>LoginForm</h2>
				<img src="images/blood.png" class="blood">
				
				<form class="myform" action="LoginPage.php" method="post">
					<lable><b>Username:</b></lable>
					<input type="text" name="username" class="inputvalues"  placeholder="enter username or mobile no" requried/><br><br>
					<lable><b>Password:</b></lable>
					<input type="password" name="password" class="inputvalues" placeholder="enter password "requried/><br><br>
					<input name="login" type="Submit" id="Login_btn" value=Login><br><br>
					<a href="Registration.php"><input type="button" id="Register_btn" value=Register></a>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   <br><br>
				</form>
			</center>	
		</div>
          		
		</body>
</html>