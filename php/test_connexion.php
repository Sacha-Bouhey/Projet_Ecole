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
	
	if($pdo != NULL)
		echo "Connexion à la BDD établie ";
  else
    echo "Connexion échoué";
	?>
    
  </body>
</html>