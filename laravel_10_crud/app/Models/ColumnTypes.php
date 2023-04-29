<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColumnTypes extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'classes',
        'type_template',
        'type_input',
        'select_options',
        'div_row_classes'
    ];
}
