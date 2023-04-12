<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentTypes extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'start_number',
        'type_traffic',
        'id_design_name_doc',
        'id_design_comment',
        'code_organization',
        'instruct_file',
        'ability_to_clone',
        'ability_to_work',
    ];
}
