<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    use HasFactory;

    protected $table = 'Tasks';
    protected $primaryKey = 'Id';
    const CREATED_AT = 'CreationDateTime';
    const UPDATED_AT = 'EditDateTime';

    protected $casts = [
        'IsDone' => 'boolean',
        'IsActive' => 'boolean',
        'StartDateTime' => 'datetime',
        'Deadline' => 'datetime',
        'CreationDateTime' => 'datetime',
        'EditDateTime' => 'datetime',
    ];

    public function internalEvent(): BelongsTo
    {
        return $this->belongsTo(InternalEvent::class, 'InternalEventId', 'Id');
    }
}
