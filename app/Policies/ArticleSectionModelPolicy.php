<?php

namespace App\Policies;

use App\Http\Sections\Articles;
use App\Models\Article;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArticleSectionModelPolicy
{
    use HandlesAuthorization;

    /**
     * @param User $user
     * @param string $ability
     * @param Articles $section
     * @param Article $item
     *
     * @return bool
     */
    public function before(User $user, $ability, Articles $section, Article $item = null)
    {
        if ($user->hasRole('superAdmin')) {
            return true;
        }
    }

    /**
     * @param User $user
     * @param Articles $section
     * @param Article $item
     * @return bool
     */
    public function display(User $user, Articles $section, Article $item)
    {
        return $user->isAbleTo('articles-list');
    }

    /**
     * @param User $user
     * @param Articles $section
     * @param Article $item
     * @return bool
     */
    public function edit(User $user, Articles $section, Article $item)
    {
        return $user->isAbleTo('articles-edit') && $user->id === $item->user_id;
    }
}