<?php
namespace model\Manager ;

use Exception;
use model\Abstract\AbstractMapping;
use model\Interface\InterfaceManager;
use model\Mapping\PermissionMapping;
use PDO; 


class PermissionManager implements InterfaceManager{

    // On va stocker la connexion dans une propriété privée
    private ?PDO $connect = null;

    // on va passer notre connexion PDO
    // à notre manager lors de son instanciation
    public function __construct(PDO $db){
        $this->connect = $db;
    }

    // sélection de tous les articles
    public function selectAll(): ?array
    {
        // requête SQL
        $sql = "SELECT * FROM `permission` -- WHERE `comment_id`=999
         ORDER BY `permission_id` ASC";
        // query car pas d'entrées d'utilisateur
        $select = $this->connect->query($sql);

        // si on ne récupère rien, on quitte avec un message d'erreur
        if($select->rowCount()===0) return null;

        // on transforme nos résultats en tableau associatif
        $array = $select->fetchAll(PDO::FETCH_ASSOC);

        // on ferme le curseur
        $select->closeCursor();

        // on va stocker les commentaires dans un tableau
        $arrayPermission = [];

        /* pour chaque valeur, on va créer une instance de classe
        CommentMapping, liée à la table qu'on va manager
        */
        foreach($array as $value){
            // on remplit un nouveau tableau contenant les commentaires
            $arrayPermission[] = new PermissionMapping($value);
        }

        // on retourne le tableau
        return $arrayPermission;
    }

    // récupération d'un commentaire via son id
    public function selectOneById(int $id): null|string|PermissionMapping
    {

        // requête préparée
        $sql = "SELECT * FROM `permission` WHERE `permission_id`= ?";
        $prepare = $this->connect->prepare($sql);

        try{
            $prepare->bindValue(1,$id, PDO::PARAM_INT);
            $prepare->execute();

            // pas de résultat = null
            if($prepare->rowCount()===0) return null;

            // récupération des valeurs en tableau associatif
            $result = $prepare->fetch(PDO::FETCH_ASSOC);

            // création de l'instance CommentMapping
            $result = new PermissionMapping($result);

            $prepare->closeCursor();
            
            return $result;


        }catch(Exception $e){
            return $e->getMessage();
        }
        
    }

    // mise à jour d'un commentaire
    public function update(AbstractMapping $mapping): bool|string
    {

        if (!($mapping instanceof PermissionMapping)) {                    
            throw new Exception('L\'objet doit être une instance de CommentMapping'); 
        }
        // requête préparée
        $sql = "UPDATE `permission` SET `permission_name`=?, `permission_description`=? WHERE `permission_id`=?";
        // mise à jour de la date de modification

        $prepare = $this->connect->prepare($sql);

        try{
            $prepare->bindValue(1,$mapping->getPermissionName());
            $prepare->bindValue(2,$mapping->getPermissionDescription());
            $prepare->bindValue(3,$mapping->getPermissionId(), PDO::PARAM_INT);

            $prepare->execute();

            $prepare->closeCursor();

            return true;

        }catch(Exception $e){
            return $e->getMessage();
        }
        
    }


    // insertion d'un commentaire - À modifier !
    public function insert(AbstractMapping $mapping): bool|string
    {
        if (!($mapping instanceof PermissionMapping)) {                    
            throw new Exception('L\'objet doit être une instance de CommentMapping'); 
        }

        // requête préparée
        $sql = "INSERT INTO `permission`(`permission_name`, `permission_id` )  VALUES (?,1,1)";
        $prepare = $this->connect->prepare($sql);

        try{
            $prepare->bindValue(1,$mapping->getPermissionName());

            $prepare->execute();

            $prepare->closeCursor();

            return true;

        }catch(Exception $e){
            return $e->getMessage();
        }
    }

    // suppression d'un commentaire
    public function delete(int $id): bool|string
    {
        // requête préparée
        $sql = "DELETE FROM `permission` WHERE `permission_id`=?";
        $prepare = $this->connect->prepare($sql);

        try{
            $prepare->bindValue(1,$id, PDO::PARAM_INT);

            $prepare->execute();

            $prepare->closeCursor();

            return true;

        }catch(Exception $e){
            return $e->getMessage();
        }
        
    }

}