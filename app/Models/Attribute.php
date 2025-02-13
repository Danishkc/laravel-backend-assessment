<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
    ];

    public function values()
    {
        return $this->hasMany(AttributeValue::class);
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'attribute_values', 'attribute_id', 'entity_id');
    }
}
