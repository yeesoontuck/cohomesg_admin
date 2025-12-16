<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentVariable extends Model
{
    public function document()
    {
        return $this->belongsTo(Document::class, 'template');
    }
}
