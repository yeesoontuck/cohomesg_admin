<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Permission extends Model
{
    protected $fillable = ['name', 'key', 'description'];

    // Relationship: A Permission belongs to many roles
    public function role(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }
}