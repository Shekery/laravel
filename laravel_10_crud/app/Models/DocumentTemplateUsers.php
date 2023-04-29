<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DocumentTemplateUsers extends Model
{
    use HasFactory;

    protected $fillable = [
        'document_template_id',
        'multiple_choice_select',
        'type',
        'know',
        'sign'
    ];

    public function documentTemplateUserRelations(): HasMany
    {
        return $this->hasMany(DocumentTemplateUserRelations::class, 'document_templates_user_id', 'id');
    }
}
