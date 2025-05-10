<?php

/**
 * This file is part of Laravel Entrust,
 * Handle Role-based Permissions for Laravel.
 *
 * @license     MIT
 * @package     Odhiambo\LaravelEntrust
 * @category    Models
 * @author      Odhiambo
 */

namespace Odhiambo\LaravelEntrust\Models;

use Illuminate\Support\Facades\Config;
use Illuminate\Database\Eloquent\Model;
use Odhiambo\LaravelEntrust\Traits\LaravelEntrustPermissionTrait;
use Odhiambo\LaravelEntrust\Contracts\LaravelEntrustPermissionInterface;

class EntrustPermission extends Model implements LaravelEntrustPermissionInterface
{
    use LaravelEntrustPermissionTrait;
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table;

    /**
     * Creates a new instance of the model.
     *
     * @param  array  $attributes
     * @return void
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = Config::get('entrust.tables.permissions');
    }
}