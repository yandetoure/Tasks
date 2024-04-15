<?php
include('server.php');
include('header.php');
session_start();
if(isset($_SESSION['id'])){
    $id_user = $_SESSION['id'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="profil.css">
    <title>profil</title>
</head>
<body class="body">
    
<?php

try {
    // Requête SQL pour récupérer les informations de l'utilisateur connecté
    $requete_user = $connexion->prepare("SELECT id, first_name, last_name, date_birth, adress, email, creation_date FROM User WHERE id=:id_user");
    $requete_user->bindParam(':id_user', $id_user);
    $requete_user->execute();

    // Vérifie si la requête a renvoyé des résultats
    if ($requete_user->rowCount() > 0) {
        // Afficher les informations de l'utilisateur
        $row_user = $requete_user->fetch(PDO::FETCH_ASSOC);

        echo "<div class='body-content'>";
        echo "<div class='content'>";
        echo "<h3><strong>Bonjour" ."  ".$row_user['first_name']. " " .$row_user['last_name'] .":</strong></h3>";
        echo "<p><strong>Voici vos informations personnelles :</strong></p>";
        echo "<p><strong>Prénom :</strong> " . $row_user['first_name'] . "</p>";
        echo "<p><strong>Nom :</strong> " . $row_user['last_name'] . "</p>";
        echo "<p><strong>Date de naissance :</strong> " . $row_user['date_birth'] . "</p>";
        echo "<p><strong>Adresse :</strong> " . $row_user['adress'] . "</p>";
        echo "<p><strong>Email :</strong> " . $row_user['email'] . "</p>";
        echo "<p><strong>Date de création de votre compte :</strong> " . $row_user['creation_date'] . "</p>";
        echo "</div>";
        echo "</div>";

        // Requête SQL pour récupérer les tâches de l'utilisateur connecté
        $requete_tasks = $connexion->prepare("SELECT * FROM Tasks WHERE user_id=:id_user");
        $requete_tasks->bindParam(':id_user', $id_user);
        $requete_tasks->execute();

        // Vérifie si la requête a renvoyé des résultats
        if ($requete_tasks->rowCount() > 0) {
            echo "<div class='task-content'>";
            echo "<h3>Vos tâches :</h3>";
            // Afficher les tâches de l'utilisateur
            while ($row_task = $requete_tasks->fetch(PDO::FETCH_ASSOC)) {
                echo "<p><strong>Nom de la tâche :</strong> " . $row_task['task_name'] . "</p>";
                echo "<p><strong>Description :</strong> " . $row_task['description'] . "</p>";
                // Ajoutez ici d'autres informations sur la tâche si nécessaire
                echo "<hr>";
            }
            echo "</div>";
        } else {
            echo "<p>Aucune tâche disponible pour cet utilisateur.</p>";
        }
    } else {
        echo "<p>Aucune information disponible pour cet utilisateur.</p>";
    }
} catch (PDOException $e) {
    echo "Erreur lors de l'exécution de la requête : " . $e->getMessage();
}

if (isset($_SESSION['user'])) {
    echo '<a href="logout.php">Déconnecter</a>';
} else {
    // Afficher le bouton de connexion ou rediriger vers la page de connexion si l'utilisateur n'est pas connecté
}

?>

</body>

</html>
