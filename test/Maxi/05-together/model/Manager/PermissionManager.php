<?php

#creation ou utilisation de l'espace de nom
namespace model\Manager;
#appel de l'interface
use model\Interface\InterfaceManager;
use model\Abstract\AbstractMapping;
use PDO;


class PermissionManager implements InterfaceManager{
    protected ?PDO $db = null;
    public function __construct(PDO $pdo){
        $this->db = $pdo;
    }
    public function selectAll():?array
    {
        $query = $this->db->query("SELECT * FROM `permission`
        WHERE `permission_id`=999
        ");
        //si pas de resultat
        if($query->rowCount()===0) return null;

        //recuperation des resultats au format tableau associatif
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        // on ferme le courseur
        $query ->closeCursor();
        //initialisation du tableau de sortie
        $arrayPermission = [];
        //pour chaque element de la table
        foreach($result as $value){
            //hydratation
            $arrayPermission[] = new PermissionMapping($value);
        }

        return $arrayPermission;
        }
    public function selectOneById(int $id){

    }
    // insérera uniquement des enfants de AbstractMapping
    public function insert(AbstractMapping $mapping){

    }
    public function update(AbstractMapping $mapping){

    }
    public function delete(int $id){

    }

}
