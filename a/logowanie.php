<form method="POST" action="logowanie.php">
	l: <input type="text" name="l" /> <br />
	h: <input type="password" name="h" /> <br />
	<button type="submit">loguj</button> <br/>
</form>

<a href="rejestracja.php">kliknij tutaj by zarejestrowac</a>

<?php
require_once "funkcje.php";

	if(isset($_POST['l']))
	{
		$l = $_POST['l'];
		$h = $_POST['h'];
		
		$p = polaczZDB();
		
		$z = "SELECT COUNT(ID) FROM uzytkownik WHERE LOGIN = 
		'$l' AND HASLO = '$h';";
		
		$r = $p->query($z)->fetch_array(MYSQLI_NUM);
		if($r[0] != 0)
		{
			session_start();
			$_SESSION['czyZalogowano'] = 1;
			$_SESSION['login'] = $l; 
			
			header("Location: poZalogowaniu.php");
		}
		else
		{
			echo "Niepoprawny login lub hasło";
		}
	}
?>