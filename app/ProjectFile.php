<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectFile extends Model
{
    //fillables
    protected $fillable = ['name', 'project_id'];
    protected $appends = ['file_path'];

    //relationships
    public function project(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
    public function getFilePathAttribute(){
        return asset('project_files/'.$this->name);
    }
}
