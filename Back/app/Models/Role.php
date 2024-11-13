<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use HasFactory,SoftDeletes;
    public $dates = [
        'delete_at'
    ];
    protected $fillable = ['name', 'display_name', 'guard_name'];
    public function listRole()
    {
        return $roles = $this->query()->select('id', 'name', 'display_name', 'guard_name')->latest('id')->get();
    }
}