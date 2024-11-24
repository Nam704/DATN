<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ram extends Model
{
    use HasFactory, SoftDeletes;
    protected $dates = [
        'deleted_at'
    ];
    protected $table = 'rams';
    protected $fillable = [
        'size', 'unit'
    ];
}
