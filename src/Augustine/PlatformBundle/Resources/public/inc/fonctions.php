<?php
require_once('bdd_conf.php');

// f_utilis.php
function getGet($cle, $valDefault = ''){
  $value = (isset($_GET[$cle]) ? $_GET[$cle] : $valDefault);     
  // $value = htmlspecialchars($value, ENT_QUOTES); // Protège des injections HTML
  return trim($value); // supprime les blancs aux extrémités
}

function getPost($cle, $valDefault = ''){
  $value = (!empty($_POST[$cle]) ? $_POST[$cle] : $valDefault);     
  // $value = htmlspecialchars($value, ENT_QUOTES); // Protège des injections HTML
  return trim($value); // supprime les blancs aux extrémités
}

// f_commentaire.php; 
//function getCommentairesByIdActualite($idActu) {
//  global $pdo;

//  $query = 'SELECT * FROM commentaire WHERE idActu=:id ORDER BY id DESC'; 
//  $prep = $pdo->prepare($query);

//  $prep->bindValue(':id', $idActu);
//  $prep->execute();

//  $commentaires = $prep->fetchAll();

//  $prep->closeCursor();
//  $prep = NULL;

//  return $commentaires;
//}

// f_commentaire.php; 
function getAllCommentaires() {
  global $pdo;

  $query = 'SELECT * FROM commentaire ORDER BY dateCom DESC'; 
  $prep = $pdo->prepare($query);

  $prep->execute();

  $commentaires = $prep->fetchAll();

  $prep->closeCursor();
  $prep = NULL;

  return $commentaires;
}


//f_actualite.php; permet d'afficher les actualités contenues dans la base de donnée.
function getLastActualite() {
  global $pdo;
  $query = 'SELECT * FROM actualite ORDER BY id DESC LIMIT 1'; 
  $prep = $pdo->prepare($query);

  $prep->execute();
  $actu = $prep->fetch();

  $prep->closeCursor();
  $prep = NULL;

  return $actu;
}

//f_actualite.php; permet d'afficher les actualités contenues dans la base de donnée.
function getAllActualite() {
  global $pdo;
  $query = 'SELECT * FROM actualite ORDER BY timePost DESC'; 
  $prep = $pdo->prepare($query);

  $prep->execute();
  $actu = $prep->fetchAll();

  $prep->closeCursor();
  $prep = NULL;

  return $actu;
}

////////////// USER MANAGER ///////////////////////////////////////////////////////////

/**
* permet la création d'un utilisateur à partir de données présentes dans $_POST
* @return true si le SGBDR n'a rencontré une erreur à l'exécution de l'ordre SQL
*         false sinon  
*/
function createUser($tab)
{
  global $pdo ;
  
  try
  {
    $nom = $tab['nom'];
    $prenom = $tab['prenom'];
    $username = $tab['username'];
    $password = $tab['password'];
    //$authlevel = getPost('authlevel');

    $query = "INSERT INTO augustine2_user VALUES ('', :nom, :prenom, :username, :password, 1)";

    $prep = $pdo->prepare($query); // On affecte la preparation a $prep ...
    $prep->bindValue(':nom', $nom, PDO::PARAM_STR); // ... puis on traite $prep
    $prep->bindValue(':prenom', $prenom, PDO::PARAM_STR);
    $prep->bindValue(':username', $username, PDO::PARAM_STR);
    $prep->bindValue(':password', $password, PDO::PARAM_STR);

    $prep->execute();
  }
  catch ( Exception $e )
  {
    die ("erreur dans la requete ".$e->getMessage());
  }
}

function getMsgContact($tab)
{
	global $pdo ;
	
	try
	{
		$civilite = $tab['civilite'];
		$nom = $tab['nom'];
		$prenom = $tab['prenom'];
		$objet = $tab['objet'];
		$message = $tab['message'];

		$query = "INSERT INTO contact VALUES ('', :civilite, :nom, :prenom, :objet, :message)";

		$prep = $pdo->prepare($query); // On affecte la preparation a $prep ...
		$prep->bindValue(':civilite', $civilite, PDO::PARAM_STR); // ... puis on traite $prep
		$prep->bindValue(':nom', $nom, PDO::PARAM_STR);
		$prep->bindValue(':prenom', $prenom, PDO::PARAM_STR);
		$prep->bindValue(':objet', $objet, PDO::PARAM_STR);
		$prep->bindValue(':message', $message, PDO::PARAM_STR);

		$prep->execute();
	}
	catch ( Exception $e )
	{
		die ("erreur dans la requete ".$e->getMessage());
	}
}

function getUserByNamePw($name, $pw) {
  //TODO
  $user = array('id'=>1, 'name'=>'testName', 'authlevel'=> 3, 'pass'=>'pass');
  return $user;
}

// LA SUITE ICI ...

?>
