<?php

namespace App\Policies;

use App\Models\Property;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PropertyPolicy
{
    // SuperAdmin override
    // public function before(User $user, string $ability): bool|null
    // {
    //     if ($user->isSuperAdmin()) {
    //         return true;
    //     }
    
    //     return null;
    // }

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermission('property.view');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, ?Property $property = null): bool
    {
        return $user->hasPermission('property.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermission('property.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ?Property $property = null): bool
    {
        return $user->hasPermission('property.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ?Property $property = null): bool
    {
        return $user->hasPermission('property.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, ?Property $property = null): bool
    {
        return $user->hasPermission('property.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, ?Property $property = null): bool
    {
        return $user->hasPermission('property.force_delete');
    }
}
