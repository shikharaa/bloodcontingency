<?php 
	session_start();
	include 'dbconfig/config.php';
	try
	{
		if(isset($_POST['Signup_btn']))
		{
			 //echo '<script type="text/javascript"> alert("signup button is clicked")</script>';
								
			$firstname=$_POST['firstname'];
			$lastname=$_POST['lastname'];
			$username=$_POST['username'];
			$password=$_POST['password'];
			$cpassword=$_POST['cpassword'];
			$email=$_POST['email'];
			$gender=$_POST['gender'];
			$bloodgroup=$_POST['bloodgroup'];
			$datelastdonated=$_POST['datelastdonated'];
			if($password==$cpassword)
			{
				$con=getdb();
				$insert = $con->prepare("INSERT INTO donars(firstname,lastname,username,password,email,gender,bloodgroup,datelastdonated)
					values(:firstname,:lastname,:username,:password,:email,:gender,:bloodgroup,:datelastdonated)");
				$insert->bindParam(':firstname',$firstname);
				$insert->bindParam(':lastname',$lastname);
				$insert->bindParam(':username',$username);
				$insert->bindParam(':password',$password);
				$insert->bindParam(':email',$email);
				$insert->bindParam(':gender',$gender); 
				$insert->bindParam(':bloodgroup',$bloodgroup); 
				$insert->bindParam(':datelastdonated',$datelastdonated); 
				$insert->execute();
				
			}
			elseif($password!=$cpassword)
				{
					echo '<script type="text/javascript"> alert("password and conform password does not match")</script>';
								
				}
		else{}
			//no action required
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
		<title>RegistrationPage</title>
		<link rel="stylesheet" href="css/style.css">
	
	</head>
		<body style="background-color:#bdc3c7">
			<div id="main-wapper">
				<center><h2>RegistrationForm</h2>
				<img src="images/blood.png" class="blood">
				
					<form class="myform" action="Registration.php" method="post">
						<lable><b>firstname:</b></lable>
						<input name="firstname" type="text" class="inputvalues"  placeholder="enter firstname" required/><br><br>
						<lable><b>lastname:</b></lable>
						<input name="lastname"type="text" class="inputvalues"  placeholder="enter lastname"required/><br><br>
						<lable><b>username:</b></lable>
						<input name="username" type="text" class="inputvalues"  placeholder="enter username or mobile no"required/><br><br>
						<lable><b>password:</b></lable>
						<input name="password" type="password"  class="inputvalues" placeholder="enter password " required/><br><br>
						<lable><b>conformpassword:</b></lable>
						<input name="cpassword" type="password"  class="inputvalues" placeholder=" enter conformpassword " required/><br><br>
						<lable><b>emailaddress:</b></lable>
						<input name="email" type="email"  class="inputvalues" placeholder=" enter emailaddress" required/><br><br>
						<lable><b>gender:</b></lable>
						<input type="radio"  class="radiobtns" name="gender" value="male" checked> Male
						<input type="radio"  class="radiobtns" name="gender" value="female"> Female<br><br>
						<lable><b>bloodgroup:</b></lable>
						<select class="Bgroup" name="bloodgroup">
							  <option value="O+">O+</option>
							  <option value="O-">O-</option>
							  <option value="A+">A+</option>
							  <option value="A-">A-</option>
							  <option value="B+">B+</option>
							  <option value="B-">B-</option>
							  <option value="AB+">AB+</option>
							  <option value="AB-">AB-</option>
						</select><br><br>
						<lable><b>datelastdonated:</b></lable>
						<input name="datelastdonated" type="date"  class="inputvalues" placeholder=" enter datelastdonated of donation " required/><br><br>

						<input name="Signup_btn" type="Submit" id="Signup_btn" value=Signup><br><br>
						<a href="LoginPage.php"><input type="button" id="Register_btn" value=BackToLoginPage></a><br><br>
						</center>
					</form>
			</div> 
		
		
		</body>


</html>