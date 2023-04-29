<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentTemplateFiles extends Model
{
    use HasFactory;

    protected $fillable = [
        'document_template_id',
        'signed_contract'
    ];
}
