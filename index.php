<?php

$con = mysqli_connect('localhost','root','');
mysqli_select_db($con, 'final-group-chat');

if(isset($_POST['insertUser']))
{
	if($_POST['username'] != "")
	{
		$userName = $_POST['username'];

		$query = "SELECT * FROM user WHERE user_name = '".$userName."'";
		$result = mysqli_query($con, $query);
		if(mysqli_num_rows($result)>0)
		{
			header('Location: groups.php?name='.$userName);			
		}
		else
		{	
			$query1 = "INSERT INTO `user` (`user_name`) VALUES ('$userName')";
			if(!mysqli_query($con,$query1)){
				echo "Error: Unable to Insert NewUser";
			}
			else{
				echo "User Entered successfully";
			}
		}
	}
	else
	{
	echo "Error: Enter Name";
	}
}

?>
<!-- 
<!DOCTYPE html>
<html>
<head>
	
	<title>USER</title>
	
</head>
<body>

<form action="index.php" method="POST">
	<label for="username">Enter Your Name:</label></br></br>
	<input type="text" name="username" id="username"></br></br>
	<button name="insertUser" type="submit">Submit</button>
</form>

</body>
</html> -->

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/estilos.css">
	<title>CHAT MOVISTAR</title>
</head>
<body>
	<div class="container">
		<div class="div_form">
			<form action="index.php" method="POST" id="form-user">
				<label class="label_nombre" for="username">Ingresa tu Nombre:</label></br></br>
				<input class="input_nombre" type="text" name="username" id="username" placeholder="Aqui va tu nombre"></br></br>
				<button class="btn_option" name="insertUser" type="submit">Submit</button>
			</form>
		</div>
	</div>
</body>
</html>