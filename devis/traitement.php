<!DOCTYPE html>

 
<html>
 
   <head>
		<html lang="fr">
		<meta charset="utf-8" />
		<link href="style.css" rel="stylesheet">
		<link rel="icon" href="img/clicmolette.ico" />
		<title>Clic molette</title>
   </head>
 
   <body>

   	<header id="tete">
		
   		<h1>Clic molette</h1>
   		<h2>Bienvenue !</h2>
   		<nav>
   			<a href="../index.html">Accueil</a><a href="devis.html">Devis</a><a href="#">Média</a><a href="#">Tuto</a>
   		</nav>
   	</header>
		<section id="corps">
            
            <article>
                <h2 >
                    Traitement du devis
                </h2>
                <figure>
                    <img src="img/notreprojet.png" width="600" style="float:right" />
                </figure>   

                Votre devis à bien était enregistré, voici vos informations.<br><br>
            	<?php 
            		// on tente de ce connecter à la BDD et on stock la connexion dans la variable BDD
            		try
					{
						$bdd = new PDO('mysql:host=localhost;dbname=molette;charset=utf8', 'root', 'root');
					}
					catch(Exception $e)
					{
					        die('Erreur : '.$e->getMessage());
					}

					// On ajoute une entrée dans la devis
					$req = $bdd->prepare('INSERT INTO devis(nom, prenom, mail, type, besoin) VALUES(:nom, :prenom, :mail, :service, :besoin)');
					$req->execute(array(
						'nom' => $_POST['nom'],
						'prenom' => $_POST['prenom'],
						'mail' => $_POST['mail'],
						'service' => $_POST['service'],
						'besoin' => $_POST['besoin']
						));


            		echo "Votre Nom:&nbsp;";
            		echo $_POST['nom']; 
            		echo "<br>";
            		echo "Votre Prénom:&nbsp;";
            		echo $_POST['prenom'];
            		echo "<br>";
            		echo "Votre mail:&nbsp;";
            		echo $_POST['mail'];
            		echo "<br>";
            		echo "Le service demandé:&nbsp;";
            		echo $_POST['service'];
            		echo "<br>";
            		echo "Vos besoin spécifiques:&nbsp;";
            		echo $_POST['besoin'];
            	?>

		</section>

		<footer id="pied">
   		<address>36 Rue de la Poupée qui Tousse, 27000 Evreux </address>
   	</footer>
   </body> 
</html>