<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InternalEvent extends Model
{
    use HasFactory;
    protected $table = "InternalEvents";
    protected $primaryKey = 'Id';
    const CREATED_AT = "CreationDateTime";
    const UPDATED_AT = "EditDateTime";

}
