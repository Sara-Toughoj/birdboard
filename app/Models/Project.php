<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $guarded = [];

    //--------------------- Tools ---------------------
    public function path()
    {
        return "/projects/{$this->id}";
    }

    //------------------------------------ Relationships ---------------------------
    public function owner()
    {
        return $this->belongsTo(User::class);
    }
}
