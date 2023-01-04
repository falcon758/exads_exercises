<?php

declare(strict_types=1);

namespace App\Repositories;

use Exception;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

/**
 * Class Repository
 * @package App\Repositories
 */
abstract class Repository
{
    const PER_PAGE = 20;
    const MAX_ID_LENGTH = 30;
    const CACHE_LIFETIME = 10800;

    /**
     * @var Model
     */
    protected $model;

    /**
     * @var Builder
     */
    protected $query;

    /**
     * Contructor
     *
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Return instance model
     *
     * @return Model
     */
    public function model(): Model
    {
        return $this->model;
    }
}
