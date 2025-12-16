<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    // fillable
    protected $fillable = ['template', 'name', 'contents'];

    public function variables()
    {
        return $this->hasMany(DocumentVariable::class, 'template', 'template');
    }
}
