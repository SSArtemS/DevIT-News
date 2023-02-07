<?php

namespace App\Policies;

use App\Http\Sections\Permissions;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PermissionsSectionModelPolicy
{
    use HandlesAuthorization;

    /**
     * @param User $user
     * @param string $ability
     * @param Permissions $section
     * @param Permission|null $item
     *
     * @return bool
     */
    public function before(User $user, $ability, Permissions $section, Permission $item = null)
    {
        if ($user->hasRole('superAdmin')) {
            return true;
        }
    }

    /**
     * @param User $user
     * @param Permissions $section
     * @param Permission $item
     * @return bool
     */
    public function display(User $user, Permissions $section, Permission $item)
    {
        return $user->isAbleTo('permission-list');
    }

    /**
     * @param User $user
     * @param Permissions $section
     * @param Permission $item
     * @return bool
     */
    public function create(User $user, Permissions $section, Permission $item)
    {
        return $user->isAbleTo('permission-create');
    }

    /**
     * @param User $user
     * @param Permissions $section
     * @param Permission $item
     * @return bool
     */
    public function edit(User $user, Permissions $section, Permission $item)
    {
        return $user->isAbleTo('permission-edit');
    }

    /**
     * @param User $user
     * @param Permissions $section
     * @param Permission $item
     * @return bool
     */
    public function delete(User $user, Permissions $section, Permission $item)
    {
        return $user->isAbleTo('permission-delete');
    }
}