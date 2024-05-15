<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisualizationRole extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function projects()
    {
        return $this->hasMany(Project::class, "visualization_role_id");
    }

    public function folders()
    {
        return $this->hasMany(Folder::class, "visualization_role_id");
    }

    public function documents()
    {
        return $this->hasMany(Document::class, "visualization_role_id");
    }
}
