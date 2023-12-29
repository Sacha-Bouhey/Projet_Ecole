<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Liste des ticket</title>

  </head>
   <body>
 
    <h1>Liste des ticket</h1>
     
	<?php						
	include ('library/bdd_library.php');	
    $id = htmlspecialchars($_GET['id_ticket']);
	
	// Connexion à la BDD
	$pdo=ConnexionBDD();	
	
	// Si la connexion a réussi
	if ($pdo != NULL)
	{
		// Requêtes SQL 
		$tableauSQL = SelectBDD($pdo, "SELECT tickets.id, clients.nom, technicien.nom AS tech, tickets.date_creation, statut.nom_statut, tickets.description FROM tickets JOIN technicien ON technicien.ID = tickets.technicien_id JOIN clients ON clients.id = tickets.client_id JOIN statut ON statut.id = tickets.statut WHERE tickets.id=".$id);
			
		// Si le résultat de la requête est non vide
		if (count($tableauSQL) > 0)
		{
			echo '<TABLE border="1">';
			echo "<TR><TD> ID</TD>";
            echo '<TD> Clients</TD>';
            echo '<TD> Technicien</TD>';
            echo '<TD> Description</TD>';
			echo '<TD> Date creation</TD>';
			echo '<TD>Statut</TD></TR>';
			
			// Boucle d'affichage du tableau des clients	
			for ($i=0;$i<count($tableauSQL);$i++)
			{
				// Lien vers le détail du client
				echo "<TR>";
				echo '<TD>'.$tableauSQL[$i]['id'].'</A></TD>';
                echo '<TD>'.$tableauSQL[$i]['nom'].'</A></TD>';
                echo '<TD>'.$tableauSQL[$i]['tech'].'</A></TD>';
                echo '<TD>'.$tableauSQL[$i]['description'].'</A></TD>';
				echo '<TD>'.$tableauSQL[$i]['date_creation'].'</A></TD>';
				echo '<TD>'.$tableauSQL[$i]['nom_statut'].'</A></TD>';
                
				echo "</TR>";
			
			}
			echo "</TABLE>";
		}
	}	




?>
    
  </body>
</html>