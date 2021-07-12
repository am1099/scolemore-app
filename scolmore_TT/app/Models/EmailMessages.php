<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailMessages extends Model
{
    use HasFactory;

    protected $fillable = [
        'message_from',
        'message_to',
        'subject',
        'message',
        'status',
    ];
}
