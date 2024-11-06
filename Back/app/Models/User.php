<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\UserHasRole;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected $dates = ['deleted_at'];
    public function listUser()
    {
        return $users = $this->query()->select('name', 'email')->latest('id')->paginate(10);
    }
    // Trong model User
    public function isAdmin(): bool
    {
        $isAdmin = UserHasRole::query()
            ->join('users', 'user_has_roles.user_id', '=', 'users.id')
            ->select('users.status', 'user_has_roles.role_id', 'user_has_roles.user_id')
            ->where('user_has_roles.user_id', $this->id)
            ->first();

        // Kiểm tra điều kiện admin
        return $isAdmin && $isAdmin->role_id == 1 && $isAdmin->status == 0;
    }
}
