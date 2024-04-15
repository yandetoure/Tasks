<?PHP 

require_once 'task.php';
//Déclarations des variables pour la connexion
$host ="localhost";
$user="root";
$pass= "";
$db = "Tasks";

try{
    
    $connexion = new PDO("mysql:host=$host;dbname=$db",$user,$pass);

    //Déclaration des variables et instanciation de resultat
    $title = "";
    $description = "";
    $creation_date = "";
    $id_user = "";
    $end = "";
    $priority = "";
    $state = "";


    $task = new Task ($connexion, $title, $description, $creation_date, $id_user, $end, $priority, $state);

    

    
} catch (PDOException $e) {
    die("Erreur de la connexion à la base de données : ".$e->getMessage());
}