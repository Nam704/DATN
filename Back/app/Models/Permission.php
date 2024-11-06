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
        return $permissions = $this->query()->select('id', 'name', 'display_name', 'guard_name')->latest('id')->paginate(10);
    }
}
