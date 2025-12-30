<?php

namespace App\Policies;

use App\Models\District;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class DistrictPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermission('district.view');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, District $district): bool
    {
        return $user->hasPermission('district.view', $district);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermission('district.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, District $district): bool
    {
        return $user->hasPermission('district.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, District $district): bool
    {
        return $user->hasPermission('district.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, District $district): bool
    {
        return $user->hasPermission('district.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, District $district): bool
    {
        return $user->hasPermission('district.force_delete');
    }
}
