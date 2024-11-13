<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'display_name', 'guard_name'];
    public function listPermission()
    {
        return $permissions = $this->query()->select('id', 'name', 'display_name', 'guard_name')->latest('id')->paginate(20);
    }
    public function listPermissionID()
    {
        return $permissions = $this->pluck('id')->toArray();
    }
    public function getDisplayName($id)
    {
        return $permission = $this->query()->select('display_name')->where('id', $id)->first();
    }
}
