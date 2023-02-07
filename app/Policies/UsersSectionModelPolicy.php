<?php

namespace App\Policies;

use App\Http\Sections\Users;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UsersSectionModelPolicy
{

    use HandlesAuthorization;

    /**
     * @param User $user
     * @param string $ability
     * @param Users $section
     * @param User $item
     *
     * @return bool
     */
    public function before(User $user, $ability, Users $section, User $item = null)
    {
        if ($user->hasRole('superAdmin')) {
            return true;
        }
    }

    /**
     * @param User $user
     * @param Users $section
     * @param User $item
     *
     * @return bool
     */
    public function display(User $user, Users $section, User $item)
    {
        return $user->isAbleTo('user-list');
    }

    /**
     * @param User $user
     * @param Users $section
     * @param User $item
     *
     * @return bool
     */
    public function create(User $user, Users $section, User $item)
    {
        return $user->isAbleTo('user-create');
    }

    /**
     * @param User $user
     * @param Users $section
     * @param User $item
     *
     * @return bool
     */
    public function edit(User $user, Users $section, User $item)
    {
        return $user->isAbleTo('user-edit') && $item->id > 2;
    }

    /**
     * @param User $user
     * @param Users $section
     * @param User $item
     *
     * @return bool
     */
    public function delete(User $user, Users $section, User $item)
    {
        return $user->isAbleTo('user-delete') && $item->id > 2;
    }
}
