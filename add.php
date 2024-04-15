<!-- <?php
include_once 'server.php';
require_once ('CRUD.php');
require_once ('header.php');

if($_SERVER['REQUEST_METHOD'] === "POST" ){

    $title = $_POST['title'];
    $description = $_POST['description'];
    $end = $_POST['end'];
    $priority = $_POST['priority'];
    $state = $_POST['state'];
    $creation_date = $_POST['creation_date'];
    $id_user = $_SESSION['id_user'];


    // Si aucune erreur n'a été détectée, nous pouvons procéder à l'insertion des données
    if (empty($error_message)) {
        // Appel de la méthode addMember
        $task->addTask($title, $description, $creation_date, $id_user, $end, $priority, $state);
    } else {
        // Affichage du message d'erreur
        echo "<div class='alert alert-danger'>$error_message</div>";
    }
}
?>
<!-- Reste du code HTML pour le formulaire -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vente de billet d'avion</title>
    <!-- Inclure Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /*Ajout d'une image en arrière plan */
.body{
    background-image: url(img/1.jpeg);
        display: flex;
    flex-direction: column;
    justify-content: center;
    p{
        text-align: center;;
    }
    a{
        color:#fff;
    }
}
/*CSS du card  */
        .card-title{
            font-size: 26px;
            font-weight: bold;
            margin-top: 60px;
            padding-bottom: 60px;
        }
        label{
            font-size: 15px;
        }
        /* Style pour changer la couleur du texte en brun */
        .text-brown {
            color: brown !important;
        }

        /* Style pour arrondir les bords des entrées */
        .form-control {
            border-radius: 15px;
        }
        .btn-brown {
            background-color: brown;
            border-color: brown;
            color:#fff;
            font-size: 14px;
            font-weight: bold;
        }
        .card{
    background-color: rgba(23, 126, 205, 0.8);
    display: flex;
    flex-direction: column;
    justify-content: center;
    padding: 8px;
    label{
        text-align: center;
        font-size: 17px;
        font-weight: bold;
     }
        }

        /* Style pour changer la couleur du texte du bouton en blanc */
        .btn-brown:hover {
            background-color: #854d27;
            border-color: #854d27;
        }
    </style>
</head>
<body class="body">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title text-center mb-4 text-brown">Crétaion d'une tâche</h2>
                        <form action="" method="post">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="first_name" class="text-brown">Titre :</label>
                                        <input type="text" class="form-control" name="first_name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="description" class="text-brown">Description de la tâche :</label>
                                        <input type="text" class="form-control" id="description" name="description" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="job" class="text-brown"> Priorité :</label>
                                        <select name="priority" id="priority" class="form-control">
                        <?php
                        $requete = "SELECT id, priority FROM Priority";
                        $resultat = $connexion->query($requete);
                        if ($resultat->rowCount() > 0) {
                            while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option value='" . $row['id'] . "'>" . $row['priority'] . "</option>";
                            }
                        }
                        ?>
                    </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="state" class="text-brown">État :</label>
                                        <select name="state" id="state" class="form-control">
                        <?php
                        $requete = "SELECT id, state FROM State";
                        $resultat = $connexion->query($requete);
                        if ($resultat->rowCount() > 0) {
                            while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option value='" . $row['id'] . "'>" . $row['state'] . "</option>";
                            }
                        }
                        ?>
                    </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="date_birth" class="text-brown">Date d'échéance :</label>
                                        <input type="date" class="form-control" id="date_birth" name="date_birth" required>
                                    </div>
                                </div>
                            </div>
                         
                            <button type="submit" class="btn btn-brown btn-block mt-4"> Enregistrer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html> -->
