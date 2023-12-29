<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Liste des tickets</title>

  </head>
   <body>
 
    <h1>Liste des tickets</h1>
     
	<?php						
	include ('library/bdd_library.php');	
	
	// Connexion à la BDD
	$pdo=ConnexionBDD();	
	
	// Si la connexion a réussi
	if ($pdo != NULL)
	{
		// Requêtes SQL 
		$tableauSQL = SelectBDD($pdo, "SELECT tickets.id, tickets.date_creation, statut.nom_statut FROM tickets JOIN statut ON statut.id = tickets.statut");
			
		// Si le résultat de la requête est non vide
		if (count($tableauSQL) > 0)
		{
			echo '<TABLE border="1">';
			echo "<TR><TD> ID</TD>";	
			echo '<TD> Date creation</TD>';
			echo '<TD>Statut</TD></TR>';
			
			// Boucle d'affichage du tableau des clients	
			for ($i=0;$i<count($tableauSQL);$i++)
			{
				// Lien vers le détail du client
				echo "<TR>";
				echo '<TD><A HREF="ticket_detail.php?id_ticket='.$tableauSQL[$i]['id'].'">'.$tableauSQL[$i]['id'].'</A></TD>';
				echo '<TD><A HREF="ticket_detail.php?id_ticket='.$tableauSQL[$i]['id'].'">'.$tableauSQL[$i]['date_creation'].'</A></TD>';
				echo '<TD><A HREF="ticket_detail.php?id_ticket='.$tableauSQL[$i]['id'].'">'.$tableauSQL[$i]['nom_statut'].'</A></TD>';
				echo "</TR>";
			
			}
			echo "</TABLE>";
		}
	}	




?>
    
  </body>
</html>