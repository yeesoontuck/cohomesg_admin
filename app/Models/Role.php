<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Cache;
use OwenIt\Auditing\Contracts\Auditable;

class Role extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    
    protected $fillable = ['name', 'key', 'description'];

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    // Relationship: A Role has many permissions
    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class);
    }

    /**
     * The "booted" method allows us to hook into model events.
     */
    protected static function booted(): void
    {
        // When a Role is updated (e.g. name change), we clear its cache
        static::updated(function (Role $role) {
            Cache::forget('permissions_role_' . $role->id);
        });

        // When a Role is deleted, we clear its cache
        static::deleted(function (Role $role) {
            Cache::forget('permissions_role_' . $role->id);
        });
    }
    
    /**
     * Helper to sync permissions and clear cache automatically.
     * Call this when updating changes to Roles and Permissions mappings, to sync and flush cache in one step.
     * usage: $role->syncPermissions([1, 2, 3]);
     * usage: $role->syncPermissions($request->input('permissions'));
     */
    public function syncPermissions(array $permissionIds): array
    {
        // $changes = $this->permissions()->sync($permissionIds);
        $changes = $this->auditSync('permissions', $permissionIds);
        
        // Manually clear cache because 'sync' doesn't trigger standard model events
        Cache::forget('permissions_role_' . $this->id);
        
        return $changes;
    }
}