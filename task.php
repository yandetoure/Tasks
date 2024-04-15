<?php
require_once ('CRUD.php');

class Task implements CRUD {
    private $title;
    private $description;
    private $creation_date;
    private $priority;
    private $end;
    private $state;
    private $id_user;
    private $connexion;

    public function __construct($connexion, $title, $creation_date, $priority, $description, $end, $state, $id_user) {
        $this->title = $title;
        $this->description = $description;
        $this->creation_date = $creation_date;
        $this->priority = $priority;
        $this->end = $end;
        $this->state = $state;
        $this->id_user = $id_user;
        $this->connexion = $connexion;
    }
    public function getTitle()
{
    return $this->title;
}
public function getCreation_date() {
    return $this->creation_date;
}
public function getPriority()
{
    return $this->priority;
}
public function getDescription()
{
    return $this->description;
}
public function getEnd()
{
    return $this->end;
}
public function getState()
{
    return $this->state;
}
public function getId_user()
{
    return $this->id_user;
}

    public function addTask($title, $description, $creation_date, $priority, $state, $id_user, $end) {
        $sql = "INSERT INTO Task (title, description, :creation_date, priority, end, state, id_user) VALUES (:title, :description, :creation_date, :priority, :end, :state, :id_user)";
    

        try{

            $requete = $this->connexion->prepare($sql);
            $requete->bindParam(':title', $title);
            $requete->bindParam(':description', $description);
            $requete->bindParam(':creation_date', $creation_date);
            $requete->bindParam(':priority', $priority);
            $requete->bindParam(':end', $end);
            $requete->bindParam(':state', $state);
            $requete->bindParam(':id_user', $id_user);
            $requete->execute();
            
            header('Location: index.php');
            exit();
        } catch (PDOException $e) {
            echo "Erreur lors de l'inscription : " . $e->getMessage();
        }
    }

    public function deleteTask($id) {
        try {
            $sql = "DELETE FROM Task WHERE id= :id";
            $stmt = $this->connexion->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            header('location:index.php');
        } catch (PDOException $e) {
            die("erreur: impossible de faire la suppression" . $e->getMessage());
        }
    }

    
        public function updateTask($id,$title, $description, $creation_date, $id_user, $end, $priority, $state)
        {
            try {
                // Requête SQL UPDATE pour mettre à jour les informations du membre
                $sql = "UPDATE Task SET title = :title, description = :description, :creation_date = :creation_date, priority = :priority, end = :end, state = :state, id_user = :id_user WHERE id = :id";        
                // Préparation de la requête
                $stmt = $this->connexion->prepare($sql);{
                    // Définition des paramètres
                    $stmt->bindParam(':title', $title);
                    $stmt->bindParam(':description', $description);
                    $stmt->bindParam(':creation_date', $creation_date);
                    $stmt->bindParam(':priority', $priority);
                    $stmt->bindParam(':end', $end);
                    $stmt->bindParam(':state', $state);
                    $stmt->bindParam(':id_user', $id_user);
                    $stmt->bindParam(':id', $id);
                    // Exécution de la requête
                    $stmt->execute();
                    // Redirection vers la page index.php après la mise à jour
                    header("Location: index.php");
                    exit();
                }
            } catch (PDOException $e) {
                echo "Erreur lors de la mise à jour de l'enregistrement : " . $e->getMessage();
            }
        }
        
    public function readTask(){
        try{
            //Requête d'insertion
            // $sql= "SELECT * FROM Member";
            $sql = "SELECT * FROM Task
            JOIN Statut ON (Member.id_statut=Statut.id)
            JOIN Etat ON (Member.id_etat=Etat.id)
            JOIN  Tranche_age ON (Tranche_age.id = Member.id_age);
            ";
            //Préparation de la requête
            $stmt=$this->connexion->prepare($sql);
            //Exécution de la requete
            $stmt->execute();

            //Récupération des données
            $resultat=$stmt->fetchALL(PDO::FETCH_ASSOC);
            return $resultat;
        }
        catch(PDOException $e){
            echo "Erreur: " . $e->getMessage();
        }
    }


}

