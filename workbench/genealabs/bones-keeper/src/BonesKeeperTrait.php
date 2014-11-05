<?php namespace GeneaLabs\Bones\Keeper;

trait BonesKeeperTrait
{
    protected $roles;

    public function hasPermissionTo($action, $ownership, $entity, $ownerUserId = null)
    {
        return $this->prepPermissionsCheck($action, $ownership, $entity, $ownerUserId);
    }

    public function hasAccessTo($action, $ownership, $entity, $ownerUserId = null)
    {
        if (!$this->prepPermissionsCheck($action, $ownership, $entity, $ownerUserId)) {
            throw new NoPermissionsException;
        }
    }

    private function prepPermissionsCheck($action, $ownership, $entity, $ownerUserId)
    {
        $action = strtolower($action);
        $entity = strtolower($entity);
        $hasPermission = false;
        $ownershipTest = ($this->id == $ownerUserId) ? 'own' : 'other';
        $ownership = ($ownership == null) ? [] : $ownership;
        $ownership = (!is_array($ownership)) ? explode('|', strtolower($ownership)) : $ownership;
        if (count($ownership)) {
            if (in_array($ownershipTest, $ownership)) {
                $hasPermission = $this->checkPermission($action, $ownershipTest, $entity);
            } elseif (count($ownership) == 1) {
                $hasPermission = $this->checkPermission($action, $ownership[0], $entity);
            }
        } else {
            $hasPermission = $this->checkPermission($action, null, $entity);
        }

        return $hasPermission;
    }

    private function checkPermission($action, $ownership = 'any', $entity)
    {
        $action = Action::find($action);
        $entity = Entity::find($entity);
        $ownership = Ownership::find($ownership);
        var_dump($this->load('userRoles')->userRoles);
        dd($this->load('roles')->roles);
        if ($this->load('roles.permissions')->roles()->count()) {
            foreach ($this->userRoles as $role) {
                foreach ($role->permissions as $permission) {
                    if (($permission->action == $action) &&
                        ($permission->entity == $entity) &&
                        ($permission->ownership == $ownership)
                    ) {
                        return true;
                    }
                }
            }
        }

        return false;
    }

    public function isA($role)
    {
        $role = Role::find($role);

        return $this->roles->contains($role);
    }

    public function assignRole($role)
    {
        return $this->roles()->attach($role);
    }

    public function removeRole($role)
    {
        return $this->roles()->detach($role);
    }

    public function userRoles()
    {
        return $this->belongsToMany('\GeneaLabs\Bones\Keeper\Role', 'role_user', 'user_id', 'role_key');
    }

    public function roles()
    {
        return $this->belongsToMany('\GeneaLabs\Bones\Keeper\Role', 'role_user', 'user_id', 'role_key');
    }
}
