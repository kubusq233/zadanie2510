<?php
function polaczZDB()
{
	$p = new mysqli ("localhost", "root", "", "a");
	
	if($p->connect_errno)
		return false;
	else
		return $p;
}

function czyZalogowany()
{
	session_start();

	if($_SESSION['czyZalogowano'] == 1)
	{
		echo "zalogowany";
	}
	else
	{
		header("Location: logowanie.php");
	}
}

function wyloguj()
{
	session_start();
	
	unset($_SESSION['czyZalogowano']);
	
	session_destroy();
	
}

?>