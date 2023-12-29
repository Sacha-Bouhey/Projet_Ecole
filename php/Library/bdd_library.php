<?php


//Connection a la base
function ConnexionBDD()
{
	try{
		
		$header = new PDO("mysql:host=localhost".";dbname=ticketing","support_user","@123+aze$");
			
		//echo"Connexion établie ".$host." BDD=".$nomBDD."<br>";
		return $header;
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
		return null;
	}
}

// Requete select
function SelectBDD($header, $requete)
{
	$select = $header->prepare ($requete);
	$select->setFetchMode(PDO::FETCH_ASSOC);
	$select->execute();
	$recupdata=$select->fetchAll();
	
	return $recupdata;
}
?>