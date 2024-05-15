<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'target',
        'description',
        'startDate',
        'endDate',
        'validity_id',
        'visualization_role_id',
    ];

    public function folders()
    {
        return $this->hasMany(Folder::class, "project_id");
    }

    public function documents()
    {
        return $this->hasMany(Document::class, "project_id");
    }

    public function validity()
    {
        return $this->belongsTo(Validity::class, "validity_id");
    }

    public function visualizationRole()
    {
        return $this->belongsTo(VisualizationRole::class, "visualization_role_id");
    }

    public function users()
    {
        return $this->belongsToMany(User::class, "project_user");
    }
}
