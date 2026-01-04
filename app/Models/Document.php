<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Document extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    
    // fillable
    protected $fillable = ['template', 'name', 'contents'];

    public function variables()
    {
        return $this->hasMany(DocumentVariable::class, 'template', 'template');
    }
}
