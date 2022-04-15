<?php 

$con = mysqli_connect('localhost','root','');
mysqli_select_db($con, 'final-group-chat');

$userName = $_GET['name'];

// echo "Groups of ".$userName;
// echo "<br>";

$query2 = mysqli_query($con, "SELECT * FROM user WHERE user_name = '".$userName."'");
while ($row1 = mysqli_fetch_array($query2))
{
	$query = "SELECT * FROM `users_groups` WHERE user_id = ".$row1['user_id']."";
	$result = mysqli_query($con, $query);
	while ($row = mysqli_fetch_array($result))
	{
		$sql = mysqli_query($con, "SELECT * FROM groups WHERE group_id = ".$row['group_id']."");
		while($row2 = mysqli_fetch_array($sql))
		{
			if ($row['read_chats'] < $row2['total_chats'])
			{
				$unread = $row2['total_chats'] - $row['read_chats'];
				echo $unread;
			}
			echo "<a href='chats.php?user=".urlencode($row1['user_id'])."&group=".urlencode($row2['group_id'])."'>". $row2['group_name']."</a><br>";
		}
	}
}

?>

<!-- <!DOCTYPE html>
<html>
<head>
	<title>Groups</title>
</head>
<body>

<form action='NewGroup.php?nname=<?php echo $userName ?>' method="POST">
	<button type="submit">New Group</button>
</form>

<form action='newChat.php?name=<?php echo $userName ?>' method='POST'>
	<button type="submit">New Individual Chat</button>
</form>

</body> -->

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
			<div class="div_form_2">
				<h1>Grupos de <?php echo $userName?></h1>
				<form action='NewGroup.php?nname=<?php echo $userName ?>' method="POST">
					<button class="btn_option btn_shadow" type="submit">Nuevo Grupo</button>
				</form>

				<form action='newChat.php?name=<?php echo $userName ?>' method='POST'>
					<button class="btn_option btn_shadow" type="submit">Chat Individual</button>
				</form>
			</div>
			
		</div>
	</div>
</body>
</html>