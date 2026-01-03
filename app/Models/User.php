<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Cache;
use OwenIt\Auditing\Contracts\Auditable;

class User extends Authenticatable implements Auditable
{
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;
    
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Eager load role and permissions by default to prevent N+1 queries
    // whenever you access specific authorization checks.
    protected $with = ['role.permissions'];

    // Relationship: User belongs to ONE Role
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Check if the user's role has a specific permission key.
     */
    public function hasPermission(string $permissionKey): bool
    {
        if (!$this->role) {
            return false;
        }

        $cacheKey = 'permissions_role_' . $this->role_id;

        // 3. Retrieve from Cache or Query DB if missing
        // We cache this 'Forever' because permissions rarely change.
        $permissions = Cache::rememberForever($cacheKey, function () {
            // This code only runs if the cache is empty
            return $this->role
                        ->permissions()
                        ->pluck('key')
                        ->toArray();
        });

        return in_array($permissionKey, $permissions);
    }
    
    /**
     * Check if user is Super Admin
     */
    public function isSuperAdmin(): bool
    {
        return $this->role && $this->role->key === 'super_admin';
    }
}
