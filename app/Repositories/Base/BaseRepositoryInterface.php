<?php

namespace App\Repositories\Base;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * Interface BaseRepositoryInterface
 */
interface BaseRepositoryInterface
{
    /**
     * @return Collection
     */
    public function all(): Collection;

    /**
     * @param  array  $attributes
     * @return Model
     */
    public function create(array $attributes): Model;

    /**
     * @param $id
     * @return Model
     */
    public function find($id): ?Model;

    /**
     * @param  array  $data
     * @param $model
     * @return void
     */
    public function update(array $data, $model): void;

    /**
     * @param  int  $id
     * @return mixed
     */
    public function delete(int $id);
}
