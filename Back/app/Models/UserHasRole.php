<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserHasRole extends Model
{
    use HasFactory;
    protected $table = 'user_has_roles';
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public static function RoleHasPermission($roleId)
    {
        $permissions = UserHasRole::join('role_has_permissions', 'user_has_roles.role_id', 'role_has_permissions.role_id')
            ->join('permissions', 'role_has_permissions.permission_id', 'permissions.id')->where('user_has_roles.role_id', '=', $roleId)
            ->select('permissions.display_name')->get();
        // return $permissions->pluck('display_name')->toArray();
        return $permissions;
    }
}
