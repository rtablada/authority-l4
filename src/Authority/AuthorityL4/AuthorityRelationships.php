<?php namespace Authority\AuthorityL4;

trait AuthorityRelationships
{

    /**
     * Name of the model used for Roles
     * 
     * @var string
     */
    protected $roleModel = 'Role';
    
    /**
     * Name of the model used for Permissions
     * 
     * @var string
     */
    protected $permissionModel = 'Permission';
    
    /**
     * Many to many relationship for Roles
     * 
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function roles() {
        return $this->belongsToMany('Role');
    }

    /**
     * Many to many relationship for Permissions
     * 
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function permissions() {
        return $this->hasMany('Permission');
    }

    /**
     * Checks to see if User has specified Role
     * 
     * @param string $key
     * 
     * @return boolean
     */
    public function hasRole($key) {
        foreach($this->roles as $role){
            if($role->name === $key)
            {
                return true;
            }
        }
        return false;
    }
}