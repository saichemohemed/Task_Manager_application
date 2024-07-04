<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tasks_user extends Model
{
    use HasFactory;

    protected $fillable = [
        'tasks_id',
        'user_id',
        'created_at',
        'updated_at',
    ];

}
