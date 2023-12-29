<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Liste des clients</title>

  </head>
   <body>
 
    <h1>Liste des clients</h1>
     
	<?php						
	include ('library/bdd_library.php');	
	
	
	// Connexion à la BDD
	$pdo=ConnexionBDD();	
	
	// Si la connexion a réussi
	if ($pdo != NULL)
	{
		// Requêtes SQL 
		$tableauSQL = SelectBDD($pdo, "SELECT * FROM clients");
			
		// Si le résultat de la requête est non vide
		if (count($tableauSQL) > 0)
		{
			// Boucle d'affichage des clients	
			for ($i=0;$i<count($tableauSQL);$i++)
			{
				echo $tableauSQL[$i]['nom']."<BR>";
			
			}
		}
	}	




?>
    
  </body>
</html>