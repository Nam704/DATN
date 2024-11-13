<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleHasPermission extends Model
{

    use HasFactory;
    protected $fillable = [
        "role_id",
        "permission_id"
    ];
    protected $table = "role_has_permissions";
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function permission()
    {
        return $this->belongsTo(Permission::class, 'permission_id');
    }
    public function listPermissionForRoleID($id): array
    {
        return $this->query()->where('role_id', $id)->pluck('permission_id')->toArray();
    }
    public function isExist($roleId, $permissionId)
    {
        return $this->query()->where("role_id", $roleId)->where("permission_id", $permissionId)->exists();
    }
    public function findRoleHasPermission($idRole, $idPermission)
    {
        return $this->query()->where('role_id', $idRole)->where("permission_id", $idPermission)->first();
    }
}
