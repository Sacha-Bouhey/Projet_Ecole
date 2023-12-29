<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Liste des tickets du technicien</title>

  </head>
   <body>
 
    <h1>Liste des tickets liste des techniciens</h1>
     
	<?php						
	include ('library/bdd_library.php');	
	$id = htmlspecialchars($_GET['id_technicien']);
    $statut = htmlspecialchars($_GET['statut']);

	// Connexion à la BDD
	$pdo=ConnexionBDD();	


	// Si la connexion a réussi
	if ($pdo != NULL)
	{
		// Requêtes SQL 
		if ($statut == 0) {
            $tableauSQL = SelectBDD($pdo, 'SELECT statut.id AS statid, tickets.id, clients.nom, technicien.nom AS tech, tickets.date_creation, statut.nom_statut, tickets.description FROM tickets JOIN technicien ON technicien.ID = tickets.technicien_id JOIN clients ON clients.id = tickets.client_id JOIN statut ON statut.id = tickets.statut WHERE technicien.id='.$id);
        }
        else {
            $tableauSQL = SelectBDD($pdo, 'SELECT statut.id AS statid, tickets.id, clients.nom, technicien.nom AS tech, tickets.date_creation, statut.nom_statut, tickets.description FROM tickets JOIN technicien ON technicien.ID = tickets.technicien_id JOIN clients ON clients.id = tickets.client_id JOIN statut ON statut.id = tickets.statut WHERE technicien.id='.$id.' AND statut.id= '.$statut);

        }
		
        // Si le résultat de la requête est non vide
		if (count($tableauSQL) > 0)
		{
			echo '<TABLE border="1">';
			echo "<TR>";
            echo "<TD>ID</TD>";	
			echo '<TD>Nom client</TD>';
            echo '<TD>Nom Technicien</TD>';
            echo '<TD>Description</TD>';
            echo '<TD>Date Creation</TD>';
            echo '<TD>Statut</TD>';
            echo '</TR>';
			
			// Boucle d'affichage du tableau des clients	
			for ($i=0;$i<count($tableauSQL);$i++)
			{
                if ($tableauSQL[$i]['statid'] == 1) {
                    echo "<TR bgcolor='green'>";
                }
                elseif ($tableauSQL[$i]['statid'] == 2) {
                    echo "<TR bgcolor='red'>";
                }
                elseif ($tableauSQL[$i]['statid'] == 3) {              
                    echo "<TR bgcolor='purple'>";}

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