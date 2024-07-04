<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tasks extends Model
{
    use HasFactory;

    protected $fillable = [
        'titel',
        'priority_id',
        'progress_id',
        'start_date',
        'due_date',
        'created_at',
        'updated_at',
    ];

    public function Priorities(): BelongsTo
    {
        return $this->belongsTo(Priorities::class, 'priority_id' , 'id');
    }

    public function Progress(): BelongsTo
    {
        return $this->belongsTo(Progress::class, 'progress_id' , 'id');
    }

    public function Users()
    {
        return $this->belongsToMany(User::class);

    }
}
