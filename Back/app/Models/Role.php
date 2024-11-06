<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'display_name', 'guard_name'];
    public function listRole()
    {
        return $roles = $this->query()->select('name', 'display_name', 'guard_name')->latest('id')->paginate(10);
    }
}
