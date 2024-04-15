<?php
include_once 'server.php';
require_once ('CRUD.php');
require_once ('header.php');
if(isset($_SESSION['Id'])) {
    header("Location: accueil.php");
    exit;
}

if(isset($_POST['submit'])) {

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $adress = $_POST['adress'];
    $date_birth = $_POST['date_birth'];
    $job = $_POST['job'];
    $position = $_POST['position'];
    $creation_date = date("Y-m-d");
    // $id_user = $_SESSION['id_user'];

try{

    $requete = $connexion->prepare("INSERT INTO User(first_name,last_name,email,password,adress,date_birth,job,position,creation_date) VALUES (:first_name,:last_name,:email,:password,:adress,:date_birth,:job,:position,:creation_date");
    $requete->bindParam(':first_name', $first_name);
    $requete->bindParam(':last_name', $last_name);
    $requete->bindParam(':adress', $adress);
    $requete->bindParam(':email', $email);
    $requete->bindParam(':password', $password);
    $requete->bindParam(':date_birth', $date_birth);
    $requete->bindParam(':id_job', $job);
    $requete->bindParam(':id_position', $position);
    $requete->bindParam(':creation_date', $creation_date);
    // $requete->bindParam(':id_user', $id_user);
    $requete->execute();
    
    header('Location: index.php');
    exit();
} catch (PDOException $e) {
    echo "Erreur lors de l'inscription : " . $e->getMessage();
}
}

?>
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
                        <h2 class="card-title text-center mb-4 text-brown">Création de compte</h2>
                        <form action="" method="post">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="first_name" class="text-brown">Prénom :</label>
                                        <input type="text" class="form-control" name="first_name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="last_name" class="text-brown">Nom :</label>
                                        <input type="text" class="form-control" id="last_name" name="last_name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="job" class="text-brown"> Département :</label>
                                        <select name="job" id="job" class="form-control">
                        <?php
                        $requete = "SELECT id, department FROM Job";
                        $resultat = $connexion->query($requete);
                        if ($resultat->rowCount() > 0) {
                            while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option value='" . $row['id'] . "'>" . $row['department'] . "</option>";
                            }
                        }
                        ?>
                    </select>
                         </div>
                            </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="position" class="text-brown">Poste :</label>
                                        <select name="position" id="position" class="form-control">
                        <?php
                        $requete = "SELECT id, name FROM Position";
                        $resultat = $connexion->query($requete);
                        if ($resultat->rowCount() > 0) {
                            while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
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
                                        <label for="date_birth" class="text-brown">Date de naissance :</label>
                                        <input type="date" class="form-control" id="date_birth" name="date_birth" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="adress" class="text-brown">Adresse :</label>
                                        <input type="text" class="form-control" id="adress" name="adress" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email" class="text-brown">Email :</label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password" class="text-brown">Mot de passe :</label>
                                        <input type="password" class="form-control" id="password" name="password" required>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-brown btn-block mt-4"> Inscription</button>
                            <p>J'ai déjà un compte, <a href="connexion.php">me connecter ?</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
