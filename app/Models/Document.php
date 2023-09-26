<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'to',
        'thru',
        'from',
        'subject',
        'date',
        'date_received',
        'image',
        'remarks',
        'status',
        'category_id',
    ];
}
