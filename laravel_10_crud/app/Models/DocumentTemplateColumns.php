<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DocumentTemplateColumns extends Model
{
    use HasFactory;

    protected $fillable = [
        'document_template_id',
        'column_type_id',
        'required'
    ];

    public function columnTypes(): HasMany
    {
        return $this->hasMany(ColumnTypes::class, 'id', 'column_type_id');
    }
}
