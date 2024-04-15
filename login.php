<?php
require_once "server.php";
// Démarrer la session
session_start();
// Vérifie si l'utilisateur est déjà connecté
if(isset($_SESSION['id'])){
    header ("location : index.php");
    exit();
}
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	// Récupérer les données du formulaire
	$email = $_POST['email'];
	$password = $_POST['password'];

	// Requête pour vérifier l'existence de l'email et du mot de passe
	$sql = "SELECT * FROM User WHERE email = :email AND password =:password";
	$stmt = $connexion->prepare($sql);
	$stmt->bindParam(':email', $email);
	$stmt->bindParam(':password', $password);

	$stmt->execute();
//Vérifie s'il y'a une correspondance
if($requete->rowcount() ==1){
    $user =$requete->fetch(PDO::FETCH_ASSOC);
    $_SESSION['id'] = $id_user;
    $_SESSION['first_name'] = $user['first_name'];
    $_SESSION['last_name'] = $user['last_name'];
        //rediriger vers la page d'accueil
        header ("location: index.php");
        exit();
} else {
    $errorMessage = "Mot de passe incorrect";
}
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="login.css">
	<title>Connexion</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="body">
	<div class="container mt-5">
		<div class="mb-4">
			<h2 class="mb-4">Connexion</h2>
			<?php if (isset($errorMessage)) : ?>
				<div><?php echo $errorMessage; ?></div>
			<?php endif; ?>
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="form">
				<label for="email">Email :</label><br>
				<input type="email" id="email" name="email" required><br>
				<label for="password">Mot de passe :</label><br>
				<input type="password" id="password" name="password" required><br>
				<button type="submit">Se connecter</button>
			</form>
		</div>
	</div>
</body>

</html>