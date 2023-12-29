<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Liste des techniciens</title>

  </head>
   <body>


    <h1>Liste des techniciens</h1>
     
	<?php						
	include ('library/bdd_library.php');	
	

	// Connexion à la BDD
	$pdo=ConnexionBDD();	
	
	// Si la connexion a réussi
	if ($pdo != NULL)
	{
		// Requêtes SQL 
		$tableauSQL = SelectBDD($pdo, 'SELECT *  FROM technicien');
			
		// Si le résultat de la requête est non vide
		if (count($tableauSQL) > 0)
		{
			echo '<TABLE border="1">';
			echo "<TR>";
			echo "<TD> Nom</TD>";	
			echo '<TD> Mail</TD>';
			echo '<TD> statut</TD>';
			echo '<TD> valider</TD>';
			echo '</TR>';
			
			// Boucle d'affichage du tableau des clients	
			for ($i=0;$i<count($tableauSQL);$i++)
			{
				// Lien vers le détail du client
				echo "<TR>";
				echo '<TD><A HREF="technicien_detail.php?id_technicien='.$tableauSQL[$i]['id'].'">'.$tableauSQL[$i]['nom'].'</A></TD>';
				echo '<TD><A HREF="technicien_detail.php?id_technicien='.$tableauSQL[$i]['id'].'">'.$tableauSQL[$i]['mail'].'</A></TD>';
				echo '<TD><form action="technicien_detail.php?id_technicien='.$tableauSQL[$i]['id'].'" method="GET">
				<select name="statut" id="statut_select">
				<option value=0>TOUT</option><option value="1">EN COURS</option><option value="2">TERMINE</option><option value="3">ATTENTE CLIENT</option>
				</select></TD>';

				echo '<TD><input type="hidden" name="id_technicien" value="'.$tableauSQL[$i]['id'].'"/>';
				echo '<button type="submit" value="'.$tableauSQL[$i]['id'].'">Valider</button>';
				echo '</form></TD>';
				echo "</TR>";
			
			}
			echo "</TABLE>";
		}
	}	




?>
    
  </body>
</html>