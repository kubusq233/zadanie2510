<?php
require_once "funkcje.php";
czyZalogowany();

echo "<br />witaj ", $_SESSION['login'];



?>

<form method="POST" action="poZalogowaniu.php">
	<button type="submit" name="wyloguj">wyloguj</button>
	<button type="submit" name="zmien">zmien haslo</button>
	<button type="submit" name="usun">usun</button>
</form>

<?php
	require_once "funkcje.php";
	
	if(isset($_POST['wyloguj']))
	{
		wyloguj();
	
		header("Location: logowanie.php");
	}
	
	elseif(isset($_POST['zmien']))
	{
		header("Location: zmienhaslo.php");
	}
	
	elseif(isset($_POST['usun']))
	{
		$p = polaczZDB();
		
		$l = $_SESSION['login'];
		
		$z = "DELETE FROM uzytkownik WHERE LOGIN = '$l'";
		$q = mysqli_query($p, $z);
		unset($_SESSION['czyZalogowano']);
		header("Location: logowanie.php");
		session_destroy();
	}
?>