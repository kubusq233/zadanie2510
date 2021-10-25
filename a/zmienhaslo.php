<?php 
	session_start();
?>
<form method="POST" action="zmienhaslo.php">
	obecne haslo: <input type="password" name="h"/><br/>
	nowe haslo: <input type="password" name="h2"/><br/>
	<button type="submit">zmien</button>
</form>

<?php 
	require_once "funkcje.php";
	
	$p = polaczZDB();

	$l = $_SESSION['login'];

	$h1 = $_POST['h'];
	$h2 = $_POST['h2'];
	
	$z1 = "SELECT `HASLO` FROM uzytkownik WHERE `LOGIN` = '$l'";
	
	$q = mysqli_query($p, $z1);
	
	$row = mysqli_fetch_assoc($q);
	
	if(isset($_POST['h']))
	{
		if($row['HASLO'] == $h1) //czy stare haslo zgadza sie tym z bazy danych
			{
				if($h1 == $h2)
				{
					echo "stare haslo podobne do nowego";
				}
				else
				{
					$z2 = "UPDATE uzytkownik SET haslo='$h2' WHERE LOGIN = '$l'";
					$zm = mysqli_query($p, $z2);
					echo "Zmieniono haslo";
					header("location: logowanie.php");
				}
			}
		else
			{
				echo "Stare haslo sie nie zgadza";
			}
	}
?>