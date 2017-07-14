<? php

session_start();

?>

<!DOCTYPE html>
<html>
	<head>
		<title>HomePage</title>
	</head>
		<body style="background-color:#bdc3c7">
		
			<div id="main-wapper">
			
				<center><h2>HomePage</h2>
					<img src="images/blood.png" class="blood">
				
						<form class="myform" action="HomePage.php method="post">

						<p><h3>WELCOME USER!!!</h3></P>
						<?php echo $_session['username'] ?>
						<input name="login" type="Submit" id="LogOut_btn" value="LogOut"><br><br>
						
				</center>
						</form>
						
			
			</div>
			
		
		
		</body>


</html>