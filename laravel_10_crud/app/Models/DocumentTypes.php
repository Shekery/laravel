<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DocumentTypes extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'start_number',
        'type_traffic',
        'id_design_name_doc',
        'id_design_comment',
        'organization_id',
        'instruct_file',
        'ability_to_clone',
        'ability_to_work',
    ];

    public function documentTemplates(): HasMany
    {
        return $this->hasMany(DocumentTemplates::class, 'document_type_id');
    }

    public function organizations(): HasMany
    {
        return $this->hasMany(Organizations::class, 'id', 'organization_id');
    }
}
