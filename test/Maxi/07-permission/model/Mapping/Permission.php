<?php
class Permission {

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
public function __construct(int $permission_id, string $permission_name, string $permission_description)
{
    $this->setPermissionId($permission_id);
    $this->setPermissionName($permission_name);
    $this->setPermissionDescription($permission_description);
}
// Pour recupere une propriete private (ou protected) getters ou accessors
public function getPermission(): ?int
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
// pour modifier une propriete private (ou protected) setters ou mutators
public function setPermission(?int $permission_id): void
{
    $this->permission_id = $permission_id;
}

public function setPermissionName(?string $permission_name): void
{
    $this->permission_name = $permission_name;
}
public function setPermission_description(): ?string
{
    return $this->permission_description;
}
};