<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DocumentTemplates extends Model
{
    use HasFactory;

    protected $fillable = [
        'document_type_id',
        'name',
        'sort',
        'prefix_table'
    ];

    public function documentTemplateUsers(): HasMany
    {
        return $this->hasMany(DocumentTemplateUsers::class, 'document_template_id', 'id');
    }

    public function documentTemplateColumns(): HasMany
    {
        return $this->hasMany(DocumentTemplateColumns::class, 'document_template_id', 'id');
    }

    public function documentTemplateFiles(): HasMany
    {
        return $this->hasMany(DocumentTemplateFiles::class, 'document_template_id', 'id');
    }
}
