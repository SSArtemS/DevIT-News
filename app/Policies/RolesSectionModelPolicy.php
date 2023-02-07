<?php

namespace App\Policies;

use App\Http\Sections\Roles;
use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolesSectionModelPolicy
{

    use HandlesAuthorization;

    /**
     * @param User $user
     * @param string $ability
     * @param Roles $section
     * @param Role|null $item
     *
     * @return bool
     */
    public function before(User $user, $ability, Roles $section, Role $item = null)
    {
        if ($user->hasRole('superAdmin')) {
            return true;
        }
    }

    /**
     * @param User $user
     * @param Roles $section
     * @param Role $item
     *
     * @return bool
     */
    public function display(User $user, Roles $section, Role $item)
    {
        return $user->isAbleTo('role-list');
    }

    /**
     * @param User $user
     * @param Roles $section
     * @param Role $item
     *
     * @return bool
     */
    public function create(User $user, Roles $section, Role $item)
    {
        return $user->isAbleTo('role-create');
    }

    /**
     * @param User $user
     * @param Roles $section
     * @param Role $item
     *
     * @return bool
     */
    public function edit(User $user, Roles $section, Role $item)
    {
        return $user->isAbleTo('role-edit');
    }

    /**
     * @param User $user
     * @param Roles $section
     * @param Role $item
     *
     * @return bool
     */
    public function delete(User $user, Roles $section, Role $item)
    {
        return $user->isAbleTo('role-delete') && $item->id > 2;
    }
}
