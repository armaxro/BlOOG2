<?php

namespace model\Mapping;
use model\Abstract\AbstractMapping;
class Permission extends AbstractMapping{

/*
Proprietees -> equivalent de variable
*/
private ?int $permission_id = null;
private ?string $permission_name = null;
private ?string $permission_description = null;

/*
Constante
*/

/*
Methode
*/

/*
Constructeur - appelé lors de l'instanciation (new permission ())
*/
 // appelé lors de l'instanciation (new Permission())
 public function __construct(int $permission_id, string $permission_name, string $permission_description)
 {
     // utilisation des setters
     $this->setPermissionId($permission_id);
     $this->setPermissionName($permission_name);
     $this->setPermissionDescription($permission_description);
 }

 // Pour récupérer une propriété private (ou protected)
 // getters ou accessors
 public function getPermissionId(): ?int
 {
     return $this->permission_id;
 }

 public function getPermissionName(): ?string
 {
     return $this->permission_name;
 }

 public function getPermissionDescription(): ?string
 {
     return $this->permission_description;
 }

 // Pour modifier une propriété private (ou protected)
 // setters ou mutators
 public function setPermissionId(?int $permission_id): void
 {
     $this->permission_id = $permission_id;
 }

 public function setPermissionName(?string $permission_name): void 
 {
     $this->permission_name = $permission_name;
 }

 public function setPermissionDescription(?string $permission_description): void 
 {
     $this->permission_description = $permission_description;
 }
}