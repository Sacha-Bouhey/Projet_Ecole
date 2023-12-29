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
		$tableauSQL = SelectBDD($pdo, "select *  FROM clients");
			
		// Si le résultat de la requête est non vide
		if (count($tableauSQL) > 0)
		{
			echo '<TABLE border="1">';
			echo "<TR><TD> Nom</TD>";	
			echo '<TD> Prenom</TD>';
			echo '<TD>Mail</TD>';
			echo '<TD>Tel.</TD></TR>';
			
			// Boucle d'affichage du tableau des clients	
			for ($i=0;$i<count($tableauSQL);$i++)
			{
				// Lien vers le détail du client
				echo "<TR>";
				echo '<TD><A HREF="client_detail.php?id_client='.$tableauSQL[$i]['id'].'">'.$tableauSQL[$i]['nom'].'</A></TD>';
				echo '<TD><A HREF="client_detail.php?id_client='.$tableauSQL[$i]['id'].'">'.$tableauSQL[$i]['prenom'].'</A></TD>';
				echo '<TD><A HREF="client_detail.php?id_client='.$tableauSQL[$i]['id'].'">'.$tableauSQL[$i]['mail'].'</A></TD>';
				echo '<TD><A HREF="client_detail.php?id_client='.$tableauSQL[$i]['id'].'">'.$tableauSQL[$i]['tel'].'</A></TD>';
				echo "</TR>";
			
			}
			echo "</TABLE>";
		}
	}	




?>
    
  </body>
</html>