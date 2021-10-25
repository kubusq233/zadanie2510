<?php
	session_start();
	
	if($_SESSION['czyZalogowano'] == 1)
		{
		header("Location: poZalogowaniu.php");
		}
?>

<form method="POST" action="rejestracja.php">
	l: <input type="text" name="l" /> <br />
	h: <input type="password" name="h" /> <br />
	<button type="submit">zarejestruj</button><br/>
</form>
	<a href="logowanie.php">zaloguj sie</a><br/>

<?php 
	require_once "funkcje.php";

		
				$l = $_POST['l'];
				$h = $_POST['h'];
	
				$r = 0;
				
				$p = polaczZDB();
		
				$z = "SELECT `LOGIN` FROM `uzytkownik`;";
				$q1 = mysqli_query($p, $z);
				
				$rej = "INSERT INTO uzytkownik (LOGIN, HASLO)VALUES ('$l', '$h');";
				
	
				if(isset($_POST['l']))
				{
				while ($row = mysqli_fetch_array($q1)) 
					{
						if($row["LOGIN"] == $l) //sprawdzamy czy podany login jest juz w bazie
						{
							echo "Login istnieje już w bazie";
							$r = 1;
							break;
						}
					}
						if($r != 1) //rejestracja
						{
							$q = mysqli_query($p, $rej);
							echo "Zarejestrowano użytkownika ".$l. "<br/>";
						}
				}
		
	
		
		
?>