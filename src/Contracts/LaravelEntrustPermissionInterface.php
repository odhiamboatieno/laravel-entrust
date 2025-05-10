<?php

/**
 * This file is part of Laravel Entrust,
 * Handle Role-based Permissions for Laravel.
 *
 * @license     MIT
 * @package     Odhiambo\LaravelEntrust
 * @category    Contracts
 * @author      Odhiambo
 */

namespace Odhiambo\LaravelEntrust\Contracts;

interface LaravelEntrustPermissionInterface
{
    /**
     * Many-to-Many relations with role model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles();
}
